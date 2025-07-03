<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/cenik.latte */
final class Template_f64c1da45e extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/cenik.latte';

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
<!-- Hero sekce pro ceník -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    <span class="text-primary">Zdarma</span> navždy
                </h1>
                <p class="hero-subtitle">
                    Základní funkce QRdokladu jsou zcela zdarma bez časového omezení. 
                    Dodatečné moduly si dokupujete jednorázově podle potřeby.
                </p>
                <div class="hero-highlight mt-4">
                    <div class="highlight-header text-center mb-3">
                        <h5 class="highlight-title">Co máte zdarma navždy</h5>
                    </div>
                    <div class="row g-1">
                        <div class="col-md-6">
                            <div class="quick-contact-item">
                                <i class="bi bi-file-earmark-text-fill"></i>
                                <span>Neomezené vystavování faktur</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="quick-contact-item">
                                <i class="bi bi-people-fill"></i>
                                <span>Neomezený počet klientů</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="quick-contact-item">
                                <i class="bi bi-search-heart-fill"></i>
                                <span>ARES integrace</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="quick-contact-item">
                                <i class="bi bi-palette-fill"></i>
                                <span>Barevné přizpůsobitelné faktury</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="quick-contact-item">
                                <i class="bi bi-phone-fill"></i>
                                <span>Přístup z mobilu</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="quick-contact-item">
                                <i class="bi bi-person-plus-fill"></i>
                                <span>Neomezený počet uživatelských účtů</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Zdarma sekce -->
<section class="free-plan-section py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="pricing-card featured-plan border-primary">
                    <div class="popular-badge bg-primary">Navždy zdarma</div>
                    <div class="pricing-header text-center">
                        <h3 class="plan-name text-primary">QRdoklad ZDARMA</h3>
                        <p class="plan-description">Kompletní fakturace bez omezení</p>
                        <div class="price-display">
                            <span class="price text-primary">0 Kč</span>
                            <span class="period text-primary">navždy</span>
                        </div>
                        <p class="price-note text-primary"><strong>Žádné skryté poplatky, žádné časové omezení</strong></p>
                    </div>
                    
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <strong>Neomezené vystavování faktur</strong></li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <strong>Neomezený počet klientů</strong></li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <strong>ARES integrace</strong> - automatické načítání firemních údajů</li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <strong>Barevné přizpůsobitelné faktury</strong></li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <strong>Přístup z mobilu</strong> - responzivní rozhraní</li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <strong>Neomezený počet uživatelských účtů</strong></li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <strong>QR platby</strong> na všech fakturách</li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <strong>Export do PDF</strong></li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <strong>Základní reporty</strong></li>
                            <li><i class="bi bi-check-circle-fill text-primary"></i> <strong>Email podpora</strong></li>
                        </ul>
                    </div>
                    
                    <div class="pricing-footer">
                        <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-primary btn-lg w-100">
                            <i class="bi bi-rocket-takeoff me-2"></i>Začít zdarma
                        </a>
                        <p class="trial-info text-primary mt-2">
                            <strong>Registrace zdarma - bez platební karty</strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Moduly sekce -->
