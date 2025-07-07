<?php

declare(strict_types=1);

namespace App\Presentation\Landing;

use Tracy\Debugger;
use Nette\Utils\DateTime;
use App\Core\EmailService;
use App\Core\SecurityHelper;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;

final class LandingPresenter extends Presenter
{
    private SecurityHelper $securityHelper;
    private EmailService $emailService;

    public function __construct(SecurityHelper $securityHelper, EmailService $emailService)
    {
        parent::__construct();
        $this->securityHelper = $securityHelper;
        $this->emailService = $emailService;
    }

    /**
     * Společné nastavení pro všechny akce
     */
    protected function beforeRender(): void
    {
        parent::beforeRender();
        
        // ✅ Přidání currentUrl pro Open Graph
        $this->template->currentUrl = $this->getHttpRequest()->getUrl()->getAbsoluteUrl();
    }

    /**
     * Homepage - domovská stránka
     */
    public function renderDefault(): void
    {
        $this->template->pageTitle = 'QRdoklad - Moderní fakturační systém s QR platbami';
        $this->template->metaDescription = 'Vystavujte faktury s QR kódy pro okamžité platby. Automatické načítání údajů z ARES, šablony faktur, evidence plateb a mnoho dalšího.';
        $this->template->metaKeywords = 'QR faktury, fakturační systém, ARES, QR platby, elektronické faktury';
        
        // Strukturovaná data pro SEO
        $this->template->pageSchema = $this->generateHomepageSchema();
    }

    /**
     * Funkce - přehled funkcí systému
     */
    public function renderFunkce(): void
    {
        $this->template->pageTitle = 'Funkce - QRdoklad | Přehled všech funkcí fakturačního systému';
        $this->template->metaDescription = 'Objevte všechny funkce QRdoklad: QR platby, ARES integrace, šablony faktur, automatizace, API a mnoho dalšího pro snadné fakturování.';
        $this->template->metaKeywords = 'funkce, QR platby, ARES, šablony faktur, automatizace, API, fakturační systém';
    }

    /**
     * Ceník - cenové balíčky
     */
    public function renderCenik(): void
    {
        $this->template->pageTitle = 'Ceník - QRdoklad | Cenové balíčky pro každého';
        $this->template->metaDescription = 'Transparentní ceník QRdoklad. Starter od 199 Kč/měsíc, Business a Enterprise balíčky. Bez skrytých poplatků, možnost vyzkoušet zdarma.';
        $this->template->metaKeywords = 'ceník, ceny, balíčky, starter, business, enterprise, zdarma, zkušební verze';
    }

    /**
     * Kontakt - kontaktní formulář a informace
     */
    public function renderKontakt(): void
    {
        $this->template->pageTitle = 'Kontakt - QRdoklad | Napište nám nebo zavolejte';
        $this->template->metaDescription = 'Kontaktujte tým QRdoklad. Technická podpora, obchodní dotazy nebo návrhy vylepšení. Odpovíme do 24 hodin.';
        $this->template->metaKeywords = 'kontakt, podpora, technická podpora, obchodní dotazy, návrhy';
    }

    /**
     * Privacy Policy
     */
    public function renderPrivacy(): void
    {
        $this->template->pageTitle = 'Zásady ochrany osobních údajů - QRdoklad';
        $this->template->metaDescription = 'Informace o zpracování osobních údajů v systému QRdoklad v souladu s GDPR.';
        $this->template->metaKeywords = 'GDPR, ochrana údajů, soukromí, privacy policy';
    }

    /**
     * Terms of Service
     */
    public function renderTerms(): void
    {
        $this->template->pageTitle = 'Obchodní podmínky - QRdoklad';
        $this->template->metaDescription = 'Obchodní podmínky pro používání fakturačního systému QRdoklad.';
        $this->template->metaKeywords = 'obchodní podmínky, terms of service, TOS';
    }

    /**
     * About - o systému
     */
    public function renderAbout(): void
    {
        $this->template->pageTitle = 'O systému - QRdoklad | Proč jsme vytvořili nejlepší fakturační systém';
        $this->template->metaDescription = 'Příběh QRdoklad. Zjistěte, proč jsme vytvořili moderní fakturační systém s QR platbami a jak pomáháme firmám zefektivnit fakturování.';
        $this->template->metaKeywords = 'o nás, příběh, tým, mise, vize, QR platby, faktury';
    }

    /**
     * Status - stav systému a služeb
     */
    public function renderStatus(): void
    {
        $this->template->pageTitle = 'Stav systému - QRdoklad | Aktuální provozní informace';
        $this->template->metaDescription = 'Kontrola stavu všech služeb QRdoklad. Aktuální provozní informace, plánované údržby a historie incidentů.';
        $this->template->metaKeywords = 'status, stav systému, provoz, údržba, výpadky, monitoring';
    }

