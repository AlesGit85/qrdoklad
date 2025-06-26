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
                    Transparentní <span class="text-primary">ceník</span>
                </h1>
                <p class="hero-subtitle">
                    Vyberte si balíček podle velikosti vašeho podnikání. 
                    Bez skrytých poplatků, bez závazků, se zárukou spokojenosti.
                </p>
                <div class="pricing-toggle mt-4">
                    <div class="toggle-wrapper">
                        <span class="toggle-label">Měsíčně</span>
                        <div class="price-toggle">
                            <input type="checkbox" id="priceToggle" class="toggle-input">
                            <label for="priceToggle" class="toggle-label-switch"></label>
                        </div>
                        <span class="toggle-label">Ročně <span class="discount-badge">-20%</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing sekce -->
<section class="pricing-section py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <!-- Starter balíček -->
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="plan-name">Starter</h3>
                        <p class="plan-description">Pro začínající podnikatele</p>
                        <div class="price-display">
                            <span class="price monthly-price">299 Kč</span>
                            <span class="price annual-price" style="display: none;">239 Kč</span>
                            <span class="period">/měsíc</span>
                        </div>
                        <p class="price-note annual-note" style="display: none;">Fakturováno ročně (2 868 Kč)</p>
                    </div>
                    
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Do 50 faktur</strong> měsíčně</li>
                            <li><i class="bi bi-check-circle-fill"></i> QR platby na všech fakturách</li>
                            <li><i class="bi bi-check-circle-fill"></i> ARES automatické vyhledávání</li>
                            <li><i class="bi bi-check-circle-fill"></i> Základní šablony faktur</li>
                            <li><i class="bi bi-check-circle-fill"></i> Správa klientů</li>
                            <li><i class="bi bi-check-circle-fill"></i> Export do PDF</li>
                            <li><i class="bi bi-check-circle-fill"></i> Email podpora</li>
                            <li><i class="bi bi-check-circle-fill"></i> Mobilní aplikace</li>
                        </ul>
                    </div>
                    
                    <div class="pricing-footer">
                        <a href="https://app.qrdoklad.cz/sign/up?plan=starter" class="btn btn-outline-primary btn-lg w-100">
                            Začít se Starter
                        </a>
                        <p class="trial-info">30 dní zdarma, poté 299 Kč/měsíc</p>
                    </div>
                </div>
            </div>

            <!-- Business balíček (DOPORUČENÝ) -->
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card featured-plan">
                    <div class="popular-badge">Nejoblíbenější</div>
                    <div class="pricing-header">
                        <h3 class="plan-name">Business</h3>
                        <p class="plan-description">Pro rostoucí firmy</p>
                        <div class="price-display">
                            <span class="price monthly-price">599 Kč</span>
                            <span class="price annual-price" style="display: none;">479 Kč</span>
                            <span class="period">/měsíc</span>
                        </div>
                        <p class="price-note annual-note" style="display: none;">Fakturováno ročně (5 748 Kč)</p>
                    </div>
                    
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Neomezené faktury</strong></li>
                            <li><i class="bi bi-check-circle-fill"></i> Všechny Starter funkce</li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Vlastní šablony</strong> faktur</li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Opakující se faktury</strong></li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Pokročilé reporty</strong> a analýzy</li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Automatické připomínky</strong></li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>API přístup</strong></li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Prioritní podpora</strong></li>
                            <li><i class="bi bi-check-circle-fill"></i> Více uživatelských účtů</li>
                        </ul>
                    </div>
                    
                    <div class="pricing-footer">
                        <a href="https://app.qrdoklad.cz/sign/up?plan=business" class="btn btn-primary btn-lg w-100">
                            Začít s Business
                        </a>
                        <p class="trial-info">30 dní zdarma, poté 599 Kč/měsíc</p>
                    </div>
                </div>
            </div>

            <!-- Enterprise balíček -->
            <div class="col-lg-4 col-md-6">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="plan-name">Enterprise</h3>
                        <p class="plan-description">Pro velké společnosti</p>
                        <div class="price-display">
                            <span class="price">Na míru</span>
                        </div>
                        <p class="price-note">Individuální nabídka</p>
                    </div>
                    
                    <div class="pricing-features">
                        <ul class="feature-list">
                            <li><i class="bi bi-check-circle-fill"></i> Všechny Business funkce</li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Vlastní vývoj</strong> funkcí</li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Dedikovaný server</strong></li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>SLA garantie</strong> 99.9%</li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Školení týmu</strong></li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>24/7 telefonní podpora</strong></li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Integrace</strong> s vašimi systémy</li>
                            <li><i class="bi bi-check-circle-fill"></i> <strong>Backup & Security</strong> na míru</li>
                        </ul>
                    </div>
                    
                    <div class="pricing-footer">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 134 */;
		echo '" class="btn btn-outline-primary btn-lg w-100">
                            Kontaktujte nás
                        </a>
                        <p class="trial-info">Individuální konzultace zdarma</p>
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
                    Odpovědi na nejčastější dotazy ohledně ceníku a podmínek
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="pricingFAQ">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                                Jak funguje 30denní zkušební období?
                            </button>
                        </h2>
                        <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#pricingFAQ">
                            <div class="accordion-body">
                                Prvních 30 dní můžete používat QRdoklad zcela zdarma bez omezení. Nepotřebujete zadat platební kartu. 
                                Po uplynutí zkušebního období si můžete vybrat vhodný balíček nebo službu ukončit.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                                Mohu změnit balíček během používání?
                            </button>
                        </h2>
                        <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                            <div class="accordion-body">
                                Ano, balíček můžete změnit kdykoli. Při upgradu se rozdíl doplatí poměrně, při downgradu 
                                se rozdíl započítá do následujícího období.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                                Jaké jsou způsoby platby?
                            </button>
                        </h2>
                        <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                            <div class="accordion-body">
                                Podporujeme platby kartou (Visa, Mastercard), bankovním převodem a QR platbami. 
                                Pro Enterprise zákazníky nabízíme i fakturaci na splátky.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                                Jsou v ceně zahrnuty všechny funkce?
                            </button>
                        </h2>
                        <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                            <div class="accordion-body">
                                Ano, každý balíček obsahuje všechny uvedené funkce bez skrytých poplatků. 
                                Neúčtujeme extra za QR kódy, e-maily nebo ukládání dat.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                                Mohu službu kdykoli zrušit?
                            </button>
                        </h2>
                        <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#pricingFAQ">
                            <div class="accordion-body">
                                Ano, službu můžete zrušit kdykoli bez výpovědní lhůty. Vaše data zůstanou dostupná 
                                ještě 30 dní po zrušení pro případný export.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kalkulačka úspor -->