<section class="modules-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Rozšířené <span class="text-primary">moduly</span></h2>
                <p class="section-subtitle">
                    Rozšiřte si funkcionalitu QRdokladu podle potřeby. 
                    Každý modul si zakoupíte <strong>jednorázově</strong> a máte ho navždy.
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Email modul -->
            <div class="col-lg-4 col-md-6">
                <div class="module-card h-100">
                    <div class="module-header">
                        <div class="module-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <h4 class="module-name">Email modul</h4>
                        <p class="module-description">Automatické odesílání faktur emailem</p>
                    </div>
                    
                    <div class="module-features">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> Automatické odesílání faktur</li>
                            <li><i class="bi bi-check-circle-fill"></i> Vlastní email šablony</li>
                            <li><i class="bi bi-check-circle-fill"></i> Sledování otevření emailů</li>
                            <li><i class="bi bi-check-circle-fill"></i> Hromadné rozesílání</li>
                        </ul>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-price">
                            <span class="price">990 Kč</span>
                            <span class="price-note">jednorázově</span>
                        </div>
                        <a href="#" class="btn btn-outline-primary w-100">Koupit modul</a>
                    </div>
                </div>
            </div>

            <!-- Připomínky modul -->
            <div class="col-lg-4 col-md-6">
                <div class="module-card h-100">
                    <div class="module-header">
                        <div class="module-icon">
                            <i class="bi bi-alarm-fill"></i>
                        </div>
                        <h4 class="module-name">Automatické připomínky</h4>
                        <p class="module-description">Inteligentní systém upomínek</p>
                    </div>
                    
                    <div class="module-features">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> Automatické upomínky po splatnosti</li>
                            <li><i class="bi bi-check-circle-fill"></i> Konfigurovatelné lhůty</li>
                            <li><i class="bi bi-check-circle-fill"></i> Vlastní texty upomínek</li>
                            <li><i class="bi bi-check-circle-fill"></i> Eskalační pravidla</li>
                        </ul>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-price">
                            <span class="price">1 490 Kč</span>
                            <span class="price-note">jednorázově</span>
                        </div>
                        <a href="#" class="btn btn-outline-primary w-100">Koupit modul</a>
                    </div>
                </div>
            </div>

            <!-- Finanční přehledy -->
            <div class="col-lg-4 col-md-6">
                <div class="module-card h-100">
                    <div class="module-header">
                        <div class="module-icon">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                        <h4 class="module-name">Finanční přehledy</h4>
                        <p class="module-description">Pokročilé reporty a analýzy</p>
                    </div>
                    
                    <div class="module-features">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> Detailní finanční reporty</li>
                            <li><i class="bi bi-check-circle-fill"></i> Sledování obratu a zisku</li>
                            <li><i class="bi bi-check-circle-fill"></i> Grafy a statistiky</li>
                            <li><i class="bi bi-check-circle-fill"></i> Export do Excelu</li>
                        </ul>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-price">
                            <span class="price">1 990 Kč</span>
                            <span class="price-note">jednorázově</span>
                        </div>
                        <a href="#" class="btn btn-outline-primary w-100">Koupit modul</a>
                    </div>
                </div>
            </div>

            <!-- Automatické párování -->
            <div class="col-lg-4 col-md-6">
                <div class="module-card h-100">
                    <div class="module-header">
                        <div class="module-icon">
                            <i class="bi bi-link-45deg"></i>
                        </div>
                        <h4 class="module-name">Automatické párování</h4>
                        <p class="module-description">Párování plateb s fakturami</p>
                    </div>
                    
                    <div class="module-features">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> Import bankovních výpisů</li>
                            <li><i class="bi bi-check-circle-fill"></i> Automatické párování plateb</li>
                            <li><i class="bi bi-check-circle-fill"></i> Podpora více bank</li>
                            <li><i class="bi bi-check-circle-fill"></i> Přehled nezaplacených faktur</li>
                        </ul>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-price">
                            <span class="price">2 490 Kč</span>
                            <span class="price-note">jednorázově</span>
                        </div>
                        <a href="#" class="btn btn-outline-primary w-100">Koupit modul</a>
                    </div>
                </div>
            </div>

            <!-- API modul -->
            <div class="col-lg-4 col-md-6">
                <div class="module-card h-100">
                    <div class="module-header">
                        <div class="module-icon">
                            <i class="bi bi-code-slash"></i>
                        </div>
                        <h4 class="module-name">API přístup</h4>
                        <p class="module-description">Integrace s vlastními systémy</p>
                    </div>
                    
                    <div class="module-features">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> REST API dokumentace</li>
                            <li><i class="bi bi-check-circle-fill"></i> Integrace s e-shopy</li>
                            <li><i class="bi bi-check-circle-fill"></i> Webhooks podpora</li>
                            <li><i class="bi bi-check-circle-fill"></i> Technická podpora</li>
                        </ul>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-price">
                            <span class="price">3 990 Kč</span>
                            <span class="price-note">jednorázově</span>
                        </div>
                        <a href="#" class="btn btn-outline-primary w-100">Koupit modul</a>
                    </div>
                </div>
            </div>

            <!-- Premium podpora -->
            <div class="col-lg-4 col-md-6">
                <div class="module-card h-100">
                    <div class="module-header">
                        <div class="module-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <h4 class="module-name">Premium podpora</h4>
                        <p class="module-description">Prioritní podpora a školení</p>
                    </div>
                    
                    <div class="module-features">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> Prioritní řešení problémů</li>
                            <li><i class="bi bi-check-circle-fill"></i> Telefonická podpora</li>
                            <li><i class="bi bi-check-circle-fill"></i> Individuální školení</li>
                            <li><i class="bi bi-check-circle-fill"></i> Konzultace s experty</li>
                        </ul>
                    </div>
                    
                    <div class="module-footer">
                        <div class="module-price">
                            <span class="price">1 990 Kč</span>
                            <span class="price-note">jednorázově</span>
                        </div>
                        <a href="#" class="btn btn-outline-primary w-100">Koupit modul</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Balíčkové nabídky -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="package-offers p-4 bg-light rounded">
                    <h4 class="text-center mb-4">💰 Balíčkové nabídky</h4>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="package-card p-3 bg-white rounded border">
                                <h5 class="text-primary">Podnikatelský balíček</h5>
                                <p class="small text-muted">Email + Připomínky + Finanční přehledy</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-decoration-line-through text-muted">4 470 Kč</span>
                                    <span class="h5 text-primary mb-0">3 490 Kč</span>
                                </div>
                                <small class="text-success">Ušetříte 980 Kč</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="package-card p-3 bg-white rounded border">
                                <h5 class="text-primary">Kompletní balíček</h5>
                                <p class="small text-muted">Všechny moduly</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-decoration-line-through text-muted">12 940 Kč</span>
                                    <span class="h5 text-primary mb-0">8 990 Kč</span>
                                </div>
                                <small class="text-success">Ušetříte 3 950 Kč</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modulová kalkulačka -->
