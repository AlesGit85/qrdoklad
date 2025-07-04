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
     * O mně - Allimedia
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
                        'answer' => 'ARES integrace automaticky vyhledá a doplní údaje o firmě podle IČO - název, adresu, DIČ. Ušetří vám čas při zakládání nových klientů.'
                    ],
                    [
                        'question' => 'Mohu upravit vzhled faktur?',
                        'answer' => 'Ano! Máte k dispozici vlastní šablony faktur, můžete nahrát svoje logo a přizpůsobit barvy podle vaší firemní identity.'
                    ]
                ]
            ],
            'support' => [
                'title' => 'Podpora a pomoc',
                'questions' => [
                    [
                        'question' => 'Jak rychle odpovídáte na dotazy?',
                        'answer' => 'Odpovídáme do 24 hodin, v pracovních dnech obvykle během několika hodin. Pro urgentní dotazy máme také telefonní podporu.'
                    ],
                    [
                        'question' => 'Nabízíte školení?',
                        'answer' => 'Ano! Poskytujeme bezplatné online školení pro nové uživatele a také video tutoriály pro všechny funkce systému.'
                    ]
                ]
            ]
        ];
    }

    /**
     * Vytvoření kontaktního formuláře
     */
    protected function createComponentContactForm(): Form
    {
        $form = new Form;
        $form->setHtmlAttribute('class', 'contact-form');

        $form->addText('name', 'Jméno a příjmení:')
            ->setRequired('Zadejte prosím jméno a příjmení')
            ->setHtmlAttribute('class', 'form-control')
            ->setHtmlAttribute('placeholder', 'Jan Novák');

        $form->addEmail('email', 'E-mailová adresa:')
            ->setRequired('Zadejte prosím e-mailovou adresu')
            ->setHtmlAttribute('class', 'form-control')
            ->setHtmlAttribute('placeholder', 'jan@example.com');

        $form->addText('company', 'Název firmy:')
            ->setHtmlAttribute('class', 'form-control')
            ->setHtmlAttribute('placeholder', 'Vaše firma s.r.o.');

        $form->addText('phone', 'Telefon:')
            ->setHtmlAttribute('class', 'form-control')
            ->setHtmlAttribute('placeholder', '+420 123 456 789');

        $form->addSelect('subject', 'Předmět:', [
            '' => 'Vyberte předmět dotazu',
            'pricing' => 'Dotaz k ceníku',
            'features' => 'Dotaz k funkcím',
            'technical' => 'Technická podpora',
            'demo' => 'Požadavek na demo',
            'other' => 'Ostatní'
        ])
            ->setRequired('Vyberte předmět zprávy')
            ->setHtmlAttribute('class', 'form-control');

        $form->addTextArea('message', 'Zpráva:')
            ->setRequired('Zadejte prosím text zprávy')
            ->setHtmlAttribute('class', 'form-control')
            ->setHtmlAttribute('rows', 5)
            ->setHtmlAttribute('placeholder', 'Zde napište vaši zprávu...');

        $form->addCheckbox('privacy', 'Souhlasím se zpracováním osobních údajů')
            ->setRequired('Musíte souhlasit se zpracováním osobních údajů')
            ->setHtmlAttribute('class', 'form-check-input');

        $form->addSubmit('send', 'Odeslat zprávu')
            ->setHtmlAttribute('class', 'btn btn-primary');

        $form->onSuccess[] = [$this, 'contactFormSucceeded'];

        return $form;
    }

    /**
     * Zpracování kontaktního formuláře
     */
    public function contactFormSucceeded(Form $form, array $data): void
    {
        try {
            // Zde by byla logika pro odeslání e-mailu
            // Pro demo účely pouze nastavíme flash zprávu

            // Log pro debug (můžeš odebrat v produkci)
            error_log("=== NOVÁ ZPRÁVA Z KONTAKTNÍHO FORMULÁŘE ===");
            error_log("Jméno: " . $data['name']);
            error_log("E-mail: " . $data['email']);
            error_log("Firma: " . ($data['company'] ?: 'neuvedeno'));
            error_log("Telefon: " . ($data['phone'] ?: 'neuvedeno'));
            error_log("Předmět: " . $data['subject']);
            error_log("Zpráva: " . $data['message']);
            error_log("Souhlas: " . ($data['privacy'] ? 'ANO' : 'NE'));

            $this->flashMessage('Děkujeme za vaši zprávu! Odpovíme vám do 24 hodin.', 'success');
            $this->redirect('this');
        } catch (\Exception $e) {
            $this->flashMessage('Omlouváme se, ale při odesílání zprávy došlo k chybě. Zkuste to prosím znovu.', 'error');
        }
    }

    /**
     * Vygenerování strukturovaných dat pro homepage
     */
    private function generateHomepageSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareApplication',
            'name' => 'QRdoklad',
            'description' => 'Moderní fakturační systém s QR platbami pro české podnikatele',
            'url' => $this->getHttpRequest()->getUrl()->getBaseUrl(),
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem' => 'Web Browser',
            'offers' => [
                '@type' => 'Offer',
                'price' => '0',
                'priceCurrency' => 'CZK',
                'description' => 'Základní funkce zdarma navždy'
            ]
        ];

        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Vygenerování strukturovaných dat pro funkce
     */
    private function generateFeaturesSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'Funkce QRdokladu',
            'description' => 'Kompletní přehled všech funkcí fakturačního systému QRdoklad',
            'url' => $this->getHttpRequest()->getUrl()->getAbsoluteUrl()
        ];

        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Vygenerování strukturovaných dat pro ceník
     */
    private function generatePricingSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebPage',
            'name' => 'Ceník QRdoklad',
            'description' => 'Transparentní ceník fakturačního systému QRdoklad',
            'url' => $this->getHttpRequest()->getUrl()->getAbsoluteUrl()
        ];

        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Vygenerování strukturovaných dat pro kontakt
     */
    private function generateContactSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'ContactPage',
            'name' => 'Kontakt - QRdoklad',
            'description' => 'Kontaktní informace pro QRdoklad',
            'url' => $this->getHttpRequest()->getUrl()->getAbsoluteUrl()
        ];

        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Vygenerování strukturovaných dat
     */
    private function generateStructuredData(string $baseUrl): string
    {
        $data = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'QRdoklad',
            'url' => $baseUrl,
            'description' => 'Moderní fakturační systém s QR platbami',
            'foundingDate' => '2025',
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+420-703-985-390',
                'contactType' => 'customer service',
                'availableLanguage' => 'Czech'
            ]
        ];

        return json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Vygenerování organizačního schématu
     */
    private function generateOrganizationSchema(string $baseUrl): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => 'Allimedia',
            'founder' => [
                '@type' => 'Person',
                'name' => 'Aleš Zita'
            ],
            'foundingDate' => '2025',
            'description' => 'One-man studio specializující se na vývoj webů, WordPress pluginů a chytrých řešení na míru',
            'url' => $baseUrl,
            'sameAs' => [
                $baseUrl
            ]
        ];

        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Vygenerování XML sitemap
     */
    private function generateSitemap(string $baseUrl): string
    {
        $urls = [
            ['loc' => $baseUrl, 'changefreq' => 'weekly', 'priority' => '1.0'],
            ['loc' => $baseUrl . 'funkce', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => $baseUrl . 'cenik', 'changefreq' => 'monthly', 'priority' => '0.8'],
            ['loc' => $baseUrl . 'kontakt', 'changefreq' => 'monthly', 'priority' => '0.6'],
            ['loc' => $baseUrl . 'o-nas', 'changefreq' => 'monthly', 'priority' => '0.5']
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
