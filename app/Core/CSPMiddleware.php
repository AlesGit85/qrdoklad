<?php

declare(strict_types=1);

namespace App\Core;

use Nette\Http\IResponse;
use Tracy\Debugger;

/**
 * CSPMiddleware - Content Security Policy implementation
 */
class CSPMiddleware
{
    private IResponse $httpResponse;
    private bool $isDevelopment;
    private ?\Nette\Http\Session $session = null;

    public function __construct(IResponse $httpResponse, bool $isDevelopment = false, ?\Nette\Http\Session $session = null)
    {
        $this->httpResponse = $httpResponse;
        $this->isDevelopment = $isDevelopment;
        $this->session = $session;
    }

    /**
     * ✅ Nastavení kompletní CSP policy
     */
    public function applyCSP(): void
    {
        $csp = $this->buildCSPPolicy();
        
        // Nastavení hlavičky
        if ($this->isDevelopment) {
            // Ve vývoji používáme report-only + logování
            $this->httpResponse->setHeader('Content-Security-Policy-Report-Only', $csp);
            Debugger::log("CSP applied (report-only): {$csp}", 'security');
        } else {
            // V produkci enforce policy
            $this->httpResponse->setHeader('Content-Security-Policy', $csp);
            Debugger::log("CSP applied (enforced): {$csp}", 'security');
        }
        
        // Dodatečné bezpečnostní hlavičky
        $this->setAdditionalSecurityHeaders();
        
        Debugger::log("Security headers applied. Development mode: " . ($this->isDevelopment ? 'yes' : 'no'), 'security');
    }

    /**
     * ✅ Sestavení CSP policy
     */
    private function buildCSPPolicy(): string
    {
        $policies = [
            // Základní zdroje
            "default-src 'self'",
            
            // Scripty - povolíme CDN a inline pro Bootstrap/jQuery
            "script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://www.googletagmanager.com https://www.google-analytics.com",
            
            // Styly - povolíme CDN a inline styly
            "style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com",
            
            // Obrázky - povolíme data: pro inline obrázky a https:
            "img-src 'self' data: https: http:",
            
            // Fonty
            "font-src 'self' https://cdn.jsdelivr.net https://fonts.gstatic.com",
            
            // AJAX requesty
            "connect-src 'self' https://www.google-analytics.com",
            
            // Objekty a pluginy
            "object-src 'none'",
            
            // Media elementy
            "media-src 'self'",
            
            // Frames - zakázané
            "frame-src 'none'",
            
            // Workers
            "worker-src 'self'",
            
            // Formuláře - pouze same origin
            "form-action 'self'",
            
            // Upgrade insecure requests v produkci
            $this->isDevelopment ? "" : "upgrade-insecure-requests",
            
            // Base URI
            "base-uri 'self'"
        ];
        
        // Filtrování prázdných položek
        $policies = array_filter($policies);
        
        return implode('; ', $policies);
    }

    /**
     * ✅ Dodatečné bezpečnostní hlavičky
     */
    private function setAdditionalSecurityHeaders(): void
    {
        // Ochrana proti clickjacking
        $this->httpResponse->setHeader('X-Frame-Options', 'DENY');
        
        // XSS Protection
        $this->httpResponse->setHeader('X-XSS-Protection', '1; mode=block');
        
        // Content Type Options
        $this->httpResponse->setHeader('X-Content-Type-Options', 'nosniff');
        
        // Referrer Policy
        $this->httpResponse->setHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        
        // Permissions Policy
        $this->httpResponse->setHeader('Permissions-Policy', 
            'camera=(), microphone=(), geolocation=(), payment=(), usb=()');
        
        // HSTS v produkci (pouze přes HTTPS)
        if (!$this->isDevelopment && $this->isHttps()) {
            $this->httpResponse->setHeader('Strict-Transport-Security', 
                'max-age=31536000; includeSubDomains; preload');
        }
        
        // Cross-Origin policies
        $this->httpResponse->setHeader('Cross-Origin-Embedder-Policy', 'require-corp');
        $this->httpResponse->setHeader('Cross-Origin-Opener-Policy', 'same-origin');
        $this->httpResponse->setHeader('Cross-Origin-Resource-Policy', 'same-site');
    }

    /**
     * ✅ Kontrola HTTPS
     */
    private function isHttps(): bool
    {
        return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ||
               isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443 ||
               isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https';
    }

    /**
     * ✅ Nonce generátor pro inline scripty
     */
    public function generateNonce(): string
    {
        $nonce = base64_encode(random_bytes(16));
        
        // Uložení pomocí Nette Session místo raw PHP session
        if ($this->session) {
            $section = $this->session->getSection('csp');
            $section->nonce = $nonce;
        }
        
        return $nonce;
    }

    /**
     * ✅ Získání aktuálního nonce
     */
    public function getCurrentNonce(): string
    {
        if ($this->session) {
            $section = $this->session->getSection('csp');
            return $section->nonce ?? '';
        }
        
        return '';
    }

    /**
     * ✅ CSP pro specifické stránky
     */
    public function applyPageSpecificCSP(string $page): void
    {
        $additionalPolicies = match($page) {
            'kontakt' => [
                // Pro kontaktní formulář můžeme být přísnější
                "script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net",
                "connect-src 'self'"
            ],
            'cenik' => [
                // Pro ceník možná budeme potřebovat tracking
                "script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://www.google-analytics.com",
                "connect-src 'self' https://www.google-analytics.com"
            ],
            default => []
        };
        
        if (!empty($additionalPolicies)) {
            $csp = implode('; ', $additionalPolicies);
            $this->httpResponse->setHeader('Content-Security-Policy', $csp);
        }
    }

    /**
     * ✅ CSP Violation reporting
     */
    public function setupCSPReporting(): void
    {
        // URL pro reporting CSP violations
        $reportUri = '/csp-report';
        
        // Přidání report-uri do CSP
        $currentCSP = $this->httpResponse->getHeader('Content-Security-Policy') ?? '';
        if ($currentCSP) {
            $updatedCSP = $currentCSP . "; report-uri {$reportUri}";
            $this->httpResponse->setHeader('Content-Security-Policy', $updatedCSP);
        }
    }

    /**
     * ✅ Validace inline scriptů proti CSP
     */
    public function validateInlineScript(string $script): bool
    {
        // Kontrola na nebezpečné patterny
        $dangerousPatterns = [
            '/eval\s*\(/i',
            '/document\.write/i',
            '/innerHTML\s*=/i',
            '/outerHTML\s*=/i',
            '/javascript\s*:/i',
            '/setTimeout\s*\(\s*["\'].*?["\']/i',
            '/setInterval\s*\(\s*["\'].*?["\']/i'
        ];
        
        foreach ($dangerousPatterns as $pattern) {
            if (preg_match($pattern, $script)) {
                Debugger::log("Dangerous inline script detected: " . substr($script, 0, 100), 'security');
                return false;
            }
        }
        
        return true;
    }
}