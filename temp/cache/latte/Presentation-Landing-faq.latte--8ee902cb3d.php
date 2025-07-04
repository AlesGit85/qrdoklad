<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/faq.latte */
final class Template_8ee902cb3d extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/faq.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '
<!-- Hero sekce pro FAQ -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Často kladené <span class="text-primary">otázky</span>
                </h1>
                <p class="hero-subtitle">
                    Najděte rychlé odpovědi na nejčastější dotazy o QRdokladu. 
                    Pokud zde nenajdete odpověď, neváhejte nás kontaktovat.
                </p>
                
                <!-- Vyhledávání v FAQ -->
                <div class="mt-4">
                    <div class="search-box mx-auto" style="max-width: 500px;">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-start-0" 
                                   placeholder="Vyhledejte v otázkách..." 
                                   id="faqSearch">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ kategorie - rychlé odkazy -->
<section class="faq-categories py-4 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row g-3">
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#obecne" class="category-link">
                            <i class="bi bi-info-circle text-primary"></i>
                            <span>Obecné</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#funkce" class="category-link">
                            <i class="bi bi-gear text-success"></i>
                            <span>Funkce</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#ceny" class="category-link">
                            <i class="bi bi-currency-euro text-warning"></i>
                            <span>Ceny</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#technicke" class="category-link">
                            <i class="bi bi-wrench text-info"></i>
                            <span>Technické</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#bezpecnost" class="category-link">
                            <i class="bi bi-shield-check text-danger"></i>
                            <span>Bezpečnost</span>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="#podpora" class="category-link">
                            <i class="bi bi-headset text-secondary"></i>
                            <span>Podpora</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ obsah -->
