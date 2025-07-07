<?php

declare(strict_types=1);

namespace App\Presentation\Landing;

use Nette\Application\UI\Presenter;
use Nette\Application\UI\Form;
use Nette\Utils\DateTime;
use App\Core\SecurityHelper;
use App\Core\EmailService;
use App\Core\InputSanitizer;
use App\Core\CSPMiddleware;

final class LandingPresenter extends Presenter
{
    private SecurityHelper $securityHelper;
    private EmailService $emailService;
    private InputSanitizer $inputSanitizer;
    private CSPMiddleware $cspMiddleware;

    public function __construct(
        SecurityHelper $securityHelper, 
        EmailService $emailService,
        InputSanitizer $inputSanitizer,
        CSPMiddleware $cspMiddleware
    ) {
        parent::__construct();
        $this->securityHelper = $securityHelper;
        $this->emailService = $emailService;
        $this->inputSanitizer = $inputSanitizer;
        $this->cspMiddleware = $cspMiddleware;
    }

    /**
     * Společné nastavení pro všechny akce
     */
    protected function beforeRender(): void
    {
        parent::beforeRender();
        
        // ✅ KROK 3: Content Security Policy
        $this->cspMiddleware->applyCSP();
        
        // ✅ CSP specifické pro jednotlivé stránky
        $action = $this->getAction();
        if (in_array($action, ['kontakt', 'cenik', 'funkce'])) {
            $this->cspMiddleware->applyPageSpecificCSP($action);
        }
        
        // ✅ Přidání currentUrl pro Open Graph
        $this->template->currentUrl = $this->getHttpRequest()->getUrl()->getAbsoluteUrl();
        
        // ✅ CSP nonce pro template
        $this->template->cspNonce = $this->cspMiddleware->generateNonce();
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
     * Kontaktní formulář s CSRF ochranou a pokročilou sanitizací
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
                // ✅ KROK 3: Pokročilá sanitizace
                return $this->inputSanitizer->sanitizeText($value, 100);
            });

        $form->addEmail('email', 'E-mail:')
            ->setRequired('Prosím zadejte váš e-mail')
            ->addRule(Form::Email, 'Zadejte platný e-mail')
            ->addRule(Form::MaxLength, 'E-mail je příliš dlouhý (max %d znaků)', 255)
            ->addFilter(function($value) {
                // ✅ KROK 3: Email sanitizace
                $sanitized = $this->inputSanitizer->sanitizeEmail($value);
                return $sanitized !== false ? $sanitized : $value;
            });

        $form->addText('company', 'Firma:')
            ->setRequired(false)
            ->addRule(Form::MaxLength, 'Název firmy je příliš dlouhý (max %d znaků)', 200)
            ->addFilter(function($value) {
                return $this->inputSanitizer->sanitizeText($value, 200);
            });

        $form->addText('phone', 'Telefon:')
            ->setRequired(false)
            ->addRule(Form::MaxLength, 'Telefon je příliš dlouhý (max %d znaků)', 20)
            ->addFilter(function($value) {
                return $this->inputSanitizer->sanitizePhone($value);
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
                // ✅ KROK 3: Základní sanitizace (XSS detection je už v contactFormSucceeded)
                return $this->inputSanitizer->sanitizeHtml($value, ['<br>', '<p>', '<strong>', '<em>']);
            });

        $form->addCheckbox('privacy', '') // ✅ Prázdný label - popis je v latte template
            ->setRequired('Pro odeslání formuláře musíte souhlasit se zpracováním osobních údajů');

        $form->addSubmit('send', 'Odeslat zprávu')
            ->setHtmlAttribute('class', 'btn btn-primary btn-lg');

        $form->onSuccess[] = [$this, 'contactFormSucceeded'];

        // ✅ KROK 3: Dodatečné zabezpečení formuláře
        $form->getElementPrototype()->addAttributes([
            'novalidate' => true,
            'data-form' => 'contact',
            'data-csrf-protection' => 'enabled'
        ]);

        return $form;
    }

    /**
     * Zpracování kontaktního formuláře s rozšířenými bezpečnostními kontrolami
     */
    public function contactFormSucceeded(Form $form, \stdClass $values): void
    {
        try {
            // ✅ KROK 3: SPAM DETECTION PŘED SANITIZACÍ (důležité pořadí!)
            
            // 1. Rate limiting
            if (!$this->securityHelper->checkFormRateLimit('contact_form', 30)) {
                $this->flashMessage('Formulář můžete odeslat jen jednou za 30 sekund. Zkuste to znovu později.', 'error');
                $this->redirect('this');
                return;
            }
            
            // 2. Spam detection na RAW datech (před sanitizací)
            if (isset($values->message) && $this->securityHelper->checkSpamContent($values->message)) {
                $this->securityHelper->logSecurityEvent('spam_detected', [
                    'email' => $values->email ?? 'unknown',
                    'message_preview' => substr($values->message, 0, 100)
                ]);
                $this->flashMessage('Zpráva byla označena jako spam a nebyla odeslána.', 'error');
                $this->redirect('this');
                return;
            }
            
            // 3. XSS detection na RAW datech (před sanitizací)
            \Tracy\Debugger::log("Checking XSS for message: " . substr($values->message ?? '', 0, 100), 'debug');
            foreach ((array)$values as $field => $value) {
                if (is_string($value) && $this->inputSanitizer->detectXss($value)) {
                    \Tracy\Debugger::log("XSS detected in field {$field}: " . substr($value, 0, 100), 'security');
                    $this->securityHelper->logSecurityEvent('xss_detected', [
                        'field' => $field,
                        'email' => $values->email ?? 'unknown',
                        'value_preview' => substr($value, 0, 50)
                    ]);
                    $this->flashMessage('Formulář obsahuje neplatný obsah. Zkuste to znovu bez speciálních znaků.', 'error');
                    $this->redirect('this');
                    return;
                }
            }
            
            // Debug log pro spam detection
            \Tracy\Debugger::log("Checking spam for message: " . substr($values->message ?? '', 0, 100), 'debug');
            
            // ✅ TEPRVE NYNÍ SANITIZUJEME DATA
            $sanitizedData = $this->inputSanitizer->sanitizeFormData((array)$values);
            $values = (object)$sanitizedData;
            
            // ✅ DODATEČNÉ VALIDACE NA SANITIZOVANÝCH DATECH
            
            // 4. Pokročilá validace vstupních dat
            $validationErrors = $this->validateFormData($values);
            if (!empty($validationErrors)) {
                foreach ($validationErrors as $error) {
                    $this->flashMessage($error, 'error');
                }
                $this->redirect('this');
                return;
            }
            
            // 5. Email validace
            $emailValidationErrors = $this->emailService->validateEmailData($values);
            if (!empty($emailValidationErrors)) {
                foreach ($emailValidationErrors as $error) {
                    $this->flashMessage($error, 'error');
                }
                $this->redirect('this');
                return;
            }
            
            // 6. Honeypot kontrola (pokud by byla implementována)
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
                
                // ✅ KROK 3: Audit trail s sanitizovanými daty
                $this->securityHelper->logSecurityEvent('contact_form_success', [
                    'email' => $values->email,
                    'subject' => $values->subject,
                    'message_length' => strlen($values->message)
                ]);
            } else {
                $this->flashMessage('Omlouváme se, došlo k chybě při odesílání zprávy. Zkuste to prosím znovu.', 'error');
                $this->securityHelper->logSecurityEvent('email_send_failed', [
                    'email' => $values->email,
                    'subject' => $values->subject
                ]);
            }
            
        } catch (\Nette\Application\AbortException $e) {
            // ✅ AbortException je normální (redirect) - nepřeposíláme
            throw $e;
        } catch (\Nette\InvalidArgumentException $e) {
            // XSS nebo jiná bezpečnostní hrozba - už je zalogována
            \Tracy\Debugger::log("Security exception in form: " . $e->getMessage(), 'security');
            $this->flashMessage('Formulář obsahuje neplatný obsah. Zkuste to znovu bez speciálních znaků.', 'error');
        } catch (\Exception $e) {
            // Pouze skutečné neočekávané chyby
            \Tracy\Debugger::log("Unexpected error in contact form: " . $e->getMessage(), 'error');
            \Tracy\Debugger::log($e);
            $this->flashMessage('Omlouváme se, došlo k neočekávané chybě. Zkuste to prosím znovu.', 'error');
        }

        $this->redirect('this');
    }

    /**
     * ✅ KROK 3: Rozšířená validace formulářových dat (bez spam detection - ta je už před sanitizací)
     */
    private function validateFormData(\stdClass $values): array
    {
        $errors = [];
        
        // Kontrola velikosti dat (na sanitizovaných datech)
        foreach ((array)$values as $field => $value) {
            if (is_string($value) && !$this->inputSanitizer->checkInputSize($value, 5000)) {
                $errors[] = "Pole {$field} je příliš dlouhé.";
            }
        }
        
        // Validace emailu (znovu na sanitizovaných datech)
        if (isset($values->email)) {
            $cleanEmail = $this->inputSanitizer->sanitizeEmail($values->email);
            if ($cleanEmail === false) {
                $errors[] = 'Neplatná e-mailová adresa nebo zakázaná doména.';
            }
        }
        
        // POZNÁMKA: XSS a spam kontrola se dělá už před sanitizací
        
        return $errors;
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