    /**
     * Help - nápověda a často kladené otázky
     */
    public function renderHelp(): void
    {
        $this->template->pageTitle = 'Nápověda - QRdoklad | Často kladené otázky a návody';
        $this->template->metaDescription = 'Kompletní nápověda k QRdoklad. FAQ, návody krok za krokem, video tutoriály a tipy pro efektivní používání.';
        $this->template->metaKeywords = 'nápověda, FAQ, návody, help, tutoriály, tipy, dokumentace';
    }

    /**
     * Blog - novinky a články
     */
    public function renderBlog(): void
    {
        $this->template->pageTitle = 'Blog - QRdoklad | Novinky, tipy a trendy ve fakturování';
        $this->template->metaDescription = 'Aktuální články o fakturování, změnách v legislativě, tipech pro podnikatele a novinkách v QRdoklad.';
        $this->template->metaKeywords = 'blog, články, novinky, tipy, fakturování, legislativa, podnikání';
    }

    /**
     * API - technická dokumentace
     */
    public function renderApi(): void
    {
        $this->template->pageTitle = 'API Dokumentace - QRdoklad | REST API pro vývojáře';
        $this->template->metaDescription = 'Kompletní REST API dokumentace pro QRdoklad. Integrace s externími systémy a automatizace.';
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
     * Changelog - historie změn
     */
    public function renderChangelog(): void
    {
        $this->template->pageTitle = 'Changelog - QRdoklad | Historie změn a novinky';
        $this->template->metaDescription = 'Sledujte vývoj QRdoklad. Kompletní historie změn, nové funkce, vylepšení a opravy chyb. Vždy aktuální přehled všech novinek.';
        $this->template->metaKeywords = 'changelog, historie změn, novinky, aktualizace, vývoj, verze';

        // ✅ Předání dat do template
        $this->template->changelogData = $this->getChangelogData();
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
     * Kontaktní formulář s CSRF ochranou
     */
    protected function createComponentContactForm(): Form
    {
        $form = new Form;

        // ✅ KROK 1: CSRF OCHRANA (opravená syntaxe)
        $form->addProtection('Bezpečnostní token vypršel. Odešlete formulář znovu.');

        $form->addText('name', 'Jméno a příjmení:')
            ->setRequired('Prosím zadejte vaše jméno')
            ->addRule(Form::MinLength, 'Jméno musí mít alespoň %d znaky', 2)
            ->addRule(Form::MaxLength, 'Jméno je příliš dlouhé (max %d znaků)', 100)
            ->addFilter(function($value) {
                return trim(strip_tags($value)); // Základní sanitization
            });

        $form->addEmail('email', 'E-mail:')
            ->setRequired('Prosím zadejte váš e-mail')
            ->addRule(Form::Email, 'Zadejte platný e-mail')
            ->addRule(Form::MaxLength, 'E-mail je příliš dlouhý (max %d znaků)', 255)
            ->addFilter(function($value) {
                return trim(strtolower($value));
            });

        $form->addText('company', 'Firma:')
            ->setRequired(false)
            ->addRule(Form::MaxLength, 'Název firmy je příliš dlouhý (max %d znaků)', 200)
            ->addFilter(function($value) {
                return trim(strip_tags($value));
            });

        $form->addText('phone', 'Telefon:')
            ->setRequired(false)
            ->addRule(Form::MaxLength, 'Telefon je příliš dlouhý (max %d znaků)', 20)
            ->addFilter(function($value) {
                return trim(strip_tags($value));
            });

        $form->addSelect('subject', 'Typ dotazu:', [
            'general' => 'Obecný dotaz',
            'support' => 'Technická podpora',
            'sales' => 'Obchodní dotaz',
            'feature' => 'Návrh nové funkce',
            'bug' => 'Nahlášení chyby',
            'technical' => 'Technický problém',
            'other' => 'Jiné'
        ])->setRequired('Prosím vyberte typ dotazu');

        $form->addTextArea('message', 'Zpráva:')
            ->setRequired('Prosím napište vaši zprávu')
            ->addRule(Form::MinLength, 'Zpráva musí mít alespoň %d znaků', 10)
            ->addRule(Form::MaxLength, 'Zpráva je příliš dlouhá (max %d znaků)', 2000)
            ->addFilter(function($value) {
                return trim(strip_tags($value, '<br><p>')); // Povolíme základní HTML tagy
            });

        $form->addCheckbox('privacy', '') // ✅ Prázdný label - popis je v latte template
            ->setRequired('Pro odeslání formuláře musíte souhlasit se zpracováním osobních údajů');

        $form->addSubmit('send', 'Odeslat zprávu')
            ->setHtmlAttribute('class', 'btn btn-primary btn-lg');

        $form->onSuccess[] = [$this, 'contactFormSucceeded'];

        // Zabezpečení proti spam botům
        $form->getElementPrototype()->addAttributes([
            'novalidate' => true,
            'data-form' => 'contact'
        ]);

        return $form;
    }

    /**
     * Zpracování kontaktního formuláře s bezpečnostními kontrolami
     */
    public function contactFormSucceeded(Form $form, \stdClass $values): void
    {
        try {
            // ✅ BEZPEČNOSTNÍ KONTROLY
            
            // 1. Rate limiting
            if (!$this->securityHelper->checkFormRateLimit('contact_form', 30)) {
                $this->flashMessage('Formulář můžete odeslat jen jednou za 30 sekund. Zkuste to znovu později.', 'error');
                $this->redirect('this');
                return;
            }
            
            // 2. Validace email dat
            $validationErrors = $this->emailService->validateEmailData($values);
            if (!empty($validationErrors)) {
                foreach ($validationErrors as $error) {
                    $this->flashMessage($error, 'error');
                }
                $this->redirect('this');
                return;
            }
            
            // 3. Honeypot kontrola (pokud by byla implementována)
            if (!$this->securityHelper->checkHoneypot((array)$values)) {
                $this->securityHelper->logSecurityEvent('honeypot_triggered', ['email' => $values->email]);
                $this->flashMessage('Došlo k chybě při odesílání. Zkuste to prosím znovu.', 'error');
                $this->redirect('this');
                return;
            }
            
            // ✅ KROK 2: ODESÍLÁNÍ EMAILŮ
            $emailSent = $this->emailService->sendContactForm($values);
            
            if ($emailSent) {
                $this->flashMessage('Děkujeme za vaši zprávu! Odpovíme vám do 24 hodin.', 'success');
                $this->flashMessage('Vaši zprávu jsme úspěšně přijali a zpracujeme ji co nejdříve.', 'info');
            } else {
                $this->flashMessage('Omlouváme se, došlo k chybě při odesílání zprávy. Zkuste to prosím znovu.', 'error');
                $this->securityHelper->logSecurityEvent('email_send_failed', [
                    'email' => $values->email,
                    'subject' => $values->subject
                ]);
            }
            
        } catch (\Exception $e) {
            \Tracy\Debugger::log($e);
            $this->flashMessage('Omlouváme se, došlo k neočekávané chybě. Zkuste to prosím znovu.', 'error');
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
                    'date' => '30.05.2025',
                    'title' => 'Opravy a stabilita',
                    'type' => 'bugfix',
                    'changes' => [
                        'fixed' => [
                            'Oprava problému s generováním QR kódů',
                            'Vylepšena stabilita systému'
                        ]
                    ]
                ],
                '1.0.0' => [
                    'date' => '15.05.2025',
                    'title' => 'První veřejná verze',
                    'type' => 'major',
                    'changes' => [
                        'added' => [
                            'Základní funkce fakturování',
                            'QR platby pro faktury',
                            'ARES integrace',
                            'Responzivní webové rozhraní'
                        ]
                    ]
                ]
            ]
        ];
    }

