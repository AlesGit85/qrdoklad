<?php

declare(strict_types=1);

namespace App\Core;

use Tracy\Debugger;

/**
 * InputSanitizer - pokročilé čištění a validace vstupních dat
 */
class InputSanitizer
{
    /**
     * ✅ Pokročilé čištění HTML obsahu
     */
    public function sanitizeHtml(string $input, array $allowedTags = []): string
    {
        // Defaultní povolené tagy pro základní formátování
        $defaultAllowedTags = [
            '<p>', '<br>', '<strong>', '<em>', '<b>', '<i>', 
            '<ul>', '<ol>', '<li>', '<a>', '<span>'
        ];
        
        $allowedTags = empty($allowedTags) ? $defaultAllowedTags : $allowedTags;
        
        // Odstranění nebezpečných tagů
        $input = strip_tags($input, implode('', $allowedTags));
        
        // Odstranění nebezpečných atributů
        $input = $this->removeUnsafeAttributes($input);
        
        // Převod speciálních znaků
        $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        
        return trim($input);
    }

    /**
     * ✅ Základní text čištění (bez HTML)
     */
    public function sanitizeText(string $input, int $maxLength = 1000): string
    {
        // Odstranění všech HTML tagů
        $input = strip_tags($input);
        
        // Převod speciálních znaků
        $input = htmlspecialchars($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        
        // Normalizace white space
        $input = preg_replace('/\s+/', ' ', $input);
        
        // Trim a omezení délky
        $input = trim($input);
        if (strlen($input) > $maxLength) {
            $input = substr($input, 0, $maxLength);
        }
        
        return $input;
    }

    /**
     * ✅ Email sanitization a validace
     */
    public function sanitizeEmail(string $email): string|false
    {
        // Základní čištění
        $email = trim(strtolower($email));
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        
        // Validace
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        
        // Kontrola délky
        if (strlen($email) > 254) {
            return false;
        }
        
        // Kontrola blacklistu domén
        $domain = substr(strrchr($email, "@"), 1);
        $blacklistedDomains = [
            'tempmail.org', '10minutemail.com', 'guerrillamail.com',
            'mailinator.com', 'yopmail.com', 'temp-mail.org'
        ];
        
        if (in_array(strtolower($domain), $blacklistedDomains)) {
            return false;
        }
        
        return $email;
    }

    /**
     * ✅ URL sanitization a validace
     */
    public function sanitizeUrl(string $url): string|false
    {
        // Základní čištění
        $url = trim($url);
        $url = filter_var($url, FILTER_SANITIZE_URL);
        
        // Přidání http:// pokud chybí protokol
        if (!preg_match('/^https?:\/\//', $url)) {
            $url = 'http://' . $url;
        }
        
        // Validace
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }
        
        // Kontrola protokolu (pouze http/https)
        $parsed = parse_url($url);
        if (!in_array($parsed['scheme'] ?? '', ['http', 'https'])) {
            return false;
        }
        
        return $url;
    }

    /**
     * ✅ Telefon sanitization
     */
    public function sanitizePhone(string $phone): string
    {
        // Odstranění všech non-digit znaků kromě +
        $phone = preg_replace('/[^0-9+]/', '', $phone);
        
        // Normalizace českého formátu
        if (preg_match('/^420\d{9}$/', $phone)) {
            $phone = '+' . $phone;
        } elseif (preg_match('/^\d{9}$/', $phone)) {
            $phone = '+420' . $phone;
        }
        
        return $phone;
    }

    /**
     * ✅ Detekce XSS pokusů - vylepšené patterns
     */
    public function detectXss(string $input): bool
    {
        $xssPatterns = [
            // Script tagy
            '/<\s*script[^>]*>.*?<\s*\/\s*script\s*>/is',
            '/<\s*script[^>]*>/i',
            
            // JavaScript funkce
            '/alert\s*\(/i',
            '/confirm\s*\(/i',
            '/prompt\s*\(/i',
            '/eval\s*\(/i',
            
            // JavaScript protokol
            '/javascript\s*:/i',
            
            // VBScript protokol
            '/vbscript\s*:/i',
            
            // Event handlery
            '/on\w+\s*=/i',
            '/on\w+\s*\(/i',
            
            // Data protokol s base64
            '/data:.*?base64/i',
            
            // Style s expression
            '/style\s*=.*?expression/i',
            
            // Meta refresh
            '/<\s*meta.*?http-equiv.*?refresh/i',
            
            // Iframe, object, embed
            '/<\s*(iframe|object|embed|applet)/i',
            
            // Základní XSS pokusy
            '/(<|%3C)(\w+)(\s|%20)/i',
            
            // document.* calls
            '/document\s*\./i',
            '/window\s*\./i',
            
            // innerHTML manipulations
            '/innerHTML/i',
            '/outerHTML/i',
            
            // SQL injection pokusy
            '/(union|select|insert|update|delete|drop|create|alter)\s/i'
        ];
        
        foreach ($xssPatterns as $pattern) {
            if (preg_match($pattern, $input)) {
                Debugger::log("XSS attempt detected with pattern '{$pattern}': " . substr($input, 0, 200), 'security');
                return true;
            }
        }
        
        return false;
    }