<section class="savings-calculator py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Kolik vám QRdoklad ušetří?</h2>
                <p class="section-subtitle">
                    Spočítejte si, kolik času a peněz ušetříte přechodem na QRdoklad
                </p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="calculator-card">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="calculator-inputs">
                                <h4>Vaše současná situace</h4>
                                
                                <div class="input-group">
                                    <label>Počet faktur měsíčně:</label>
                                    <input type="range" id="invoiceCount" min="5" max="200" value="20" class="form-range">
                                    <span id="invoiceCountValue">20</span>
                                </div>
                                
                                <div class="input-group">
                                    <label>Čas na jednu fakturu (minuty):</label>
                                    <input type="range" id="timePerInvoice" min="5" max="60" value="15" class="form-range">
                                    <span id="timePerInvoiceValue">15</span>
                                </div>
                                
                                <div class="input-group">
                                    <label>Vaše hodinová sazba (Kč):</label>
                                    <input type="range" id="hourlyRate" min="200" max="2000" value="800" step="50" class="form-range">
                                    <span id="hourlyRateValue">800</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="calculator-results">
                                <h4>Vaše úspora s QRdoklad</h4>
                                
                                <div class="savings-item">
                                    <div class="savings-label">Čas ušetřený měsíčně:</div>
                                    <div class="savings-value" id="timeSaved">8 hodin</div>
                                </div>
                                
                                <div class="savings-item">
                                    <div class="savings-label">Finanční úspora měsíčně:</div>
                                    <div class="savings-value" id="moneySaved">6 400 Kč</div>
                                </div>
                                
                                <div class="savings-item">
                                    <div class="savings-label">Úspora za rok:</div>
                                    <div class="savings-value highlight" id="yearlySavings">76 800 Kč</div>
                                </div>
                                
                                <div class="roi-info">
                                    <p>Návratnost investice: <strong id="roiTime">1 týden</strong></p>
                                </div>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="cta-title">Začněte šetřit už dnes</h2>
                <p class="cta-subtitle">
                    Přidejte se k tisícům spokojených podnikatelů, kteří díky QRdokladu 
                    ušetří desítky hodin měsíčně a tisíce korun ročně.
                </p>
                <div class="cta-buttons">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-rocket-takeoff me-2"></i>
                        Vyzkoušet 30 dní zdarma
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 321 */;
		echo '" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-chat-dots me-2"></i>
                        Poradit s výběrem
                    </a>
                </div>
                
                <div class="guarantee-info mt-4">
                    <p class="mb-0">
                        <i class="bi bi-shield-check me-2"></i>
                        30denní záruka vrácení peněz • Bez platební karty • Zrušitelné kdykoli
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
