<?php

declare(strict_types=1);

namespace App\Core;

use Nette\Mail\Mailer;
use Nette\Mail\Message;
use Nette\Mail\SendException;
use Tracy\Debugger;

/**
 * EmailService - služba pro správu a odesílání emailů
 */
class EmailService
{
    private Mailer $mailer;
    private SecurityHelper $securityHelper;

    public function __construct(Mailer $mailer, SecurityHelper $securityHelper)
    {
        $this->mailer = $mailer;
        $this->securityHelper = $securityHelper;
    }

    /**
     * ✅ Odeslání kontaktního formuláře
     */
    public function sendContactForm(\stdClass $formData): bool
    {
        try {
            // Vytvoření emailu pro administrátora
            $adminMessage = $this->createAdminNotification($formData);
            
            // Vytvoření potvrzovacího emailu pro uživatele
            $userMessage = $this->createUserConfirmation($formData);

            // Odesílání emailů
            $adminSent = $this->sendEmail($adminMessage, 'admin_notification');
            $userSent = $this->sendEmail($userMessage, 'user_confirmation');

            // Logování úspěchu
            $this->securityHelper->logSecurityEvent('email_sent', [
                'type' => 'contact_form',
                'email' => $formData->email,
                'subject' => $formData->subject,
                'admin_sent' => $adminSent,
                'user_sent' => $userSent
            ]);

            return $adminSent && $userSent;

        } catch (\Exception $e) {
            Debugger::log($e, 'email-error');
            $this->securityHelper->logSecurityEvent('email_error', [
                'error' => $e->getMessage(),
                'email' => $formData->email ?? 'unknown'
            ]);
            return false;
        }
    }

    /**
     * ✅ Vytvoření notifikačního emailu pro administrátora
     */
    private function createAdminNotification(\stdClass $data): Message
    {
        $message = new Message;
        
        // Základní nastavení
        $message->setFrom('noreply@qrdoklad.cz', 'QRdoklad - Kontaktní formulář')
                ->addTo('info@qrdoklad.cz', 'QRdoklad Support')
                ->setSubject($this->getAdminSubject($data->subject))
                ->setHtmlBody($this->generateAdminTemplate($data));

        // Nastavení Reply-To na email zákazníka
        if (!empty($data->email) && $this->securityHelper->validateEmail($data->email)) {
            $message->addReplyTo($data->email, $data->name);
        }

        return $message;
    }

    /**
     * ✅ Vytvoření potvrzovacího emailu pro uživatele
     */
    private function createUserConfirmation(\stdClass $data): Message
    {
        $message = new Message;
        
        $message->setFrom('noreply@qrdoklad.cz', 'QRdoklad')
                ->addTo($data->email, $data->name)
                ->setSubject('Potvrzení přijetí vaší zprávy - QRdoklad')
                ->setHtmlBody($this->generateUserTemplate($data));

        return $message;
    }

    /**
     * ✅ Bezpečné odesílání emailu s error handling
     */
    private function sendEmail(Message $message, string $type): bool
    {
        try {
            $this->mailer->send($message);
            
            // Pro TestMailer (lokální vývoj) logujeme úspěch
            $mailerClass = get_class($this->mailer);
            if (strpos($mailerClass, 'TestMailer') !== false) {
                Debugger::log("Email saved to file successfully: {$type}", 'email');
            } else {
                Debugger::log("Email sent successfully: {$type}", 'email');
            }
            
            return true;
            
        } catch (SendException $e) {
            Debugger::log("Email send failed ({$type}): " . $e->getMessage(), 'email-error');
            return false;
        } catch (\Exception $e) {
            Debugger::log("Email error ({$type}): " . $e->getMessage(), 'email-error');
            return false;
        }
    }