    /**
     * ✅ Odstranění nebezpečných atributů z HTML
     */
    private function removeUnsafeAttributes(string $html): string
    {
        $unsafeAttributes = [
            'onload', 'onerror', 'onclick', 'onmouseover', 'onmouseout',
            'onfocus', 'onblur', 'onchange', 'onsubmit', 'onreset',
            'onselect', 'onkeydown', 'onkeyup', 'onkeypress',
            'javascript', 'vbscript', 'data', 'style'
        ];
        
        foreach ($unsafeAttributes as $attr) {
            $html = preg_replace('/\s*' . $attr . '\s*=\s*["\'][^"\']*["\']/i', '', $html);
        }
        
        return $html;
    }

    /**
     * ✅ Sanitizace pro JSON výstup
     */
    public function sanitizeForJson(mixed $data): mixed
    {
        if (is_string($data)) {
            return htmlspecialchars($data, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        } elseif (is_array($data)) {
            return array_map([$this, 'sanitizeForJson'], $data);
        } elseif (is_object($data)) {
            $result = new \stdClass();
            foreach (get_object_vars($data) as $key => $value) {
                $result->$key = $this->sanitizeForJson($value);
            }
            return $result;
        }
        
        return $data;
    }

    /**
     * ✅ Validace a sanitizace názvu souboru
     */
    public function sanitizeFilename(string $filename): string
    {
        // Odstranění path traversal pokusů
        $filename = basename($filename);
        
        // Odstranění nebezpečných znaků
        $filename = preg_replace('/[^a-zA-Z0-9._-]/', '_', $filename);
        
        // Odebrání počátečních teček
        $filename = ltrim($filename, '.');
        
        // Omezení délky
        if (strlen($filename) > 255) {
            $filename = substr($filename, 0, 255);
        }
        
        // Fallback pokud je název prázdný
        if (empty($filename)) {
            $filename = 'unnamed_file';
        }
        
        return $filename;
    }

    /**
     * ✅ Kontrola velikosti vstupních dat
     */
    public function checkInputSize(string $input, int $maxSize = 10000): bool
    {
        $size = strlen($input);
        
        if ($size > $maxSize) {
            Debugger::log("Input size exceeded: {$size} bytes (max: {$maxSize})", 'security');
            return false;
        }
        
        return true;
    }

    /**
     * ✅ Sanitizace pro databázové dotazy (proti SQL injection)
     */
    public function sanitizeForDatabase(string $input): string
    {
        // Základní čištění
        $input = trim($input);
        
        // Odstranění null bytes
        $input = str_replace("\0", '', $input);
        
        // Escapování speciálních znaků
        $input = addslashes($input);
        
        return $input;
    }

    /**
     * ✅ Komplexní sanitizace formulářových dat
     */
    public function sanitizeFormData(array $data): array
    {
        $sanitized = [];
        
        foreach ($data as $key => $value) {
            // Sanitizace klíče
            $cleanKey = preg_replace('/[^a-zA-Z0-9_]/', '', $key);
            
            if (is_string($value)) {
                // Kontrola na XSS
                if ($this->detectXss($value)) {
                    Debugger::log("XSS detected in form field: {$cleanKey}", 'security');
                    continue; // Přeskočit pole s XSS
                }
                
                // Kontrola velikosti
                if (!$this->checkInputSize($value)) {
                    continue; // Přeskočit příliš velká pole
                }
                
                // Sanitizace podle typu pole
                $sanitized[$cleanKey] = match($cleanKey) {
                    'email' => $this->sanitizeEmail($value),
                    'phone' => $this->sanitizePhone($value),
                    'url', 'website' => $this->sanitizeUrl($value),
                    'message', 'description' => $this->sanitizeHtml($value),
                    default => $this->sanitizeText($value)
                };
                
            } elseif (is_array($value)) {
                $sanitized[$cleanKey] = $this->sanitizeFormData($value);
            } else {
                $sanitized[$cleanKey] = $value;
            }
        }
        
        return $sanitized;
    }
}