<?php

declare(strict_types=1);

namespace App\Security;

use Nette\Application\Request;
use Nette\Application\Response;
use Nette\Application\IPresenter;
use Nette\Http\IRequest as HttpRequest;
use Nette\Http\IResponse as HttpResponse;

class SecurityMiddleware
{
    private HttpRequest $httpRequest;
    private HttpResponse $httpResponse;
    private array $config;

    public function __construct(
        HttpRequest $httpRequest,
        HttpResponse $httpResponse,
        array $config = []
    ) {
        $this->httpRequest = $httpRequest;
        $this->httpResponse = $httpResponse;
        $this->config = $config;
    }

    public function process(Request $request, IPresenter $presenter): Response
    {
        // Rate limiting check
        $this->checkRateLimit();
        
        // Security headers (backup if .htaccess fails)
        $this->setSecurityHeaders();
        
        // IP whitelist check for admin sections
        $this->checkIPRestrictions($request);
        
        // Input validation
        $this->validateInputs();
        
        return $presenter->run($request);
    }

    private function checkRateLimit(): void
    {
        // Simple rate limiting implementation
        $ip = $this->httpRequest->getRemoteAddress();
        $sessionKey = 'rate_limit_' . md5($ip);
        
        if (!isset($_SESSION[$sessionKey])) {
            $_SESSION[$sessionKey] = [
                'requests' => 1,
                'reset_time' => time() + ($this->config['rateLimitWindow'] ?? 300)
            ];
            return;
        }
        
        $data = $_SESSION[$sessionKey];
        
        if (time() > $data['reset_time']) {
            $_SESSION[$sessionKey] = [
                'requests' => 1,
                'reset_time' => time() + ($this->config['rateLimitWindow'] ?? 300)
            ];
            return;
        }
        
        $data['requests']++;
        $_SESSION[$sessionKey] = $data;
        
        if ($data['requests'] > ($this->config['rateLimitRequests'] ?? 100)) {
            $this->httpResponse->setCode(429);
            $this->httpResponse->setHeader('Retry-After', (string)($data['reset_time'] - time()));
            throw new \Nette\Application\AbortException('Rate limit exceeded');
        }
    }

    private function setSecurityHeaders(): void
    {
        // Backup security headers if .htaccess doesn't work
        if (!$this->httpResponse->getHeader('X-Content-Type-Options')) {
            $this->httpResponse->setHeader('X-Content-Type-Options', 'nosniff');
        }
        
        if (!$this->httpResponse->getHeader('X-Frame-Options')) {
            $this->httpResponse->setHeader('X-Frame-Options', 'DENY');
        }
        
        if (!$this->httpResponse->getHeader('X-XSS-Protection')) {
            $this->httpResponse->setHeader('X-XSS-Protection', '1; mode=block');
        }
        
        if (!$this->httpResponse->getHeader('Referrer-Policy')) {
            $this->httpResponse->setHeader('Referrer-Policy', 'strict-origin-when-cross-origin');
        }
    }

    private function checkIPRestrictions(Request $request): void
    {
        $allowedIPs = $this->config['adminAllowedIPs'] ?? [];
        
        // Skip if no restrictions or not admin section
        if (empty($allowedIPs) || !str_contains($request->getPresenterName(), 'Admin')) {
            return;
        }
        
        $clientIP = $this->httpRequest->getRemoteAddress();
        
        if (!in_array($clientIP, $allowedIPs, true)) {
            $this->httpResponse->setCode(403);
            throw new \Nette\Application\ForbiddenRequestException('Access denied from this IP');
        }
    }

    private function validateInputs(): void
    {
        // Basic input validation
        $suspiciousPatterns = [
            '/<script[^>]*>.*?<\/script>/is',
            '/javascript:/i',
            '/vbscript:/i',
            '/onload=/i',
            '/onerror=/i',
            '/eval\(/i',
            '/expression\(/i'
        ];
        
        foreach ($_GET as $key => $value) {
            if (is_string($value)) {
                foreach ($suspiciousPatterns as $pattern) {
                    if (preg_match($pattern, $value)) {
                        $this->httpResponse->setCode(400);
                        throw new \Nette\Application\BadRequestException('Suspicious input detected');
                    }
                }
            }
        }
    }
}