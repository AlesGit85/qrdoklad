<?php

declare(strict_types=1);

namespace App\Core;

use Nette\Mail\Mailer;
use Nette\Mail\Message;
use Tracy\Debugger;

/**
 * TestMailer - ukládá emaily do souborů pro lokální vývoj
 */
class TestMailer implements Mailer
{
    private string $tempDir;

    public function __construct(string $tempDir)
    {
        $this->tempDir = $tempDir;
        
        // Vytvoření složky pro emaily pokud neexistuje
        $mailDir = $this->tempDir . '/mails';
        if (!is_dir($mailDir)) {
            mkdir($mailDir, 0777, true);
        }
    }

    /**
     * ✅ Implementace Mailer interface - ukládání emailů do souborů
     */
    public function send(Message $mail): void
    {
        $filename = $this->generateFileName($mail);
        $filepath = $this->tempDir . '/mails/' . $filename;
        
        // Převod Message na string (EML formát)
        $content = $this->messageToString($mail);
        
        // Uložení do souboru
        if (file_put_contents($filepath, $content)) {
            Debugger::log("Email saved to file: {$filename}", 'email');
        } else {
            throw new \Exception("Failed to save email to file: {$filepath}");
        }
    }

    /**
     * ✅ Generování unikátního názvu souboru
     */
    private function generateFileName(Message $mail): string
    {
        $timestamp = date('Y-m-d_H-i-s');
        $microtime = substr(microtime(), 2, 6);
        
        // Získání příjemce pro název souboru
        $recipients = $mail->getHeader('To');
        $recipient = 'unknown';
        
        if ($recipients) {
            // Převod na string pokud je to array
            $recipientString = is_array($recipients) ? implode(', ', $recipients) : $recipients;
            
            // Extrakce prvního emailu z To hlavičky
            if (preg_match('/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})/', $recipientString, $matches)) {
                $recipient = str_replace(['@', '.'], ['_', '_'], $matches[1]);
            }
        }
        
        return "email_{$timestamp}_{$microtime}_{$recipient}.eml";
    }

    /**
     * ✅ Převod Message na EML string
     */
    private function messageToString(Message $mail): string
    {
        // Získání všech headers
        $headers = [];
        
        // Pomocná funkce pro převod header na string
        $headerToString = function($header) {
            return is_array($header) ? implode(', ', $header) : $header;
        };
        
        // Základní headers
        if ($from = $mail->getHeader('From')) {
            $headers[] = "From: " . $headerToString($from);
        }
        
        if ($to = $mail->getHeader('To')) {
            $headers[] = "To: " . $headerToString($to);
        }
        
        if ($subject = $mail->getHeader('Subject')) {
            $headers[] = "Subject: " . $headerToString($subject);
        }
        
        if ($replyTo = $mail->getHeader('Reply-To')) {
            $headers[] = "Reply-To: " . $headerToString($replyTo);
        }
        
        // Content headers
        $headers[] = "Content-Type: text/html; charset=UTF-8";
        $headers[] = "Content-Transfer-Encoding: 8bit";
        $headers[] = "MIME-Version: 1.0";
        $headers[] = "Date: " . date('r');
        $headers[] = "Message-ID: <" . uniqid() . "@qrdoklad.local>";
        
        // Sestavení EML obsahu
        $eml = implode("\r\n", $headers);
        $eml .= "\r\n\r\n";
        
        // Tělo emailu (HTML)
        $body = $mail->getHtmlBody();
        if ($body) {
            $eml .= $body;
        } else {
            // Fallback na text body
            $textBody = $mail->getBody();
            $eml .= $textBody ?: 'No content';
        }
        
        return $eml;
    }

    /**
     * ✅ Pomocná metoda pro získání temp directory
     */
    public function getTempDir(): string
    {
        return $this->tempDir;
    }
}