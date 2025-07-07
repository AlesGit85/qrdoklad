<?php

declare(strict_types=1);

namespace App\Core;

use Nette\Http\Request;
use Nette\Http\Session;
use Tracy\Debugger;

/**
 * SecurityHelper - pomocník pro bezpečnostní operace
 */
class SecurityHelper
{
    private Request $httpRequest;
    private Session $session;

    public function __construct(Request $httpRequest, Session $session)
    {
        $this->httpRequest = $httpRequest;
        $this->session = $session;
    }

    /**
     * ✅ Rate limiting pro formuláře
     */
    public function checkFormRateLimit(string $formName, int $limitSeconds = 30): bool
    {
        // Použijeme Nette Session místo raw PHP sessions
        $section = $this->session->getSection('rate_limit');
        $key = $formName . '_' . $this->getClientIp();
        $lastSubmit = $section->$key ?? 0;
        $currentTime = time();

        if ($currentTime - $lastSubmit < $limitSeconds) {
            Debugger::log(sprintf(
                'Rate limit exceeded for form %s from IP %s', 
                $formName, 
                $this->getClientIp()
            ), 'security');
            return false;
        }

        $section->$key = $currentTime;
        return true;
    }

    /**
     * ✅ Detekce spam obsahů
     */
    public function checkSpamContent(string $content): bool
    {
        $originalContent = $content;
        $content = strtolower($content);
        
        \Tracy\Debugger::log("Spam check for: " . substr($originalContent, 0, 150), 'debug');
        
        // Kontrola počtu odkazů (chytne i 2 linky)
        $httpCount = substr_count($content, 'http');
        \Tracy\Debugger::log("HTTP count found: {$httpCount}", 'debug');
        
        if ($httpCount > 1) {
            Debugger::log("Spam detected: too many links ({$httpCount})", 'security');
            return true;
        }

        // Spam slova (jednoduché)
        $spamWords = ['viagra', 'casino', 'lottery', 'winner', 'congratulations', 'prize', 'click here', 'urgent'];
        foreach ($spamWords as $word) {
            if (strpos($content, $word) !== false) {
                Debugger::log("Spam detected: keyword '{$word}' found", 'security');
                return true;
            }
        }

        // Kontrola nadměrného opakování znaků
        if (preg_match('/(.)\1{5,}/', $content)) {
            Debugger::log("Spam detected: repeated characters", 'security');
            return true;
        }

        // Kontrola množství velkých písmen
        $upperCount = preg_match_all('/[A-Z]/', $originalContent);
        if ($upperCount > strlen($originalContent) * 0.5) {
            Debugger::log("Spam detected: too many uppercase letters", 'security');
            return true;
        }

        \Tracy\Debugger::log("No spam detected", 'debug');
        return false;
    }

    /**
     * ✅ Validace a čištění input dat
     */
    public function sanitizeInput(string $input, int $maxLength = 1000): string
    {
        // Odstranění nebezpečných znaků
        $input = trim($input);
        $input = strip_tags($input, '<br><p><strong><em>');
        $input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        
        // Zkrácení na maximální délku
        if (strlen($input) > $maxLength) {
            $input = substr($input, 0, $maxLength);
        }

        return $input;
    }

    /**
     * ✅ Logování bezpečnostních událostí
     */
    public function logSecurityEvent(string $event, array $data = []): void
    {
        $logData = [
            'timestamp' => date('Y-m-d H:i:s'),
            'ip' => $this->getClientIp(),
            'user_agent' => $this->httpRequest->getHeader('User-Agent'),
            'event' => $event,
            'data' => $data
        ];

        Debugger::log(json_encode($logData, JSON_UNESCAPED_UNICODE), 'security');
    }

    /**
     * ✅ Získání IP adresy klienta (i přes proxy)
     */
    public function getClientIp(): string
    {
        $ip = $this->httpRequest->getRemoteAddress();
        
        // Kontrola IP přes proxy
        $headers = ['HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_REAL_IP'];
        foreach ($headers as $header) {
            if (!empty($_SERVER[$header])) {
                $forwarded = $_SERVER[$header];
                if (strpos($forwarded, ',') !== false) {
                    $forwarded = trim(explode(',', $forwarded)[0]);
                }
                if (filter_var($forwarded, FILTER_VALIDATE_IP)) {
                    $ip = $forwarded;
                    break;
                }
            }
        }

        return $ip ?? '0.0.0.0';
    }

    /**
     * ✅ Kontrola bezpečnostních headers
     */
    public function checkSecurityHeaders(): array
    {
        $warnings = [];
        
        if (!$this->httpRequest->isSecured()) {
            $warnings[] = 'Spojení není zabezpečené (HTTP místo HTTPS)';
        }

        $userAgent = $this->httpRequest->getHeader('User-Agent');
        if (empty($userAgent) || strlen($userAgent) < 10) {
            $warnings[] = 'Podezřelý nebo chybějící User-Agent';
        }

        return $warnings;
    }

    /**
     * ✅ Generování bezpečného tokenu
     */
    public function generateSecureToken(int $length = 32): string
    {
        return bin2hex(random_bytes($length / 2));
    }

    /**
     * ✅ Validace email adresy s dodatečnými kontrolami
     */
    public function validateEmail(string $email): bool
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // Kontrola délky
        if (strlen($email) > 254) {
            return false;
        }

        // Kontrola domény
        $domain = substr(strrchr($email, "@"), 1);
        if (empty($domain) || strlen($domain) > 253) {
            return false;
        }

        // Základní blacklist
        $blacklistDomains = ['tempmail.org', '10minutemail.com', 'guerrillamail.com'];
        if (in_array(strtolower($domain), $blacklistDomains)) {
            return false;
        }

        return true;
    }

    /**
     * ✅ Honeypot kontrola (proti automatickým botům)
     */
    public function checkHoneypot(array $formData): bool
    {
        // Kontrola honeypot pole (pole, které by mělo zůstat prázdné)
        return empty($formData['website'] ?? '') && empty($formData['url'] ?? '');
    }
}