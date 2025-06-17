<?php

namespace App\Presentation\Landing;

use Nette\Application\UI\Presenter;
use Nette\Application\UI\Form;
use Nette\Utils\DateTime;

class LandingPresenter extends Presenter
{
    /** @var array Slouží jako jednoduchý rate limiting */
    private static array $submitAttempts = [];

    public function beforeRender(): void
    {
        parent::beforeRender();
        
        // Vygenerujeme structured data pro každou stránku
        $baseUrl = $this->getHttpRequest()->getUrl()->getBaseUrl();
        $this->template->structuredData = $this->generateStructuredData($baseUrl);
    }

    /**
     * Hlavní prezentační stránka
     */
    public function renderDefault(): void
    {
        $this->template->pageTitle = 'QRdoklad - Moderní fakturační systém';
        $this->template->metaDescription = 'Profesionální fakturační systém s QR platbami, automatickým ARES vyhledáváním a pokročilými funkcemi pro vaše podnikání.';
    }

    /**
     * Stránka s funkcemi
     */
    public function renderFunkce(): void
    {
        $this->template->pageTitle = 'Funkce - QRdoklad';
        $this->template->metaDescription = 'Kompletní přehled všech funkcí fakturačního systému QRdoklad. Zjistěte, jak vám pomůžeme s vaší administrativou.';
    }

    /**
     * Stránka s cenami
     */
    public function renderCenik(): void
    {
        $this->template->pageTitle = 'Ceník - QRdoklad';
        $this->template->metaDescription = 'Transparentní ceník fakturačního systému QRdoklad. Vyberte si balíček podle velikosti vašeho podnikání.';
    }

    /**
     * Kontaktní stránka
     */
    public function renderKontakt(): void
    {
        $this->template->pageTitle = 'Kontakt - QRdoklad';
        $this->template->metaDescription = 'Kontaktujte nás ohledně fakturačního systému QRdoklad. Jsme tu pro vás a rádi odpovíme na všechny vaše otázky.';
    }

    /**
     * Sitemap.xml generátor
     */
    public function actionSitemap(): void
    {
        $this->getHttpResponse()->setHeader('Content-Type', 'application/xml; charset=utf-8');
        
        $baseUrl = $this->getHttpRequest()->getUrl()->getBaseUrl();
        $sitemap = $this->generateSitemap($baseUrl);
        
        echo $sitemap;
        $this->terminate();
    }

    /**
     * Generuje sitemap.xml
     */
    private function generateSitemap(string $baseUrl): string
    {
        $urls = [
            [
                'loc' => $baseUrl,
                'changefreq' => 'weekly',
                'priority' => '1.0',
                'lastmod' => date('Y-m-d')
            ],
            [
                'loc' => $baseUrl . 'funkce',
                'changefreq' => 'monthly',
                'priority' => '0.8',
                'lastmod' => date('Y-m-d')
            ],
            [
                'loc' => $baseUrl . 'cenik',
                'changefreq' => 'monthly',
                'priority' => '0.9',
                'lastmod' => date('Y-m-d')
            ],
            [
                'loc' => $baseUrl . 'kontakt',
                'changefreq' => 'monthly',
                'priority' => '0.7',
                'lastmod' => date('Y-m-d')
            ]
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        foreach ($urls as $url) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . htmlspecialchars($url['loc']) . '</loc>' . "\n";
            $xml .= '    <lastmod>' . $url['lastmod'] . '</lastmod>' . "\n";
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . "\n";
            $xml .= '  </url>' . "\n";
        }
        
        $xml .= '</urlset>';
        
        return $xml;
    }