    /**
     * Generuje JSON-LD schema pro homepage
     */
    private function generateHomepageSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'SoftwareApplication',
            'name' => 'QRdoklad',
            'description' => 'Moderní fakturační systém s QR platbami',
            'url' => $this->getHttpRequest()->getUrl()->getBaseUrl(),
            'applicationCategory' => 'BusinessApplication',
            'operatingSystem' => 'Web',
            'offers' => [
                '@type' => 'Offer',
                'price' => '199',
                'priceCurrency' => 'CZK',
                'priceSpecification' => [
                    '@type' => 'UnitPriceSpecification',
                    'price' => '199',
                    'priceCurrency' => 'CZK',
                    'unitText' => 'měsíc'
                ]
            ]
        ];

        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Generuje JSON-LD schema pro dokumentaci
     */
    private function generateDocsSchema(): string
    {
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'TechArticle',
            'headline' => 'Dokumentace QRdoklad',
            'description' => 'Kompletní návod k používání fakturačního systému QRdoklad',
            'author' => [
                '@type' => 'Organization',
                'name' => 'QRdoklad'
            ]
        ];

        return json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    }

    /**
     * Generuje XML sitemap
     */
    private function generateSitemap(string $baseUrl): string
    {
        $urls = [
            ['loc' => $baseUrl, 'priority' => '1.0', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . 'funkce', 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . 'cenik', 'priority' => '0.9', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . 'kontakt', 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . 'about', 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => $baseUrl . 'help', 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . 'docs', 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['loc' => $baseUrl . 'privacy', 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['loc' => $baseUrl . 'terms', 'priority' => '0.3', 'changefreq' => 'yearly'],
        ];

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $url) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>{$url['loc']}</loc>\n";
            $xml .= "    <priority>{$url['priority']}</priority>\n";
            $xml .= "    <changefreq>{$url['changefreq']}</changefreq>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }
}