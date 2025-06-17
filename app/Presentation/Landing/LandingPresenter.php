<?php

namespace App\Presentation\Landing;

use Nette\Application\UI\Presenter;
use Nette\Application\UI\Form;
use Nette\Mail\Message;
use Nette\Mail\Mailer;

class LandingPresenter extends Presenter
{
    public function startup(): void
    {
        parent::startup();
        
        // Ensure session is started properly
        if (!$this->getSession()->isStarted()) {
            $this->getSession()->start();
        }
    }

    public function beforeRender(): void
    {
        parent::beforeRender();
        
        // Základní URL a SEO data
        $baseUrl = $this->getHttpRequest()->getUrl()->getBaseUrl();
        $currentUrl = $this->getHttpRequest()->getUrl()->getAbsoluteUrl();
        
        // Nastavení základních template proměnných
        $this->template->baseUrl = $baseUrl;
        $this->template->currentUrl = $currentUrl;
        $this->template->structuredData = $this->generateStructuredData($baseUrl);
        $this->template->organizationSchema = $this->generateOrganizationSchema($baseUrl);
    }

    /**
     * Hlavní prezentační stránka
     */
    public function renderDefault(): void
    {
        $this->template->pageTitle = 'QRdoklad - Moderní fakturační systém s QR platbami';
        $this->template->metaDescription = 'Profesionální fakturační systém s QR platbami, automatickým ARES vyhledáváním a pokročilými funkcemi pro české firmy. Zkuste 30 dní zdarma!';
        $this->template->metaKeywords = 'fakturační systém, QR platby, ARES, fakturace, účetnictví, podnikání, Česká republika';
        
        // Strukturovaná data pro homepage
        $this->template->pageSchema = $this->generateHomepageSchema();
    }

    /**
     * Stránka s funkcemi
     */
    public function renderFunkce(): void
    {
        $this->template->pageTitle = 'Funkce QRdokladu - Kompletní přehled možností';
        $this->template->metaDescription = 'Kompletní přehled všech funkcí fakturačního systému QRdoklad. QR platby, ARES integrace, vlastní šablony, automatické připomínky a mnoho dalšího.';
        $this->template->metaKeywords = 'funkce, QR platby, ARES integrace, šablony faktur, automatické připomínky, správa klientů';
        
        // Strukturovaná data pro funkce
        $this->template->pageSchema = $this->generateFeaturesSchema();
    }

    /**
     * Stránka s cenami
     */
    public function renderCenik(): void
    {
        $this->template->pageTitle = 'Ceník QRdoklad - Transparentní ceny bez skrytých poplatků';
        $this->template->metaDescription = 'Transparentní ceník fakturačního systému QRdoklad. Starter od 299 Kč, Business od 599 Kč. 30 dní zdarma, bez závazků, zrušitelné kdykoli.';
        $this->template->metaKeywords = 'ceník, ceny, balíčky, starter, business, enterprise, fakturační systém';
        
        // Strukturovaná data pro ceník
        $this->template->pageSchema = $this->generatePricingSchema();
    }

    /**
     * Kontaktní stránka
     */
    public function renderKontakt(): void
    {
        $this->template->pageTitle = 'Kontakt - QRdoklad | Jsme tu pro vás';
        $this->template->metaDescription = 'Kontaktujte nás ohledně fakturačního systému QRdoklad. Telefon +420 703 985 390, email info@qrdoklad.cz. Odpovídáme do 24 hodin.';
        $this->template->metaKeywords = 'kontakt, podpora, telefon, email, pomoc, dotazy';
        
        // Strukturovaná data pro kontakt
        $this->template->pageSchema = $this->generateContactSchema();
    }