<section class="modules-calculator py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Kolik za moduly zaplatíte?</h2>
                <p class="section-subtitle">
                    Vyberte si moduly podle svých potřeb a porovnejte úspory oproti klasickým předplatným
                </p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="calculator-card">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="calculator-modules">
                                <h4>Vyberte potřebné moduly</h4>
                                
                                <div class="module-option">
                                    <label class="module-checkbox">
                                        <input type="checkbox" name="modules" value="990" data-name="Email modul">
                                        <span class="checkmark"></span>
                                        <div class="module-info">
                                            <h6>Email modul</h6>
                                            <p class="text-muted">Automatické odesílání faktur</p>
                                            <span class="module-price">990 Kč</span>
                                        </div>
                                    </label>
                                </div>
                                
                                <div class="module-option">
                                    <label class="module-checkbox">
                                        <input type="checkbox" name="modules" value="1490" data-name="Automatické připomínky">
                                        <span class="checkmark"></span>
                                        <div class="module-info">
                                            <h6>Automatické připomínky</h6>
                                            <p class="text-muted">Inteligentní systém upomínek</p>
                                            <span class="module-price">1 490 Kč</span>
                                        </div>
                                    </label>
                                </div>
                                
                                <div class="module-option">
                                    <label class="module-checkbox">
                                        <input type="checkbox" name="modules" value="1990" data-name="Finanční přehledy">
                                        <span class="checkmark"></span>
                                        <div class="module-info">
                                            <h6>Finanční přehledy</h6>
                                            <p class="text-muted">Pokročilé reporty a analýzy</p>
                                            <span class="module-price">1 990 Kč</span>
                                        </div>
                                    </label>
                                </div>
                                
                                <div class="module-option">
                                    <label class="module-checkbox">
                                        <input type="checkbox" name="modules" value="2490" data-name="Automatické párování">
                                        <span class="checkmark"></span>
                                        <div class="module-info">
                                            <h6>Automatické párování</h6>
                                            <p class="text-muted">Párování plateb s fakturami</p>
                                            <span class="module-price">2 490 Kč</span>
                                        </div>
                                    </label>
                                </div>
                                
                                <div class="module-option">
                                    <label class="module-checkbox">
                                        <input type="checkbox" name="modules" value="3990" data-name="API přístup">
                                        <span class="checkmark"></span>
                                        <div class="module-info">
                                            <h6>API přístup</h6>
                                            <p class="text-muted">Integrace s vlastními systémy</p>
                                            <span class="module-price">3 990 Kč</span>
                                        </div>
                                    </label>
                                </div>
                                
                                <div class="module-option">
                                    <label class="module-checkbox">
                                        <input type="checkbox" name="modules" value="1990" data-name="Premium podpora">
                                        <span class="checkmark"></span>
                                        <div class="module-info">
                                            <h6>Premium podpora</h6>
                                            <p class="text-muted">Prioritní podpora a školení</p>
                                            <span class="module-price">1 990 Kč</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="calculator-results">
                                <h4>Vaše úspora s QRdoklad</h4>
                                
                                <div class="result-item">
                                    <span class="result-label">Vybrané moduly:</span>
                                    <span class="result-value" id="selectedModules">Žádné</span>
                                </div>
                                
                                <div class="result-item total">
                                    <span class="result-label">Celková cena (jednorázově):</span>
                                    <span class="result-value highlight" id="totalPrice">0 Kč</span>
                                </div>
                                
                                <div class="comparison-section mt-4">
                                    <h5>Porovnání s konkurencí</h5>
                                    <div class="result-item">
                                        <span class="result-label">Konkurence za rok:</span>
                                        <span class="result-value competitor" id="competitorYear">0 Kč</span>
                                    </div>
                                    
                                    <div class="result-item">
                                        <span class="result-label">Konkurence za 3 roky:</span>
                                        <span class="result-value competitor" id="competitorThreeYears">0 Kč</span>
                                    </div>
                                    
                                    <div class="result-item roi">
                                        <span class="result-label">Vaše úspora za 3 roky:</span>
                                        <span class="result-value savings" id="totalSavings">0 Kč</span>
                                    </div>
                                </div>
                                
                                <div class="roi-info mt-4" id="roiInfo" style="display: none;">
                                    <h6>💰 Návratnost investice</h6>
                                    <p id="roiText">Moduly se vám vrátí během <strong id="roiMonths">0</strong> měsíců.</p>
                                    <p>Po tomto období máte všechny funkce <strong>zcela zdarma</strong>!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ sekce -->
