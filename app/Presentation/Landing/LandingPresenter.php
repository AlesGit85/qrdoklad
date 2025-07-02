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
        $this->template->metaDescription = 'Profesionální fakturační systém s QR platbami, automatickým ARES vyhledáváním a pokročilými funkcemi pro české firmy. Registrace zdarma!';
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
        $this->template->metaDescription = 'Transparentní ceník fakturačního systému QRdoklad. Základní funkce zdarma navždy + jednorázové moduly podle potřeby. Registrace zdarma bez závazků.';
        $this->template->metaKeywords = 'ceník, ceny, moduly, zdarma navždy, jednorázové platby, fakturační systém';

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
     * Ochrana osobních údajů
     */
    public function renderPrivacy(): void
    {
        $this->template->pageTitle = 'Ochrana osobních údajů - QRdoklad';
        $this->template->metaDescription = 'Zásady ochrany osobních údajů pro QRdoklad. Jak zpracováváme vaše data v souladu s GDPR a českými zákony.';
        $this->template->metaKeywords = 'ochrana osobních údajů, GDPR, soukromí, zpracování dat';
    }

    /**
     * Redirect z /privacy na /ochrana-osobnich-udaju
     */
    public function actionPrivacyRedirect(): void
    {
        $this->redirectPermanent('Landing:privacy');
    }

    /**
     * Obchodní podmínky
     */
    public function renderTerms(): void
    {
        $this->template->pageTitle = 'Obchodní podmínky - QRdoklad';
        $this->template->metaDescription = 'Obchodní podmínky pro používání fakturačního systému QRdoklad. Práva a povinnosti uživatelů.';
        $this->template->metaKeywords = 'obchodní podmínky, VOP, všeobecné obchodní podmínky, smlouva';
    }

    /**
     * Redirect z /terms na /obchodni-podminky
     */
    public function actionTermsRedirect(): void
    {
        $this->redirectPermanent('Landing:terms');
    }

    /**
     * FAQ - Často kladené otázky
     */
    public function renderFaq(): void
    {
        $this->template->pageTitle = 'FAQ - Často kladené otázky | QRdoklad';
        $this->template->metaDescription = 'Odpovědi na nejčastější otázky o fakturačním systému QRdoklad. Najděte rychlé odpovědi na vaše dotazy.';
        $this->template->metaKeywords = 'FAQ, často kladené otázky, nápověda, pomoc, dotazy';

        // FAQ data
        $this->template->faqData = $this->getFaqData();
    }

    /**
     * O nás
     */
    public function renderAbout(): void
    {
        $this->template->pageTitle = 'O nás - QRdoklad';
        $this->template->metaDescription = 'Poznejte tým za QRdokladem. Naše mise je zjednodušit fakturaci pro české podnikatele pomocí moderních technologií.';
        $this->template->metaKeywords = 'o nás, tým, mise, historie, QRdoklad, fakturační systém';
    }

    /**
     * Redirect z /about na /o-nas
     */
    public function actionAboutRedirect(): void
    {
        $this->redirectPermanent('Landing:about');
    }

    /**
     * Status systému
     */
    public function renderStatus(): void
    {
        $this->template->pageTitle = 'Status systému - QRdoklad';
        $this->template->metaDescription = 'Aktuální stav dostupnosti služeb QRdoklad. Monitorujeme všechny systémy 24/7 a informujeme o jakýchkoli problémech.';
        $this->template->metaKeywords = 'status, dostupnost, monitoring, incidenty, výpadky služby';
    }

    /**
     * Nápověda a dokumentace
     */
    public function renderHelp(): void
    {
        $this->template->pageTitle = 'Nápověda a dokumentace - QRdoklad';
        $this->template->metaDescription = 'Kompletní nápověda k fakturačnímu systému QRdoklad. Návody, video tutoriály a odpovědi na časté otázky.';
        $this->template->metaKeywords = 'nápověda, dokumentace, návody, tutoriály, jak na to, podpora';
    }

    /**
     * Blog/články
     */
    public function renderBlog(): void
    {
        $this->template->pageTitle = 'Blog - QRdoklad';
        $this->template->metaDescription = 'Novinky, tipy a triky pro efektivní podnikání. Články o fakturaci, účetnictví a digitalizaci firmy.';
        $this->template->metaKeywords = 'blog, články, novinky, tipy, podnikání, fakturace, účetnictví';
    }

    /**
     * XML Sitemap
     */
    public function actionSitemap(): void
    {
        $baseUrl = $this->getHttpRequest()->getUrl()->getBaseUrl();
        $xml = $this->generateSitemap($baseUrl);

        $this->getHttpResponse()->setContentType('application/xml', 'utf-8');
        $this->sendResponse(new \Nette\Application\Responses\TextResponse($xml));
    }

    /**
     * FAQ data - kompletní struktura
     */
    private function getFaqData(): array
    {
        return [
            'general' => [
                'title' => 'Obecné otázky',
                'questions' => [
                    [
                        'question' => 'Co je QRdoklad?',
                        'answer' => 'QRdoklad je moderní cloudový fakturační systém určený pro české podnikatele. Umožňuje rychlé vystavování faktur s QR platbami, automatické vyhledávání v ARES a kompletní správu klientů.'
                    ],
                    [
                        'question' => 'Je QRdoklad vhodný pro můj typ podnikání?',
                        'answer' => 'QRdoklad je navržen pro všechny typy podnikání - od OSVČ přes malé firmy až po větší společnosti. Systém se přizpůsobí vašim potřebám díky flexibilnímu nastavení.'
                    ],
                    [
                        'question' => 'Mohu si QRdoklad vyzkoušet zdarma?',
                        'answer' => 'Ano! Nabízíme 30denní zkušební období zdarma bez jakýchkoli závazků. Nemusíte zadávat platební údaje a můžete službu kdykoli zrušit.'
                    ],
                    [
                        'question' => 'Jak rychle mohu začít používat QRdoklad?',
                        'answer' => 'Registrace a základní nastavení zabere jen pár minut. Svou první fakturu můžete vystavit během 5 minut od registrace. Pomůžeme vám s importem dat ze starého systému.'
                    ]
                ]
            ],
            'billing' => [
                'title' => 'Platby a účetnictví',
                'questions' => [
                    [
                        'question' => 'Jak fungují QR platby na fakturách?',
                        'answer' => 'QR platby umožňují vašim zákazníkům zaplatit fakturu pouhým naskenováním QR kódu mobilním bankovnictvím. Všechny údaje se automaticky vyplní a platba je okamžitá.'
                    ],
                    [
                        'question' => 'Jsou faktury z QRdokladu právně platné?',
                        'answer' => 'Ano, všechny faktury vystavené v QRdokladu splňují požadavky českého práva a jsou plně právně platné. Systém automaticky kontroluje povinné náležitosti faktur.'
                    ],
                    [
                        'question' => 'Mohu propojit QRdoklad s mým účetním systémem?',
                        'answer' => 'Ano, QRdoklad nabízí export dat do nejčastěji používaných účetních programů jako Pohoda, Flex, Money S3 a dalších. Data můžete exportovat v různých formátech.'
                    ],
                    [
                        'question' => 'Jak se řeší DPH a daňové povinnosti?',
                        'answer' => 'Systém automaticky počítá DPH podle platných sazeb, podporuje režim plátce i neplátce DPH, OSS a další daňové režimy. Generuje potřebné reporty pro daňové přiznání.'
                    ],
                    [
                        'question' => 'Mohu vystavovat faktury v cizích měnách?',
                        'answer' => 'Ano, QRdoklad podporuje více než 50 světových měn s automatickým přepočtem kurzů České národní banky. Můžete nastavit vlastní kurzy nebo používat aktuální.'
                    ]
                ]
            ],
            'technical' => [
                'title' => 'Technické otázky',
                'questions' => [
                    [
                        'question' => 'Je systém bezpečný?',
                        'answer' => 'Ano, používáme nejmodernější zabezpečení včetně SSL šifrování, 2FA autentifikace a pravidelných bezpečnostních auditů. Data jsou zálohována denně a uložena v certifikovaných datacentrech.'
                    ],
                    [
                        'question' => 'Můžu přistupovat k QRdokladu z mobilu?',
                        'answer' => 'Ano, QRdoklad je plně responzivní a funguje na všech zařízeních. Navíc připravujeme mobilní aplikace pro iOS a Android s pokročilými funkcemi.'
                    ],
                    [
                        'question' => 'Jak probíhá záloha mých dat?',
                        'answer' => 'Vaše data jsou automaticky zálohována každý den na několik různých lokací. Můžete si také kdykoliv exportovat kompletní zálohu všech vašich dat.'
                    ],
                    [
                        'question' => 'Nabízíte API pro vývojáře?',
                        'answer' => 'Ano, poskytujeme REST API pro integraci s dalšími systémy. API dokumentace je dostupná pro registrované uživatele a obsahuje příklady použití.'
                    ]
                ]
            ],
            'support' => [
                'title' => 'Podpora a služby',
                'questions' => [
                    [
                        'question' => 'Jak vás mohu kontaktovat, když budu potřebovat pomoc?',
                        'answer' => 'Podporu poskytujeme přes telefon, email, chat a ticketový systém. Telefonická podpora je dostupná Po-Pá 8:00-17:00, písemná podpora 24/7.'
                    ],
                    [
                        'question' => 'Nabízíte školení?',
                        'answer' => 'Ano, poskytujeme bezplatná online školení pro nové uživatele a pokročilé kurzy pro využití všech funkcí. Máme také video návody a webináře.'
                    ],
                    [
                        'question' => 'Co když najdu chybu v systému?',
                        'answer' => 'Chyby řešíme s nejvyšší prioritou. Nahlaste problém přes podporu a dostanete okamžitou odpověď. Za nahlášení kritických chyb poskytujeme odměny.'
                    ]
                ]
            ],
            'pricing' => [
                'title' => 'Ceny a balíčky',
                'questions' => [
                    [
                        'question' => 'Kolik stojí QRdoklad?',
                        'answer' => 'Nabízíme tři balíčky: Starter od 299 Kč/měsíc, Business od 599 Kč/měsíc a Enterprise s individuální cenou. Všechny ceny jsou uvedeny včetně DPH.'
                    ],
                    [
                        'question' => 'Jsou v cenách nějaké skryté poplatky?',
                        'answer' => 'Ne, všechny ceny jsou transparentní a finální. Neúčtujeme žádné poplatky za nastavení, transakce nebo překročení limitů. Platíte jen měsíční paušál.'
                    ],
                    [
                        'question' => 'Mohu změnit balíček během používání?',
                        'answer' => 'Ano, balíček můžete kdykoliv změnit nahoru i dolů. Změna se projeví v dalším fakturačním období. Případný přeplatek vám vrátíme.'
                    ],
                    [
                        'question' => 'Nabízíte slevy pro roční platby?',
                        'answer' => 'Ano, při roční platbě získáte slevu 20% z celkové částky. Platba se účtuje předem za celý rok s možností změny balíčku.'
                    ],
                    [
                        'question' => 'Co se stane, když přestanu platit?',
                        'answer' => 'Váš účet přejde do režimu pouze pro čtení - můžete si stáhnout svá data, ale nebudete moci vystavovat nové faktury. Data uchováváme 90 dní.'
                    ]
                ]
            ]
        ];
    }

    /**
     * Generuje XML sitemap
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
            ],
            [
                'loc' => $baseUrl . 'ochrana-osobnich-udaju',
                'changefreq' => 'yearly',
                'priority' => '0.3',
                'lastmod' => date('Y-m-d')
            ],
            [
                'loc' => $baseUrl . 'obchodni-podminky',
                'changefreq' => 'yearly',
                'priority' => '0.3',
                'lastmod' => date('Y-m-d')
            ],
            [
                'loc' => $baseUrl . 'faq',
                'changefreq' => 'monthly',
                'priority' => '0.6',
                'lastmod' => date('Y-m-d')
            ],
            [
                'loc' => $baseUrl . 'o-nas',
                'changefreq' => 'yearly',
                'priority' => '0.5',
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
            'name' => 'QRdoklad.cz',
            'alternateName' => 'QRdoklad',
            'url' => $baseUrl,
            'logo' => $baseUrl . 'images/logo.svg',
            'description' => 'Moderní fakturační systém s QR platbami pro české podnikatele',
            'foundingDate' => '2023',
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+420703985390',
                'contactType' => 'customer service',
                'email' => 'info@qrdoklad.cz',
                'availableLanguage' => 'Czech',
                'hoursAvailable' => 'Mo-Fr 08:00-17:00'
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Librantice 167',
                'addressLocality' => 'Librantice',
                'postalCode' => '503 46',
                'addressCountry' => 'CZ'
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
                'kontakt' => 'Kontakt',
                'privacy' => 'Ochrana osobních údajů',
                'terms' => 'Obchodní podmínky',
                'faq' => 'FAQ',
                'about' => 'O nás'
            ];

            $breadcrumbs['itemListElement'][] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $pageNames[$action] ?? ucfirst($action),
                'item' => $baseUrl . $this->getHttpRequest()->getUrl()->getPath()
            ];
        }

        return json_encode($breadcrumbs, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * KONTAKTNÍ FORMULÁŘ - OPRAVENO
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

        // OPRAVENO: Odstraněno "Enterprise řešení" z roletky
        $form->addSelect('subject', 'Předmět:', [
            '' => 'Vyberte předmět dotazu',
            'pricing' => 'Dotaz k ceníku',
            'features' => 'Dotaz k funkcím',
            'technical' => 'Technická podpora',
            'demo' => 'Požadavek na demo',
            'other' => 'Ostatní'
        ])->setRequired('Vyberte předmět zprávy');

        $form->addTextArea('message', 'Zpráva:')
            ->setRequired('Napište nám svou zprávu')
            ->setHtmlAttribute('placeholder', 'Popište nám svůj dotaz nebo požadavek...')
            ->setHtmlAttribute('rows', 5);

        // OPRAVENO: Checkbox s odkazem na privacy policy  
        $form->addCheckbox('privacy')
            ->setRequired('Musíte souhlasit se zpracováním osobních údajů')
            ->setHtmlAttribute('data-bs-toggle', 'tooltip')
            ->setHtmlAttribute('title', 'Přečtěte si naše zásady ochrany osobních údajů');

        $form->addSubmit('send', 'Odeslat zprávu')
            ->setHtmlAttribute('class', 'btn btn-primary btn-lg');

        $form->onSuccess[] = [$this, 'contactFormSucceeded'];

        return $form;
    }

    /**
     * Zpracování kontaktního formuláře
     */
    public function contactFormSucceeded(Form $form, \stdClass $values): void
    {
        // Debug - ověříme, že se metoda volá
        error_log("=== CONTACT FORM DEBUG ===");
        error_log("contactFormSucceeded() byla zavolána!");
        error_log("Přijaté hodnoty: " . print_r($values, true));
        
        try {
            // Pro lokální vývoj jen flash zpráva
            // Zde by bylo normálně odesílání e-mailu
            
            $message = "=== NOVÁ ZPRÁVA Z KONTAKTNÍHO FORMULÁŘE ===\n";
            $message .= "Datum: " . date('d.m.Y H:i:s') . "\n";
            $message .= "Jméno: " . $values->name . "\n";
            $message .= "E-mail: " . $values->email . "\n";
            $message .= "Firma: " . ($values->company ?: 'neuvedeno') . "\n";
            $message .= "Telefon: " . ($values->phone ?: 'neuvedeno') . "\n";
            $message .= "Předmět: " . $values->subject . "\n";
            $message .= "Zpráva: " . $values->message . "\n";
            $message .= "Souhlas: " . ($values->privacy ? 'ANO' : 'NE') . "\n";
            $message .= "==========================================\n\n";
            
            // Pokus o různé způsoby logování
            $logged = false;
            
            try {
                // Tracy log
                \Tracy\Debugger::log($message, 'contact-form');
                $logged = true;
                error_log("Tracy log: ÚSPĚCH");
            } catch (\Exception $e) {
                error_log("Tracy log: CHYBA - " . $e->getMessage());
            }
            
            if (!$logged) {
                try {
                    // Fallback - file_put_contents do temp
                    $logFile = __DIR__ . '/../../../temp/contact-form.log';
                    file_put_contents($logFile, $message, FILE_APPEND | LOCK_EX);
                    error_log("File log: ÚSPĚCH - " . $logFile);
                    $logged = true;
                } catch (\Exception $e) {
                    error_log("File log: CHYBA - " . $e->getMessage());
                }
            }
            
            if (!$logged) {
                try {
                    // Fallback - do www
                    $logFile = __DIR__ . '/../../../www/contact-form.log';
                    file_put_contents($logFile, $message, FILE_APPEND | LOCK_EX);
                    error_log("WWW log: ÚSPĚCH - " . $logFile);
                    $logged = true;
                } catch (\Exception $e) {
                    error_log("WWW log: CHYBA - " . $e->getMessage());
                }
            }
            
            // Pro debug - vypíšeme cestu k logu
            $logPath = \Tracy\Debugger::$logDirectory ?? (__DIR__ . '/../../../temp');
            
            $this->flashMessage('Děkujeme za vaši zprávu! Odpovíme vám do 24 hodin.', 'success');
            
            if ($logged) {
                $this->flashMessage('✅ DEBUG: Zpráva byla zalogována', 'info');
            } else {
                $this->flashMessage('❌ DEBUG: Log se nepodařilo uložit', 'warning');
            }
            
            $this->flashMessage('📁 DEBUG: Tracy log dir: ' . $logPath, 'info');
            $this->redirect('this');
            
        } catch (\Exception $e) {
            error_log("CHYBA v contactFormSucceeded: " . $e->getMessage());
            \Tracy\Debugger::log($e);
            $this->flashMessage('Omlouváme se, došlo k chybě při odesílání zprávy. Zkuste to prosím znovu nebo nás kontaktujte telefonicky.', 'error');
        }
    }

    /**
     * Generuje homepage schema
     */
    private function generateHomepageSchema(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'QRdoklad',
            'url' => $this->getHttpRequest()->getUrl()->getBaseUrl(),
            'description' => 'Moderní fakturační systém s QR platbami',
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => $this->getHttpRequest()->getUrl()->getBaseUrl() . 'search?q={search_term_string}',
                'query-input' => 'required name=search_term_string'
            ]
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Generuje features schema
     */
    private function generateFeaturesSchema(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'ItemList',
            'name' => 'Funkce QRdoklad',
            'description' => 'Kompletní přehled funkcí fakturačního systému',
            'numberOfItems' => 10,
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'QR platby',
                    'description' => 'Rychlé platby skenováním QR kódu'
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'ARES integrace',
                    'description' => 'Automatické vyhledávání firemních údajů'
                ]
            ]
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Generuje pricing schema
     */
    private function generatePricingSchema(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => 'QRdoklad',
            'description' => 'Fakturační systém s QR platbami',
            'offers' => [
                [
                    '@type' => 'Offer',
                    'name' => 'Starter',
                    'price' => '299',
                    'priceCurrency' => 'CZK',
                    'priceSpecification' => [
                        '@type' => 'UnitPriceSpecification',
                        'price' => '299',
                        'priceCurrency' => 'CZK',
                        'unitText' => 'měsíc'
                    ]
                ]
            ]
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Generuje contact schema
     */
    private function generateContactSchema(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'ContactPage',
            'name' => 'Kontakt - QRdoklad',
            'description' => 'Kontaktní informace pro QRdoklad'
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}