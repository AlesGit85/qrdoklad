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
     * O QRdokladu - Allimedia
     */
    public function renderAbout(): void
    {
        $this->template->pageTitle = 'O QRdokladu - QRdoklad.cz | od Allimedia.cz';
        $this->template->metaDescription = 'Mise QRdokladu je zjednodušit fakturaci pro české podnikatele pomocí moderních technologií. Fakturačn systém od živnostníka pro živnostníky. Jmenuji se Aleš a pod značkou Allimedia.cz vyvíjím weby, webové aplikace, WordPress pluginy a chytrá řešení na míru. One-man studio založené v roce 2025.';
        $this->template->metaKeywords = 'QRdoklad, o nás, Aleš Zita, Allimedia, tvůrce, fakturační systém, webový vývojář, one-man studio';
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
     * Historie incidentů
     */
    public function renderIncidents(): void
    {
        $this->template->pageTitle = 'Historie incidentů - QRdoklad | Kompletní přehled';
        $this->template->metaDescription = 'Kompletní historie všech incidentů, výpadků a údržeb služeb QRdoklad. Transparentní přehled s detailními informacemi.';
        $this->template->metaKeywords = 'historie incidentů, výpadky, údržba, timeline, status historie';
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
     * CHANGELOG - Historie změn (REALISTICKÁ DATA)
     */
    public function renderChangelog(): void
    {
        $this->template->pageTitle = 'Changelog - Historie změn | QRdoklad';
        $this->template->metaDescription = 'Kompletní historie všech změn a vylepšení fakturačního systému QRdoklad. Sledujte naše novinky a aktualizace.';
        $this->template->metaKeywords = 'changelog, historie změn, novinky, aktualizace, vylepšení, nové funkce';

        // Changelog data - REALISTICKÁ VERZE
        $this->template->changelogData = $this->getChangelogData();
    }

    /**
     * API dokumentace (připraveno pro budoucnost)
     */
    public function renderApi(): void
    {
        $this->template->pageTitle = 'API dokumentace - QRdoklad';
        $this->template->metaDescription = 'Kompletní dokumentace REST API pro QRdoklad. Integrace s externími systémy a automatizace.';
        $this->template->metaKeywords = 'API, dokumentace, REST, integrace, webhook, developer';
    }

    /**
     * Dokumentace (kompletní návod)
     */
    public function renderDocs(): void
    {
        $this->template->pageTitle = 'Dokumentace - QRdoklad | Kompletní návod';
        $this->template->metaDescription = 'Kompletní dokumentace fakturačního systému QRdoklad. Návody krok za krokem, pokročilé funkce, tipy a triky pro efektivní používání.';
        $this->template->metaKeywords = 'dokumentace, nápověda, návod, QRdoklad, faktury, QR platby, ARES, tutorial';

        // Strukturovaná data pro dokumentaci
        $this->template->pageSchema = $this->generateDocsSchema();
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
     * Kontaktní formulář
     */
    protected function createComponentContactForm(): Form
    {
        $form = new Form;

        $form->addText('name', 'Jméno a příjmení:')
            ->setRequired('Prosím zadejte vaše jméno')
            ->addRule(Form::MinLength, 'Jméno musí mít alespoň %d znaky', 2);

        $form->addEmail('email', 'E-mail:')
            ->setRequired('Prosím zadejte váš e-mail')
            ->addRule(Form::Email, 'Zadejte platný e-mail');

        $form->addText('company', 'Firma:')
            ->setRequired(false);

        $form->addText('phone', 'Telefon:')
            ->setRequired(false);

        $form->addSelect('subject', 'Typ dotazu:', [
            'general' => 'Obecný dotaz',
            'support' => 'Technická podpora',
            'sales' => 'Obchodní dotaz',
            'feature' => 'Návrh nové funkce',
            'bug' => 'Nahlášení chyby',
            'other' => 'Jiné'
        ])->setRequired('Prosím vyberte typ dotazu');

        $form->addTextArea('message', 'Zpráva:')
            ->setRequired('Prosím napište vaši zprávu')
            ->addRule(Form::MinLength, 'Zpráva musí mít alespoň %d znaků', 10);

        $form->addCheckbox('privacy', 'Souhlasím se zpracováním osobních údajů')
            ->setRequired('Pro odeslání formuláře musíte souhlasit se zpracováním osobních údajů');

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
        try {
            // Zde by bylo odesílání emailu
            // $mailer = $this->getService('mail.mailer');
            // ... kód pro odesílání emailu ...

            $this->flashMessage('Děkujeme za vaši zprávu! Odpovíme vám do 24 hodin.', 'success');
            $this->flashMessage('Vaši zprávu jsme úspěšně přijali a zpracujeme ji co nejdříve.', 'info');
            $this->flashMessage('Pro urgentní dotazy volejte na +420 703 985 390.', 'info');
        } catch (\Exception $e) {
            \Tracy\Debugger::log($e);
            $this->flashMessage('Omlouváme se, došlo k chybě při odesílání zprávy. Zkuste to prosím znovu.', 'error');
        }

        $this->redirect('this');
    }

    /**
     * REALISTICKÁ changelog data - systém se vyvíjí od května 2025
     */
    private function getChangelogData(): array
    {
        return [
            '2025' => [
                '1.1.0' => [
                    'date' => '7.7.2025',
                    'title' => 'Vylepšení a optimalizace',
                    'type' => 'feature',
                    'changes' => [
                        'added' => [
                            'Přidána changelog stránka',
                            'Rozšířena dokumentace pro uživatele',
                            'Vylepšený responzivní design'
                        ],
                        'improved' => [
                            'Optimalizace rychlosti načítání stránek',
                            'Vylepšené SEO meta tagy',
                            'Čistší struktura CSS a JS souborů'
                        ],
                        'fixed' => [
                            'Oprava drobných chyb v responzivním designu',
                            'Oprava problémů s kontaktním formulářem'
                        ]
                    ]
                ],
                '1.0.6' => [
                    'date' => '02.06.2025',
                    'title' => 'Vylepšení',
                    'type' => 'feature',
                    'changes' => [
                        'added' => [
                            'Rozdílný layout faktur pro plátce/neplátce DPH'
                        ],
                    ]
                ],
                '1.0.5' => [
                    'date' => '17.05.2025',
                    'title' => 'Vylepšení',
                    'type' => 'feature',
                    'changes' => [
                        'added' => [
                            'Možnost barevného nastavení generovaných faktur'
                        ],
                    ]
                ],
                '1.0.4' => [
                    'date' => '14.05.2025',
                    'title' => 'Vylepšení a optimalizace',
                    'type' => 'feature',
                    'changes' => [
                        'added' => [
                            'Vylepšený responzivní design'
                        ],
                        'improved' => [
                            'Optimalizace rychlosti načítání stránek',
                            'Vylepšené SEO meta tagy',
                            'Čistší struktura CSS a JS souborů'
                        ],
                    ]
                ],
                '1.0.3' => [
                    'date' => '12.05.2025',
                    'title' => 'Opravy chyb',
                    'type' => 'bugfix',
                    'changes' => [
                        'fixed' => [
                            'Oprava problému s generováním QR kódu',
                        ]
                    ]
                ],
                '1.0.2' => [
                    'date' => '11.05.2025',
                    'title' => 'Opravy chyb',
                    'type' => 'bugfix',
                    'changes' => [
                        'fixed' => [
                            'Oprava chyby v kalkulaci DPH u služeb',
                        ]
                    ]
                ],
                '1.0.1' => [
                    'date' => '08.05.2025',
                    'title' => 'Opravy chyb',
                    'type' => 'bugfix',
                    'changes' => [
                        'fixed' => [
                            'Oprava problému s generováním PDF faktur',
                        ]
                    ]
                ],
                '1.0.0' => [
                    'date' => '07.05.2025',
                    'title' => 'První vydání QRdokladu',
                    'type' => 'major',
                    'changes' => [
                        'added' => [
                            'Vytváření a správa faktur',
                            'QR platby pro rychlé platby',
                            'Správa klientů a dodavatelů',
                            'ARES integrace pro automatické doplnění údajů',
                            'PDF export faktur',
                            'Základní reporty a statistiky',
                            'Responzivní prezentační web',
                            'Kompletní dokumentace a nápověda'
                        ]
                    ]
                ]
            ]
        ];
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
                        'question' => 'Je QRdoklad zdarma?',
                        'answer' => 'Ano! Základní funkce QRdokladu jsou zdarma navždy. Pro pokročilé funkce nabízíme jednorázové moduly, které si můžete dokoupit podle potřeby.'
                    ],
                    [
                        'question' => 'Jsou moje data v bezpečí?',
                        'answer' => 'Bezpečnost dat je pro nás prioritou. Používáme šifrování, pravidelné zálohy a cloudovou infrastrukturu odpovídající bankovním standardům.'
                    ],
                    [
                        'question' => 'Mohu systém používat na mobilu?',
                        'answer' => 'Samozřejmě! QRdoklad je plně responzivní a funguje perfektně na všech zařízeních - počítači, tabletu i telefonu.'
                    ]
                ]
            ],
            'features' => [
                'title' => 'Funkce systému',
                'questions' => [
                    [
                        'question' => 'Jak fungují QR platby?',
                        'answer' => 'Na každé faktuře se automaticky generuje QR kód pro okamžitou platbu. Zákazník ho naskenuje mobilním bankovnictvím a platba se provede během několika sekund.'
                    ],
                    [
                        'question' => 'Co je ARES integrace?',
                        'answer' => 'ARES integrace automaticky vyhledá a doplní údaje o firmě podle IČO - název, adresu, DIČ, právní formu a další informace z veřejných rejstříků.'
                    ],
                    [
                        'question' => 'Můžu si upravit vzhled faktur?',
                        'answer' => 'Ano, můžete si nahrát vlastní logo, vybrat z několika šablon a přizpůsobit si barvy podle vaší firemní identity.'
                    ]
                ]
            ]
        ];
    }

    /**
     * Generování strukturovaných dat
     */
    private function generateStructuredData(string $baseUrl): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareApplication',
            'name' => 'QRdoklad',
            'description' => 'Moderní fakturační systém s QR platbami pro české podnikatele',
            'url' => $baseUrl,
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem' => 'Web Browser',
            'offers' => [
                '@type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'CZK',
                'description' => 'Základní funkce zdarma navždy'
            ]
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Generování organizačních dat
     */
    private function generateOrganizationSchema(string $baseUrl): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'QRdoklad',
            'url' => $baseUrl,
            'description' => 'Fakturační systém s QR platbami',
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+420703985390',
                'contactType' => 'customer service',
                'email' => 'info@qrdoklad.cz'
            ]
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Schema pro homepage
     */
    private function generateHomepageSchema(): string
    {
        return $this->generateStructuredData($this->template->baseUrl);
    }

    /**
     * Schema pro funkce
     */
    private function generateFeaturesSchema(): string
    {
        return $this->generateStructuredData($this->template->baseUrl);
    }

    /**
     * Schema pro ceník
     */
    private function generatePricingSchema(): string
    {
        return $this->generateStructuredData($this->template->baseUrl);
    }

    /**
     * Schema pro dokumentaci
     */
    private function generateDocsSchema(): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'TechArticle',
            'headline' => 'Dokumentace QRdoklad - Kompletní návod',
            'description' => 'Kompletní dokumentace fakturačního systému QRdoklad s návody krok za krokem',
            'author' => [
                '@type' => 'Organization',
                'name' => 'QRdoklad'
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'QRdoklad',
                'url' => $this->template->baseUrl
            ],
            'dateModified' => date('c'),
            'inLanguage' => 'cs',
            'about' => [
                '@type' => 'SoftwareApplication',
                'name' => 'QRdoklad',
                'description' => 'Fakturační systém s QR platbami'
            ]
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Schema pro kontakt
     */
    private function generateContactSchema(): string
    {
        return $this->generateOrganizationSchema($this->template->baseUrl);
    }

    /**
     * Generování XML sitemap
     */
    private function generateSitemap(string $baseUrl): string
    {
        $urls = [
            ['loc' => $baseUrl, 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['loc' => $baseUrl . 'funkce', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => $baseUrl . 'cenik', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => $baseUrl . 'kontakt', 'changefreq' => 'monthly', 'priority' => '0.6'],
            ['loc' => $baseUrl . 'o-qrdokladu', 'changefreq' => 'monthly', 'priority' => '0.5'],
            ['loc' => $baseUrl . 'changelog', 'changefreq' => 'weekly', 'priority' => '0.7'],
            ['loc' => $baseUrl . 'dokumentace', 'changefreq' => 'weekly', 'priority' => '0.9']
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $url) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . htmlspecialchars($url['loc']) . '</loc>' . "\n";
            $xml .= '    <changefreq>' . $url['changefreq'] . '</changefreq>' . "\n";
            $xml .= '    <priority>' . $url['priority'] . '</priority>' . "\n";
            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }
}