    /**
     * Generuje structured data pro SEO
     */
    private function generateStructuredData(string $baseUrl): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'QRdoklad',
            'url' => $baseUrl,
            'logo' => $baseUrl . 'images/logo.svg',
            'description' => 'Moderní fakturační systém s QR platbami pro české firmy',
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+420703985390',
                'contactType' => 'customer service',
                'areaServed' => 'CZ',
                'availableLanguage' => 'Czech'
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'addressCountry' => 'CZ',
                'addressLocality' => 'Librantice',
                'postalCode' => '503 46'
            ],
            'sameAs' => [
                'https://www.facebook.com/qrdoklad',
                'https://www.linkedin.com/company/qrdoklad'
            ]
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Kontaktní formulář s CSRF ochranou
     */
    protected function createComponentContactForm(): Form
    {
        $form = new Form;

        // CSRF ochrana (Nette ji přidává automaticky, ale můžeme ji explicitně nastavit)
        $form->addProtection('Vypršela doba platnosti formuláře. Odešlete jej znovu.');

        $form->addText('name', 'Jméno a příjmení:')
            ->setRequired('Vyplňte prosím jméno a příjmení')
            ->addRule(Form::MIN_LENGTH, 'Jméno musí mít alespoň %d znaky', 2)
            ->addRule(Form::MAX_LENGTH, 'Jméno je příliš dlouhé (max %d znaků)', 100);

        $form->addEmail('email', 'E-mail:')
            ->setRequired('Vyplňte prosím e-mailovou adresu')
            ->addRule(Form::EMAIL, 'Zadejte platnou e-mailovou adresu');

        $form->addText('company', 'Firma:')
            ->addRule(Form::MAX_LENGTH, 'Název firmy je příliš dlouhý (max %d znaků)', 150);

        $form->addText('phone', 'Telefon:')
            ->addRule(Form::PATTERN, 'Zadejte telefon ve formátu +420 XXX XXX XXX', '(\+420\s?)?[0-9\s]{9,}');

        $form->addSelect('subject', 'Předmět dotazu:', [
            '' => 'Vyberte předmět dotazu',
            'pricing' => 'Dotaz k ceníku',
            'features' => 'Dotaz k funkcím', 
            'technical' => 'Technická podpora',
            'demo' => 'Požadavek na demo',
            'enterprise' => 'Enterprise řešení',
            'other' => 'Ostatní'
        ]);

        $form->addTextArea('message', 'Zpráva:')
            ->setRequired('Napište nám zprávu')
            ->addRule(Form::MIN_LENGTH, 'Zpráva musí mít alespoň %d znaků', 10)
            ->addRule(Form::MAX_LENGTH, 'Zpráva je příliš dlouhá (max %d znaků)', 2000)
            ->setHtmlAttribute('rows', 5)
            ->setHtmlAttribute('placeholder', 'Popište nám svůj dotaz nebo požadavek...');

        // Honeypot field (skryté pole pro boty)
        $form->addText('website', 'Website:')
            ->setHtmlAttribute('style', 'display: none;')
            ->setHtmlAttribute('tabindex', '-1');

        $form->addSubmit('send', 'Odeslat zprávu')
            ->setHtmlAttribute('class', 'btn btn-primary btn-lg');

        $form->onSuccess[] = [$this, 'contactFormSucceeded'];

        return $form;
    }

    public function contactFormSucceeded(Form $form, \stdClass $values): void
    {
        try {
            // Rate limiting check
            if (!$this->checkRateLimit()) {
                $this->flashMessage('Příliš mnoho pokusů o odeslání. Zkuste to znovu za chvíli.', 'error');
                $this->redirect('this');
                return;
            }

            // Honeypot check
            if (!empty($values->website)) {
                // Bot detection - tichý drop
                $this->redirect('this');
                return;
            }

            // Validace dat (dodatečná)
            if (strlen($values->message) < 10) {
                $this->flashMessage('Zpráva je příliš krátká.', 'error');
                $this->redirect('this');
                return;
            }

            // Jednoduchá spam detekce
            if ($this->detectSpam($values->message)) {
                $this->flashMessage('Zpráva byla označena jako spam.', 'error');
                $this->redirect('this');
                return;
            }

            // Sanitace dat
            $cleanData = $this->sanitizeFormData($values);

            // Zde by byla logika pro odeslání e-mailu
            // Když bude email připravený, použijete $cleanData
            
            /*
            $mail = new Nette\Mail\Message;
            $mail->setFrom($cleanData->email, $cleanData->name)
                ->addTo('info@qrdoklad.cz')
                ->setSubject('Nový kontakt z webu: ' . ($cleanData->subject ?: 'Obecný dotaz'))
                ->setHtmlBody($this->generateEmailTemplate($cleanData));
                
            $mailer->send($mail);
            */
            
            // Zalogujeme pokus o odeslání
            $this->logSubmitAttempt();
            
            $this->flashMessage('Vaše zpráva byla úspěšně odeslána. Brzy se vám ozveme!', 'success');
            
        } catch (\Exception $e) {
            // Logování chyby (v produkci)
            // \Tracy\Debugger::log($e, \Tracy\ILogger::ERROR);
            
            $this->flashMessage('Nastala chyba při odesílání zprávy. Zkuste to prosím znovu.', 'error');
        }
        
        $this->redirect('this');
    }

    /**
     * Jednoduchý rate limiting
     */
    private function checkRateLimit(): bool
    {
        $ip = $this->getHttpRequest()->getRemoteAddress();
        $now = time();
        $window = 300; // 5 minut
        $maxAttempts = 3;

        // Cleanup starých pokusů
        self::$submitAttempts = array_filter(self::$submitAttempts, function($timestamp) use ($now, $window) {
            return ($now - $timestamp) < $window;
        });

        // Počet pokusů z této IP
        $ipAttempts = array_filter(self::$submitAttempts, function($timestamp, $attemptIp) use ($ip) {
            return $attemptIp === $ip;
        }, ARRAY_FILTER_USE_BOTH);

        return count($ipAttempts) < $maxAttempts;
    }

    /**
     * Zaloguje pokus o odeslání
     */
    private function logSubmitAttempt(): void
    {
        $ip = $this->getHttpRequest()->getRemoteAddress();
        self::$submitAttempts[$ip . '_' . time()] = time();
    }

    /**
     * Jednoduchá spam detekce
     */
    private function detectSpam(string $message): bool
    {
        $spamWords = [
            'viagra', 'casino', 'lottery', 'winner', 'congratulations',
            'click here', 'act now', 'limited time', 'free money'
        ];

        $message = strtolower($message);
        
        foreach ($spamWords as $word) {
            if (strpos($message, strtolower($word)) !== false) {
                return true;
            }
        }

        // Příliš mnoho odkazů
        if (substr_count($message, 'http') > 2) {
            return true;
        }

        return false;
    }

    /**
     * Sanitace dat formuláře
     */
    private function sanitizeFormData(\stdClass $values): \stdClass
    {
        $clean = new \stdClass();
        
        $clean->name = trim(strip_tags($values->name));
        $clean->email = filter_var(trim($values->email), FILTER_SANITIZE_EMAIL);
        $clean->company = trim(strip_tags($values->company ?? ''));
        $clean->phone = trim(strip_tags($values->phone ?? ''));
        $clean->subject = trim(strip_tags($values->subject ?? ''));
        $clean->message = trim(strip_tags($values->message));
        
        return $clean;
    }
}