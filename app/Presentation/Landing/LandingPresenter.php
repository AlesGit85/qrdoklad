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
     * FAQ data - kompletní struktura s opravenými klíči
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
                'title' => 'Technická podpora',
                'questions' => [
                    [
                        'question' => 'Je QRdoklad bezpečný?',
                        'answer' => 'Ano, všechna data jsou šifrována SSL protokolem, pravidelně zálohována a uložena na serverech v EU. Systém je v souladu s GDPR a prochází pravidelnými bezpečnostními audity.'
                    ],
                    [
                        'question' => 'Funguje QRdoklad na mobilních zařízeních?',
                        'answer' => 'Ano, QRdoklad je plně responzivní a funguje na všech zařízeních - počítačích, tabletech i mobilních telefonech. Máme také mobilní aplikaci pro iOS a Android.'
                    ],
                    [
                        'question' => 'Co když budu potřebovat pomoc?',
                        'answer' => 'Nabízíme komplexní podporu prostřednictvím e-mailu, telefonu, chatu a rozsáhlé dokumentace. Odpovídáme do 24 hodin, často i rychleji.'
                    ],
                    [
                        'question' => 'Mohu importovat data z jiného systému?',
                        'answer' => 'Ano, pomůžeme vám s přenosem dat ze stávajícího systému. Podporujeme import ze standardních formátů (CSV, Excel) i z populárních fakturačních systémů.'
                    ],
                    [
                        'question' => 'Jaké jsou systémové požadavky?',
                        'answer' => 'QRdoklad funguje v libovolném moderním webovém prohlížeči (Chrome, Firefox, Safari, Edge). Není potřeba instalovat žádný software - vše běží online.'
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
            'description' => 'Moderní cloudový fakturační systém s QR platbami pro české podnikatele',
            'foundingDate' => '2024',
            'founders' => [
                [
                    '@type' => 'Person',
                    'name' => 'Jan Novák'
                ]
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+420703985390',
                'email' => 'info@qrdoklad.cz',
                'contactType' => 'customer service',
                'availableLanguage' => 'Czech',
                'areaServed' => 'CZ'
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
                'https://www.linkedin.com/company/qrdoklad',
                'https://twitter.com/qrdoklad'
            ]
        ];

        return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Generuje strukturovaná data pro homepage
     */
    private function generateHomepageSchema(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'QRdoklad',
            'url' => $this->getHttpRequest()->getUrl()->getBaseUrl(),
            'description' => 'Moderní fakturační systém s QR platbami pro české firmy',
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => $this->getHttpRequest()->getUrl()->getBaseUrl() . '?q={search_term_string}',
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
            'description' => 'Cloudový fakturační systém s QR platbami',
            'offers' => [
                [
                    '@type' => 'Offer',
                    'name' => 'Starter',
                    'price' => '299',
                    'priceCurrency' => 'CZK',
                    'billingIncrement' => 'P1M',
                    'description' => 'Základní balíček pro malé firmy'
                ],
                [
                    '@type' => 'Offer',
                    'name' => 'Business',
                    'price' => '599',
                    'priceCurrency' => 'CZK',
                    'billingIncrement' => 'P1M',
                    'description' => 'Pokročilý balíček pro rostoucí firmy'
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

        $form->addSelect('subject', 'Předmět:', [
            'general' => 'Obecný dotaz',
            'technical' => 'Technická podpora',
            'billing' => 'Fakturace a platby',
            'demo' => 'Požadavek na demo',
            'partnership' => 'Partnerství',
            'other' => 'Jiné'
        ])->setRequired('Vyberte předmět zprávy');

        $form->addTextArea('message', 'Zpráva:')
            ->setRequired('Napište nám svou zprávu')
            ->setHtmlAttribute('placeholder', 'Popište nám svůj dotaz nebo požadavek...')
            ->setHtmlAttribute('rows', 5);

        $form->addCheckbox('gdpr', 'Souhlasím se zpracováním osobních údajů podle GDPR')
            ->setRequired('Musíte souhlasit se zpracováním osobních údajů');

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
        // Zde by byl kód pro odeslání e-mailu
        // Pro demo jen přesměrujeme s flash zprávou

        $this->flashMessage('Děkujeme za vaši zprávu! Odpovíme vám do 24 hodin.', 'success');
        $this->redirect('this');
    }
}