<section class="faq-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Často kladené otázky</h2>
                <p class="section-subtitle">
                    Odpovědi na nejčastější dotazy ohledně ceniku a podmínek
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="pricingFAQ">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                Je QRdoklad opravdu zdarma navždy?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#pricingFAQ">
                            <div class="accordion-body">
                                Ano! Základní funkce QRdokladu (neomezené faktury, klienti, ARES integrace, přístup z mobilu) 
                                jsou kompletně zdarma bez časového omezení. Nemusíte zadávat platební kartu a nepřijdou vám žádné účty.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                Jak fungují jednorázové moduly?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                            <div class="accordion-body">
                                Každý modul si zakoupíte pouze jednou a máte ho navždy. Žádné měsíční poplatky, žádné předplatné. 
                                Kupujete si jen ty funkce, které skutečně potřebujete.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                Mohu si moduly koupit postupně?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                            <div class="accordion-body">
                                Samozřejmě! Můžete začít zdarma a postupně si dokupovat moduly podle toho, jak rostou vaše potřeby. 
                                Každý modul aktivujeme okamžitě po zaplacení.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                Jsou nějaké skryté poplatky?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                            <div class="accordion-body">
                                Ne! Základní funkce jsou skutečně zdarma a za moduly platíte jen jednorázově uvedenou cenu. 
                                Neúčtujeme žádné poplatky za nastavení, transakce nebo ukládání dat.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                                Co když budu potřebovat speciální funkcionalitu?
                            </button>
                        </h2>
                        <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                            <div class="accordion-body">
                                Pro specifické požadavky nabízíme vývoj na míru. Kontaktujte nás a domluvíme si individuální řešení 
                                včetně ceny a termínů realizace.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA sekce -->
<section class="cta-section py-5 bg-primary text-white">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="cta-title mb-4">
                    Začněte fakturovat už dnes
                </h2>
                <p class="cta-subtitle text-white mb-4">
                    Registrace je zdarma a zabere jen pár minut. Žádné závazky, žádné platební karty.
                </p>
                <div class="cta-buttons">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-white btn-lg me-3">
                        <i class="bi bi-rocket-takeoff me-2"></i>Začít zdarma
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 584 */;
		echo '" class="btn btn-outline-light btn-lg">
                        Máte otázky?
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