    /**
     * ✅ Generování předmětu pro admin email
     */
    private function getAdminSubject(string $type): string
    {
        $subjects = [
            'general' => '🔵 Obecný dotaz',
            'support' => '🔧 Technická podpora',
            'sales' => '💼 Obchodní dotaz',
            'feature' => '💡 Návrh nové funkce',
            'bug' => '🐛 Nahlášení chyby',
            'technical' => '⚙️ Technický problém',
            'other' => '📝 Ostatní'
        ];

        $prefix = $subjects[$type] ?? '📝 Kontaktní formulář';
        return "[QRdoklad] {$prefix} z webu";
    }

    /**
     * ✅ HTML template pro admin notifikaci
     */
    private function generateAdminTemplate(\stdClass $data): string
    {
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Nová zpráva z kontaktního formuláře</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #B1D235; padding: 20px; border-radius: 8px 8px 0 0; }
                .header h1 { margin: 0; color: #212529; font-size: 24px; }
                .content { background: #f8f9fa; padding: 30px; border-radius: 0 0 8px 8px; }
                .field { margin-bottom: 20px; }
                .field-label { font-weight: bold; color: #6c757d; text-transform: uppercase; font-size: 12px; }
                .field-value { margin-top: 5px; padding: 10px; background: white; border-radius: 4px; border-left: 4px solid #B1D235; }
                .message-box { background: white; padding: 20px; border-radius: 8px; border: 1px solid #dee2e6; }
                .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #dee2e6; font-size: 12px; color: #6c757d; }
                .ip-info { background: #e7f3ff; padding: 15px; border-radius: 6px; margin-top: 20px; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <h1>🔔 Nová zpráva z kontaktního formuláře</h1>
                </div>
                
                <div class="content">
                    <div class="field">
                        <div class="field-label">Jméno a příjmení</div>
                        <div class="field-value">' . htmlspecialchars($data->name) . '</div>
                    </div>
                    
                    <div class="field">
                        <div class="field-label">E-mail</div>
                        <div class="field-value">
                            <a href="mailto:' . htmlspecialchars($data->email) . '">' . htmlspecialchars($data->email) . '</a>
                        </div>
                    </div>';

        if (!empty($data->company)) {
            $html .= '
                    <div class="field">
                        <div class="field-label">Firma</div>
                        <div class="field-value">' . htmlspecialchars($data->company) . '</div>
                    </div>';
        }

        if (!empty($data->phone)) {
            $html .= '
                    <div class="field">
                        <div class="field-label">Telefon</div>
                        <div class="field-value">
                            <a href="tel:' . htmlspecialchars($data->phone) . '">' . htmlspecialchars($data->phone) . '</a>
                        </div>
                    </div>';
        }

        $html .= '
                    <div class="field">
                        <div class="field-label">Typ dotazu</div>
                        <div class="field-value">' . $this->getSubjectLabel($data->subject) . '</div>
                    </div>
                    
                    <div class="field">
                        <div class="field-label">Zpráva</div>
                        <div class="message-box">' . nl2br(htmlspecialchars($data->message)) . '</div>
                    </div>
                    
                    <div class="ip-info">
                        <strong>📍 Technické informace:</strong><br>
                        <strong>IP adresa:</strong> ' . $this->securityHelper->getClientIp() . '<br>
                        <strong>Čas odeslání:</strong> ' . date('d.m.Y H:i:s') . '<br>
                        <strong>User Agent:</strong> ' . htmlspecialchars($_SERVER['HTTP_USER_AGENT'] ?? 'Neznámý') . '
                    </div>
                </div>
                
                <div class="footer">
                    <p>Tento email byl automaticky vygenerován z kontaktního formuláře na webu QRdoklad.cz</p>
                    <p>Pro odpověď stačí odpovědět na tento email - adresa zákazníka je nastavená jako Reply-To.</p>
                </div>
            </div>
        </body>
        </html>';

        return $html;
    }

    /**
     * ✅ HTML template pro potvrzení uživateli
     */
    private function generateUserTemplate(\stdClass $data): string
    {
        $html = '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Potvrzení přijetí zprávy - QRdoklad</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: #B1D235; padding: 30px; text-align: center; border-radius: 8px 8px 0 0; }
                .header h1 { margin: 0; color: #212529; font-size: 28px; }
                .content { background: #f8f9fa; padding: 40px 30px; border-radius: 0 0 8px 8px; }
                .success-icon { font-size: 48px; margin-bottom: 20px; }
                .message-summary { background: white; padding: 20px; border-radius: 8px; margin: 20px 0; border-left: 4px solid #B1D235; }
                .contact-info { background: #e7f3ff; padding: 20px; border-radius: 8px; margin-top: 30px; }
                .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #dee2e6; text-align: center; font-size: 14px; color: #6c757d; }
                .btn { display: inline-block; padding: 12px 24px; background: #B1D235; color: #212529; text-decoration: none; border-radius: 6px; font-weight: bold; margin: 20px 0; }
            </style>
        </head>
        <body>
            <div class="container">
                <div class="header">
                    <div class="success-icon">✅</div>
                    <h1>Vaše zpráva byla přijata</h1>
                </div>
                
                <div class="content">
                    <p><strong>Děkujeme, ' . htmlspecialchars($data->name) . '!</strong></p>
                    
                    <p>Vaši zprávu jsme úspěšně přijali a zpracujeme ji co nejdříve. Náš tým vám odpoví do 24 hodin.</p>
                    
                    <div class="message-summary">
                        <h3>📋 Shrnutí vaší zprávy:</h3>
                        <p><strong>Typ dotazu:</strong> ' . $this->getSubjectLabel($data->subject) . '</p>
                        <p><strong>Odesláno:</strong> ' . date('d.m.Y v H:i') . '</p>
                    </div>
                    
                    <div class="contact-info">
                        <h3>📞 Potřebujete urgentní pomoc?</h3>
                        <p>Pro technické problémy můžete také:</p>
                        <ul>
                            <li>📧 Napsat na: <a href="mailto:support@qrdoklad.cz">support@qrdoklad.cz</a></li>
                            <li>📖 Navštívit naši <a href="https://qrdoklad.cz/dokumentace">dokumentaci</a></li>
                            <li>❓ Projít <a href="https://qrdoklad.cz/napoveda">často kladené otázky</a></li>
                        </ul>
                    </div>
                    
                    <div style="text-align: center;">
                        <a href="https://qrdoklad.cz" class="btn">🏠 Zpět na QRdoklad.cz</a>
                    </div>
                </div>
                
                <div class="footer">
                    <p><strong>QRdoklad</strong> - Moderní fakturační systém s QR platbami</p>
                    <p>📧 info@qrdoklad.cz | 🌐 <a href="https://qrdoklad.cz">qrdoklad.cz</a></p>
                    <p style="font-size: 12px;">Tento email byl automaticky vygenerován. Prosím neodpovídejte na tuto adresu.</p>
                </div>
            </div>
        </body>
        </html>';

        return $html;
    }

    /**
     * ✅ Převod typu dotazu na lidsky čitelný text
     */
    private function getSubjectLabel(string $type): string
    {
        $labels = [
            'general' => 'Obecný dotaz',
            'support' => 'Technická podpora',
            'sales' => 'Obchodní dotaz',
            'feature' => 'Návrh nové funkce',
            'bug' => 'Nahlášení chyby',
            'technical' => 'Technický problém',
            'other' => 'Ostatní'
        ];

        return $labels[$type] ?? 'Nespecifikováno';
    }

    /**
     * ✅ Validace email adresy před odesláním
     */
    public function validateEmailData(\stdClass $data): array
    {
        $errors = [];

        if (!$this->securityHelper->validateEmail($data->email)) {
            $errors[] = 'Neplatná emailová adresa';
        }

        if (strlen($data->message) > 5000) {
            $errors[] = 'Zpráva je příliš dlouhá';
        }

        if ($this->securityHelper->checkSpamContent($data->message)) {
            $errors[] = 'Zpráva byla označena jako spam';
        }

        return $errors;
    }
}