    /**
     * Sitemap.xml generátor
     */
    public function actionSitemap(): void
    {
        $response = $this->getHttpResponse();
        $response->setContentType('application/xml', 'utf-8');
        
        $baseUrl = $this->getHttpRequest()->getUrl()->getBaseUrl();
        $sitemap = $this->generateSitemap($baseUrl);
        
        $response->setCode(200);
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
     * Generuje základní organizační schema
     */
    private function generateOrganizationSchema(string $baseUrl): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'QRdoklad',
            'alternateName' => 'QRdoklad.cz',
            'url' => $baseUrl,
            'logo' => $baseUrl . 'images/logo.svg',
            'description' => 'Moderní fakturační systém s QR platbami pro české firmy',
            'foundingDate' => '2024',
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+420703985390',
                'contactType' => 'customer service',
                'areaServed' => 'CZ',
                'availableLanguage' => ['Czech'],
                'hoursAvailable' => [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '08:00',
                    'closes' => '17:00'
                ]
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Librantice 167',
                'addressLocality' => 'Librantice',
                'postalCode' => '503 46',
                'addressCountry' => 'CZ'
            ],
            'sameAs' => [
                'https://www.facebook.com/qrdoklad',
                'https://www.linkedin.com/company/qrdoklad'
            ],
            'offers' => [
                '@type' => 'Offer',
                'category' => 'Software as a Service',
                'description' => 'Fakturační systém s QR platbami'
            ]
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Generuje schema pro homepage
     */
    private function generateHomepageSchema(): string
    {
        $baseUrl = $this->getHttpRequest()->getUrl()->getBaseUrl();
        
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'QRdoklad',
            'url' => $baseUrl,
            'description' => 'Moderní fakturační systém s QR platbami pro české firmy',
            'inLanguage' => 'cs-CZ',
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => $baseUrl . '?q={search_term_string}',
                'query-input' => 'required name=search_term_string'
            ]
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Generuje schema pro funkce
     */
    private function generateFeaturesSchema(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareApplication',
            'name' => 'QRdoklad',
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem' => 'Web Browser',
            'offers' => [
                '@type' => 'Offer',
                'price' => '299',
                'priceCurrency' => 'CZK',
                'priceSpecification' => [
                    '@type' => 'RecurringPriceSpecification',
                    'frequency' => 'Monthly'
                ]
            ],
            'featureList' => [
                'QR platby na fakturách',
                'ARES automatické vyhledávání',
                'Správa klientů',
                'Vlastní šablony faktur',
                'Automatické připomínky',
                'Export do PDF',
                'Mobilní aplikace'
            ]
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Generuje schema pro ceník
     */
    private function generatePricingSchema(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => 'QRdoklad Fakturační systém',
            'description' => 'Moderní fakturační systém s QR platbami',
            'brand' => [
                '@type' => 'Brand',
                'name' => 'QRdoklad'
            ],
            'offers' => [
                [
                    '@type' => 'Offer',
                    'name' => 'Starter',
                    'price' => '299',
                    'priceCurrency' => 'CZK',
                    'priceSpecification' => [
                        '@type' => 'RecurringPriceSpecification',
                        'frequency' => 'Monthly'
                    ],
                    'description' => 'Pro začínající podnikatele - do 50 faktur měsíčně'
                ],
                [
                    '@type' => 'Offer', 
                    'name' => 'Business',
                    'price' => '599',
                    'priceCurrency' => 'CZK',
                    'priceSpecification' => [
                        '@type' => 'RecurringPriceSpecification',
                        'frequency' => 'Monthly'
                    ],
                    'description' => 'Pro rostoucí firmy - neomezené faktury'
                ]
            ]
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Generuje schema pro kontakt
     */
    private function generateContactSchema(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'ContactPage',
            'mainEntity' => [
                '@type' => 'Organization',
                'name' => 'QRdoklad',
                'telephone' => '+420703985390',
                'email' => 'info@qrdoklad.cz',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Librantice 167',
                    'addressLocality' => 'Librantice',
                    'postalCode' => '503 46',
                    'addressCountry' => 'CZ'
                ]
            ]
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Generuje strukturovaná data pro SEO
     */
    private function generateStructuredData(string $baseUrl): string
    {
        // Breadcrumbs schema
        $action = $this->getAction();
        $breadcrumbs = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Domů',
                    'item' => $baseUrl
                ]
            ]
        ];

        if ($action !== 'default') {
            $pageNames = [
                'funkce' => 'Funkce',
                'cenik' => 'Ceník', 
                'kontakt' => 'Kontakt'
            ];
            
            $breadcrumbs['itemListElement'][] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $pageNames[$action] ?? ucfirst($action),
                'item' => $baseUrl . $action
            ];
        }

        return json_encode($breadcrumbs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Kontaktní formulář
     */
    protected function createComponentContactForm(): Form
    {
        $form = new Form;

        $form->addText('name', 'Jméno a příjmení:')
            ->setRequired('Vyplňte prosím jméno a příjmení')
            ->setHtmlAttribute('placeholder', 'Váš celé jméno');

        $form->addEmail('email', 'E-mail:')
            ->setRequired('Vyplňte prosím e-mailovou adresu')
            ->setHtmlAttribute('placeholder', 'vas@email.cz');

        $form->addText('company', 'Firma:')
            ->setHtmlAttribute('placeholder', 'Vaše firma s.r.o.');

        $form->addText('phone', 'Telefon:')
            ->setHtmlAttribute('placeholder', '+420 123 456 789');

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
            ->setHtmlAttribute('rows', 5)
            ->setHtmlAttribute('placeholder', 'Popište nám svůj dotaz nebo požadavek...');

        $form->addSubmit('send', 'Odeslat zprávu');

        $form->onSuccess[] = [$this, 'contactFormSucceeded'];

        // Add CSRF protection
        $form->addProtection('Vypršel časový limit, odešlete formulář znovu.');

        return $form;
    }

    public function contactFormSucceeded(Form $form, \stdClass $values): void
    {
        try {
            // Zde by byla logika pro odeslání e-mailu
            // Například: poslání na info@qrdoklad.cz
            // Můžete použít Nette\Mail\Mailer
            
            /*
            $mail = new Message;
            $mail->setFrom($values->email, $values->name)
                ->addTo('info@qrdoklad.cz')
                ->setSubject('Nový kontakt z webu: ' . ($values->subject ?: 'Obecný dotaz'))
                ->setBody("
                    Jméno: {$values->name}
                    E-mail: {$values->email}
                    Firma: {$values->company}
                    Telefon: {$values->phone}
                    Předmět: {$values->subject}
                    
                    Zpráva:
                    {$values->message}
                ");
                
            $mailer->send($mail);
            */
            
            $this->flashMessage('Vaše zpráva byla úspěšně odeslána. Brzy se vám ozveme!', 'success');
            
        } catch (\Exception $e) {
            $this->flashMessage('Nastala chyba při odesílání zprávy. Zkuste to prosím znovu.', 'error');
        }
        
        $this->redirect('this');
    }
}