<section class="faq-content py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">

                <!-- Obecné otázky -->
                <div class="faq-category mb-5" id="obecne">
                    <h2 class="category-title">
                        <i class="bi bi-info-circle text-primary me-2"></i>
                        Obecné otázky
                    </h2>
                    
                    <div class="accordion" id="obecneAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#obecne1">
                                    Co je QRdoklad?
                                </button>
                            </h2>
                            <div id="obecne1" class="accordion-collapse collapse show" data-bs-parent="#obecneAccordion">
                                <div class="accordion-body">
                                    <p>QRdoklad je moderní cloudový fakturační systém určený pro české podnikatele. Umožňuje rychlé vystavování faktur s QR platbami, automatické vyhledávání v ARES a kompletní správu klientů.</p>
                                    <p><strong>Klíčové výhody:</strong></p>
                                    <ul>
                                        <li>QR kódy pro okamžité platby</li>
                                        <li>Automatické doplňování údajů z ARES</li>
                                        <li>Přístup z jakéhokoliv zařízení</li>
                                        <li>Základní funkce zdarma navždy</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#obecne2">
                                    Je QRdoklad opravdu zdarma?
                                </button>
                            </h2>
                            <div id="obecne2" class="accordion-collapse collapse" data-bs-parent="#obecneAccordion">
                                <div class="accordion-body">
                                    <p><strong>Ano!</strong> Základní funkce QRdokladu jsou zdarma navždy:</p>
                                    <ul>
                                        <li>Neomezený počet faktur a klientů</li>
                                        <li>QR platby na všech fakturách</li>
                                        <li>ARES integrace</li>
                                        <li>Export do PDF</li>
                                        <li>Přístup z mobilu</li>
                                        <li>Email podpora</li>
                                    </ul>
                                    <p>Nemusíte zadávat platební kartu a nepřijdou vám žádné účty. Pro pokročilé funkce nabízíme jednorázové moduly.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#obecne3">
                                    Mohu systém používat na mobilu?
                                </button>
                            </h2>
                            <div id="obecne3" class="accordion-collapse collapse" data-bs-parent="#obecneAccordion">
                                <div class="accordion-body">
                                    <p>Samozřejmě! QRdoklad je plně responzivní a funguje perfektně na všech zařízeních:</p>
                                    <ul>
                                        <li><strong>Počítač/notebook</strong> - plná funkcionalita</li>
                                        <li><strong>Tablet</strong> - optimalizované rozhraní</li>
                                        <li><strong>Mobilní telefon</strong> - rychlé vystavování faktur</li>
                                    </ul>
                                    <p>Můžete vystavit fakturu kdekoliv - třeba u klienta přímo na místě.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#obecne4">
                                    Pro koho je QRdoklad určený?
                                </button>
                            </h2>
                            <div id="obecne4" class="accordion-collapse collapse" data-bs-parent="#obecneAccordion">
                                <div class="accordion-body">
                                    <p>QRdoklad je ideální pro:</p>
                                    <ul>
                                        <li><strong>OSVČ</strong> - freelanceři, konzultanti, řemeslníci</li>
                                        <li><strong>Malé firmy</strong> - do 50 zaměstnanců</li>
                                        <li><strong>Střední podniky</strong> - s potřebou pokročilých funkcí</li>
                                        <li><strong>Začínající podnikatele</strong> - díky bezplatné verzi</li>
                                    </ul>
                                    <p>Systém je navržený speciálně pro české prostředí s podporou DPH, ARES a českých bankovních standardů.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Funkce systému -->
                <div class="faq-category mb-5" id="funkce">
                    <h2 class="category-title">
                        <i class="bi bi-gear text-success me-2"></i>
                        Funkce systému
                    </h2>
                    
                    <div class="accordion" id="funkceAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funkce1">
                                    Jak fungují QR platby?
                                </button>
                            </h2>
                            <div id="funkce1" class="accordion-collapse collapse" data-bs-parent="#funkceAccordion">
                                <div class="accordion-body">
                                    <p>QR platby umožňují vašim klientům zaplatit fakturu během několika sekund:</p>
                                    <ol>
                                        <li><strong>Automatické generování</strong> - na každé faktuře se automaticky vytvoří QR kód</li>
                                        <li><strong>Skenování</strong> - klient naskenuje kód mobilním bankovnictvím</li>
                                        <li><strong>Okamžitá platba</strong> - všechny údaje se vyplní automaticky</li>
                                        <li><strong>Potvrzení</strong> - klient jen potvrdí platbu</li>
                                    </ol>
                                    <p><strong>Výhody:</strong> Žádné chyby v čísle účtu, rychlé platby, kompatibilita se všemi českymu bankami.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funkce2">
                                    Co je ARES integrace?
                                </button>
                            </h2>
                            <div id="funkce2" class="accordion-collapse collapse" data-bs-parent="#funkceAccordion">
                                <div class="accordion-body">
                                    <p>ARES integrace automaticky vyhledá a doplní údaje o firmě:</p>
                                    <ul>
                                        <li><strong>Zadáte pouze IČO</strong> - ostatní se vyplní samo</li>
                                        <li><strong>Automatické doplnění:</strong> Název firmy, adresa, DIČ</li>
                                        <li><strong>Aktuální data</strong> - vždy čerstvé informace z oficiální databáze</li>
                                        <li><strong>Ušetří čas</strong> - žádné opisování dlouhých názvů firem</li>
                                    </ul>
                                    <p>Funguje pro všechny české firmy a OSVČ registrované v databázi ARES.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funkce3">
                                    Mohu upravit vzhled faktur?
                                </button>
                            </h2>
                            <div id="funkce3" class="accordion-collapse collapse" data-bs-parent="#funkceAccordion">
                                <div class="accordion-body">
                                    <p><strong>Základní úpravy (zdarma):</strong></p>
                                    <ul>
                                        <li>Barevné přizpůsobení faktur</li>
                                        <li>Základní logo firmy</li>
                                        <li>Vlastní údaje v patičce</li>
                                    </ul>
                                    <p><strong>Pokročilé šablony (modul za 1990 Kč):</strong></p>
                                    <ul>
                                        <li>Kompletně vlastní design</li>
                                        <li>Více variant šablon</li>
                                        <li>Vlastní CSS úpravy</li>
                                        <li>Profesionální templates</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#funkce4">
                                    Jak fungují automatické připomínky?
                                </button>
                            </h2>
                            <div id="funkce4" class="accordion-collapse collapse" data-bs-parent="#funkceAccordion">
                                <div class="accordion-body">
                                    <p>Automatické připomínky (modul za 1 490 Kč) vám pomohou získat platby včas:</p>
                                    <ul>
                                        <li><strong>Před splatností</strong> - zdvořilé upozornění 3 dny před</li>
                                        <li><strong>V den splatnosti</strong> - připomenutí platby</li>
                                        <li><strong>Po splatnosti</strong> - urgence s možností úroků</li>
                                        <li><strong>Vlastní texty</strong> - přizpůsobené vaší komunikaci</li>
                                    </ul>
                                    <p>Každou připomínku můžete upravit nebo vypnout. E-maily se odesílají automaticky.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ceny a moduly -->
                <div class="faq-category mb-5" id="ceny">
                    <h2 class="category-title">
                        <i class="bi bi-currency-euro text-warning me-2"></i>
                        Ceny a moduly
                    </h2>
                    
                    <div class="accordion" id="cenyAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ceny1">
                                    Jak fungují jednorázové moduly?
                                </button>
                            </h2>
                            <div id="ceny1" class="accordion-collapse collapse" data-bs-parent="#cenyAccordion">
                                <div class="accordion-body">
                                    <p>Každý modul si zakoupíte pouze jednou a máte ho navždy:</p>
                                    <ul>
                                        <li><strong>Žádné předplatné</strong> - platíte jen jednou</li>
                                        <li><strong>Okamžitá aktivace</strong> - po zaplacení ihned dostupné</li>
                                        <li><strong>Navždy funkční</strong> - žádné vypínání po čase</li>
                                        <li><strong>Postupný nákup</strong> - kupujte jen to, co potřebujete</li>
                                    </ul>
                                    <p><strong>Příklad:</strong> Koupíte si modul "Automatické připomínky" za 990 Kč a máte ho navždy bez dalších poplatků.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ceny2">
                                    Jaké moduly nabízíte?
                                </button>
                            </h2>
                            <div id="ceny2" class="accordion-collapse collapse" data-bs-parent="#cenyAccordion">
                                <div class="accordion-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title text-success">Základní moduly (990 Kč)</h6>
                                                    <ul class="list-unstyled small">
                                                        <li>• Automatické připomínky</li>
                                                        <li>• Pokročilé reporty</li>
                                                        <li>• Email faktury</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h6 class="card-title text-warning">Pokročilé moduly (1990-3990 Kč)</h6>
                                                    <ul class="list-unstyled small">
                                                        <li>• Vlastní šablony faktur</li>
                                                        <li>• API přístup</li>
                                                        <li>• Pokročilá automatizace</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ceny3">
                                    Jsou nějaké skryté poplatky?
                                </button>
                            </h2>
                            <div id="ceny3" class="accordion-collapse collapse" data-bs-parent="#cenyAccordion">
                                <div class="accordion-body">
                                    <p><strong>Ne! Žádné skryté poplatky:</strong></p>
                                    <ul>
                                        <li>❌ Žádné měsíční poplatky za základní verzi</li>
                                        <li>❌ Žádné poplatky za transakce</li>
                                        <li>❌ Žádné poplatky za počet uživatelů</li>
                                        <li>❌ Žádné poplatky za úložiště</li>
                                        <li>❌ Žádné aktivační poplatky</li>
                                    </ul>
                                    <p><strong>Platíte jen:</strong> Jednorázově za moduly, které si koupíte. Ostatní je zdarma navždy.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#ceny4">
                                    Mohu si moduly koupit postupně?
                                </button>
                            </h2>
                            <div id="ceny4" class="accordion-collapse collapse" data-bs-parent="#cenyAccordion">
                                <div class="accordion-body">
                                    <p>Samozřejmě! To je celá myšlenka našeho systému:</p>
                                    <ol>
                                        <li><strong>Začněte zdarma</strong> - vyzkoušejte základní funkce</li>
                                        <li><strong>Kupte první modul</strong> - když pocítíte potřebu</li>
                                        <li><strong>Přidávejte postupně</strong> - podle růstu vašeho byznysu</li>
                                        <li><strong>Plaťte jen za to, co používáte</strong> - žádné nevyužité funkce</li>
                                    </ol>
                                    <p>Většina našich klientů začíná zdarma a postupně si dokupuje 1-3 moduly.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Technické otázky -->
                <div class="faq-category mb-5" id="technicke">
                    <h2 class="category-title">
                        <i class="bi bi-wrench text-info me-2"></i>
                        Technické otázky
                    </h2>
                    
                    <div class="accordion" id="technickeAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#technicke1">
                                    Jaké prohlížeče podporujete?
                                </button>
                            </h2>
                            <div id="technicke1" class="accordion-collapse collapse" data-bs-parent="#technickeAccordion">
                                <div class="accordion-body">
                                    <p>QRdoklad funguje ve všech moderních prohlížečích:</p>
                                    <ul>
                                        <li><strong>Chrome</strong> - verze 90+ (doporučeno)</li>
                                        <li><strong>Firefox</strong> - verze 88+</li>
                                        <li><strong>Safari</strong> - verze 14+</li>
                                        <li><strong>Edge</strong> - verze 90+</li>
                                    </ul>
                                    <p>Pro nejlepší výkon doporučujeme používat aktuální verzi Chrome nebo Firefox.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#technicke2">
                                    Můžu importovat data z jiného systému?
                                </button>
                            </h2>
                            <div id="technicke2" class="accordion-collapse collapse" data-bs-parent="#technickeAccordion">
                                <div class="accordion-body">
                                    <p>Ano, podporujeme import z většiny systémů:</p>
                                    <ul>
                                        <li><strong>CSV soubory</strong> - klienti, faktury, položky</li>
                                        <li><strong>Excel soubory</strong> - formát .xlsx</li>
                                        <li><strong>Pohoda</strong> - export a import</li>
                                        <li><strong>Money S3</strong> - export a import</li>
                                        <li><strong>Jiné systémy</strong> - na vyžádání</li>
                                    </ul>
                                    <p>Při registraci vám pomůžeme s přenosem dat zdarma.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#technicke3">
                                    Máte API pro integraci?
                                </button>
                            </h2>
                            <div id="technicke3" class="accordion-collapse collapse" data-bs-parent="#technickeAccordion">
                                <div class="accordion-body">
                                    <p>Ano! API přístup je dostupný jako modul za 3 990 Kč:</p>
                                    <ul>
                                        <li><strong>REST API</strong> - moderní rozhraní</li>
                                        <li><strong>Kompletní dokumentace</strong> - s příklady</li>
                                        <li><strong>SDK pro PHP</strong> - připravené knihovny</li>
                                        <li><strong>Webhooks</strong> - automatické notifikace</li>
                                    </ul>
                                    <p>Můžete propojit QRdoklad s vaším e-shopem, CRM nebo účetním systémem.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#technicke4">
                                    Funguje QRdoklad offline?
                                </button>
                            </h2>
                            <div id="technicke4" class="accordion-collapse collapse" data-bs-parent="#technickeAccordion">
                                <div class="accordion-body">
                                    <p>QRdoklad je cloudový systém, takže vyžaduje internetové připojení pro:</p>
                                    <ul>
                                        <li><strong>Synchronizaci dat</strong> - ukládání na server</li>
                                        <li><strong>ARES dotazy</strong> - aktuální data firem</li>
                                        <li><strong>Odesílání emailů</strong> - faktury a připomínky</li>
                                    </ul>
                                    <p><strong>Tip:</strong> Můžete připravit faktury offline v jiném programu a později je zadat do systému.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bezpečnost -->
                <div class="faq-category mb-5" id="bezpecnost">
                    <h2 class="category-title">
                        <i class="bi bi-shield-check text-danger me-2"></i>
                        Bezpečnost a data
                    </h2>
                    
                    <div class="accordion" id="bezpecnostAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bezpecnost1">
                                    Jsou moje data v bezpečí?
                                </button>
                            </h2>
                            <div id="bezpecnost1" class="accordion-collapse collapse" data-bs-parent="#bezpecnostAccordion">
                                <div class="accordion-body">
                                    <p>Bezpečnost dat je pro nás absolutní priorita:</p>
                                    <ul>
                                        <li><strong>SSL šifrování</strong> - všechna data přenášená šifrovaně</li>
                                        <li><strong>Šifrování hesel</strong> - pomocí bcrypt algoritmu</li>
                                        <li><strong>Hosting v ČR</strong> - data zůstávají v České republice</li>
                                        <li><strong>Pravidelné zálohy</strong> - denní automatické zálohy</li>
                                        <li><strong>Monitoring 24/7</strong> - neustálé sledování bezpečnosti</li>
                                    </ul>
                                    <p>Splňujeme bankovní standardy bezpečnosti.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bezpecnost2">
                                    Dodržujete GDPR?
                                </button>
                            </h2>
                            <div id="bezpecnost2" class="accordion-collapse collapse" data-bs-parent="#bezpecnostAccordion">
                                <div class="accordion-body">
                                    <p>Ano, plně dodržujeme GDPR:</p>
                                    <ul>
                                        <li><strong>Minimalizace dat</strong> - ukládáme jen nutné informace</li>
                                        <li><strong>Vaše práva</strong> - přístup, oprava, výmaz dat</li>
                                        <li><strong>Transparentnost</strong> - jasné informace o zpracování</li>
                                        <li><strong>Bezpečnost</strong> - technická a organizační opatření</li>
                                    </ul>
                                    <p>Detaily najdete v naší <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:privacy')) /* line 517 */;
		echo '">zásadách ochrany osobních údajů</a>.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bezpecnost3">
                                    Kde jsou data uložena?
                                </button>
                            </h2>
                            <div id="bezpecnost3" class="accordion-collapse collapse" data-bs-parent="#bezpecnostAccordion">
                                <div class="accordion-body">
                                    <p>Všechna data jsou uložena v České republice:</p>
                                    <ul>
                                        <li><strong>Hlavní server</strong> - datové centrum v Praze</li>
                                        <li><strong>Záložní server</strong> - datové centrum v Brně</li>
                                        <li><strong>České zákony</strong> - podléháme českému právu</li>
                                        <li><strong>EU standardy</strong> - v souladu s evropskými nařízeními</li>
                                    </ul>
                                    <p>Data neopouštějí území České republiky a EU.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bezpecnost4">
                                    Můžu si stáhnout svá data?
                                </button>
                            </h2>
                            <div id="bezpecnost4" class="accordion-collapse collapse" data-bs-parent="#bezpecnostAccordion">
                                <div class="accordion-body">
                                    <p>Samozřejmě! Vaše data zůstávají vaše:</p>
                                    <ul>
                                        <li><strong>Export kdykoliv</strong> - z uživatelského rozhraní</li>
                                        <li><strong>Formáty:</strong> CSV, Excel, PDF</li>
                                        <li><strong>Kompletní data</strong> - faktury, klienti, nastavení</li>
                                        <li><strong>Při ukončení</strong> - data dostupná 30 dní</li>
                                    </ul>
                                    <p>Nejste závislí na našem systému - data si můžete vzít kdykoliv.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Podpora -->
                <div class="faq-category mb-5" id="podpora">
                    <h2 class="category-title">
                        <i class="bi bi-headset text-secondary me-2"></i>
                        Podpora a kontakt
                    </h2>
                    
                    <div class="accordion" id="podporaAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#podpora1">
                                    Jak rychle odpovídáte na dotazy?
                                </button>
                            </h2>
                            <div id="podpora1" class="accordion-collapse collapse" data-bs-parent="#podporaAccordion">
                                <div class="accordion-body">
                                    <p>Snažíme se odpovědět co nejrychleji:</p>
                                    <ul>
                                        <li><strong>Email podpora</strong> - v pracovních dnech do 24 hodin</li>
                                        <li><strong>Víkendy a svátky</strong> - nejbližší pracovní den</li>
                                        <li><strong>Telefonní podpora</strong> - v pracovních dnech 9-17</li>
                                    </ul>
                                    <p><strong>Kontakt:</strong> <a href="mailto:info@qrdoklad.cz">info@qrdoklad.cz</a> nebo <a href="tel:+420703985390">+420 703 985 390</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#podpora2">
                                    Nabízíte školení?
                                </button>
                            </h2>
                            <div id="podpora2" class="accordion-collapse collapse" data-bs-parent="#podporaAccordion">
                                <div class="accordion-body">
                                    <p>Ano! Nabízíme různé formy školení:</p>
                                    <ul>
                                        <li><strong>Video tutoriály</strong> - zdarma pro všechny funkce</li>
                                        <li><strong>Online školení</strong> - individuální nebo skupinové</li>
                                        <li><strong>Telefonní vysvětlení</strong> - při řešení dotazů</li>
                                        <li><strong>Dokumentace</strong> - podrobné návody</li>
                                    </ul>
                                    <p>Základní školení poskytujeme zdarma všem novým uživatelům.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#podpora3">
                                    Máte nápovědu v systému?
                                </button>
                            </h2>
                            <div id="podpora3" class="accordion-collapse collapse" data-bs-parent="#podporaAccordion">
                                <div class="accordion-body">
                                    <p>Ano, nápověda je dostupná přímo v systému:</p>
                                    <ul>
                                        <li><strong>Kontextová nápověda</strong> - u každé funkce</li>
                                        <li><strong>Tooltips</strong> - vysvětlení u složitějších polí</li>
                                        <li><strong>Průvodce</strong> - pro první nastavení</li>
                                        <li><strong>FAQ sekce</strong> - nejčastější dotazy</li>
                                    </ul>
                                    <p>Většinu věcí zvládnete vyřešit přímo v systému bez kontaktování podpory.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#podpora4">
                                    Řešíte individuální úpravy?
                                </button>
                            </h2>
                            <div id="podpora4" class="accordion-collapse collapse" data-bs-parent="#podporaAccordion">
                                <div class="accordion-body">
                                    <p>Ano, nabízíme vývoj na míru:</p>
                                    <ul>
                                        <li><strong>Vlastní moduly</strong> - specifické pro váš byznys</li>
                                        <li><strong>API integrace</strong> - propojení s vašimi systémy</li>
                                        <li><strong>Speciální reporty</strong> - podle vašich potřeb</li>
                                        <li><strong>Vlastní šablony</strong> - design faktur na míru</li>
                                    </ul>
                                    <p>Cena se stanovuje individuálně podle složitosti. Kontaktujte nás pro cenovou nabídku.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CTA sekce -->
                <div class="text-center mt-5">
                    <div class="cta-section p-5 bg-primary rounded-3">
                        <h3 class="text-white mb-3">Nenašli jste odpověď?</h3>
                        <p class="text-white mb-4">
                            Neváhejte nás kontaktovat! Odpovídáme v pracovních dnech do 24 hodin a rádi vám pomůžeme.
                        </p>
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 662 */;
		echo '" class="btn btn-white btn-lg w-100 mb-3">
                                    <i class="bi bi-chat-dots me-2"></i>
                                    Kontaktovat podporu
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-outline-light btn-lg w-100">
                                    <i class="bi bi-rocket-takeoff me-2"></i>
                                    Vyzkoušet zdarma
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

';
	}
}
