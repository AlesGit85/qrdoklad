<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/default.latte */
final class Template_0da000aefc extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/default.latte';

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
<!-- Hero sekce -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Moderní fakturační systém 
                        <span class="text-primary">s QR platbami</span>
                    </h1>
                    <p class="hero-subtitle">
                        Vystavujte faktury rychle a jednoduše. Vaši klienti zaplatí pouhým nascanováním QR kódu. 
                        Automatické ARES vyhledávání a pokročilé funkce pro všechny podnikatele.
                    </p>
                    
                    <div class="hero-buttons">
                        <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-primary btn-lg me-3">
                            <i class="bi bi-rocket me-2"></i>
                            Vyzkoušet zdarma
                        </a>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 23 */;
		echo '" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-play-circle me-2"></i>
                            Zobrazit funkce
                        </a>
                    </div>
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-number" data-target="2000">0</div>
                            <div class="stat-label">Spokojených klientů</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-target="50000">0</div>
                            <div class="stat-label">Vystavených faktur</div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-number" data-target="247">247</div>
                            <div class="stat-label">% rychlost vystavení</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-image">
                    <div class="floating-card invoice-card">
                        <div class="card-header">
                            <h6 class="mb-0">Faktura #2025060013</h6>
                            <span class="badge bg-success">Zaplaceno</span>
                        </div>
                        <div class="invoice-total">65 840 Kč</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted">Splatnost</small><br>
                                <strong>29.06.2025</strong>
                            </div>
                            <div class="qr-code-placeholder"></div>
                        </div>
                    </div>
                    
                    <div class="floating-card stats-card">
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="stat-item">
                                    <h3 class="text-primary">16</h3>
                                    <p>Celkem faktur</p>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="stat-item">
                                    <h3 class="text-success">6</h3>
                                    <p>Zaplaceno</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Výhody sekce -->
<section class="benefits-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Proč si vybrat QRdoklad?</h2>
                <p class="section-subtitle">
                    Moderní technologie a intuitivní design pro maximální efektivitu vaší administrativy
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-qr-code"></i>
                    </div>
                    <h4>QR platby</h4>
                    <p>Vaši klienti mohou platit faktury jednoduše nascanováním QR kódu. Rychlé, bezpečné a pohodlné.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h4>ARES integrace</h4>
                    <p>Automatické vyhledávání firemních údajů z ARES databáze. Ušetřete čas a vyhněte se chybám.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-lightning"></i>
                    </div>
                    <h4>Rychlé vystavení</h4>
                    <p>Vystavte fakturu za méně než 2 minuty. Intuitivní rozhraní pro maximální efektivitu.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>Bezpečnost dat</h4>
                    <p>Vaše data jsou v bezpečí díky pokročilému šifrování a pravidelným zálohám.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <h4>Přehledy a reporty</h4>
                    <p>Kompletní přehled o vašich příjmech, výdajích a DPH. Jednoduché reporty pro účetnictví.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4>Správa klientů</h4>
                    <p>Uchovávejte všechny kontakty na jednom místě. Automatické vyplňování údajů z ARES.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NOVÁ SEKCE: Ukázka systému -->
<section class="system-preview-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Podívejte se, jak QRdoklad funguje</h2>
                <p class="section-subtitle">
                    Prohlédněte si skutečné rozhraní systému a přesvědčte se o jeho jednoduchosti
                </p>
            </div>
        </div>
        
        <!-- Hlavní ukázka - Dashboard -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto">
                <div class="system-preview-main">
                    <div class="preview-image-container">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 178 */;
		echo '/images/qrdoklad-dashboard.webp" 
                             alt="QRdoklad Dashboard - Přehled systému" 
                             class="img-fluid rounded shadow-lg preview-image">
                        <div class="preview-overlay">
                            <div class="preview-content">
                                <h4 class="text-white mb-3">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    Přehledný dashboard
                                </h4>
                                <p class="text-white-50 mb-0">
                                    Vše důležité na jednom místě - statistiky, blížící se splatnosti a rychlé akce
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Galerie dalších screenshotů -->
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="system-preview-card">
                    <div class="preview-image-container">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 202 */;
		echo '/images/qrdoklad-invoices.webp" 
                             alt="QRdoklad Faktury - Seznam všech faktur" 
                             class="img-fluid rounded preview-image">
                        <div class="preview-overlay">
                            <div class="preview-content">
                                <h5 class="text-white mb-2">
                                    <i class="bi bi-file-earmark-text me-2"></i>
                                    Správa faktur
                                </h5>
                                <p class="text-white-50 small mb-0">
                                    Přehled všech faktur s možností filtrování podle stavu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="system-preview-card">
                    <div class="preview-image-container">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 223 */;
		echo '/images/qrdoklad-clients.webp" 
                             alt="QRdoklad Klienti - Správa kontaktů" 
                             class="img-fluid rounded preview-image">
                        <div class="preview-overlay">
                            <div class="preview-content">
                                <h5 class="text-white mb-2">
                                    <i class="bi bi-people me-2"></i>
                                    Seznam klientů
                                </h5>
                                <p class="text-white-50 small mb-0">
                                    Všechny kontakty na jednom místě s ARES integrací
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="system-preview-card">
                    <div class="preview-image-container">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 244 */;
		echo '/images/qrdoklad-invoice_detail.webp" 
                             alt="QRdoklad Detail faktury - Kompletní informace" 
                             class="img-fluid rounded preview-image">
                        <div class="preview-overlay">
                            <div class="preview-content">
                                <h5 class="text-white mb-2">
                                    <i class="bi bi-file-earmark-check me-2"></i>
                                    Detail faktury
                                </h5>
                                <p class="text-white-50 small mb-0">
                                    Kompletní detail s možností stažení PDF
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- CTA v rámci sekce -->
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto text-center">
                <div class="system-preview-cta">
                    <h3 class="mb-3">Přesvědčili jsme vás?</h3>
                    <p class="text-muted mb-4">
                        Vyzkoušejte QRdoklad zdarma po dobu 30 dní. Bez závazků, bez platební karty.
                    </p>
                    <div class="cta-buttons">
                        <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-primary btn-lg me-3">
                            <i class="bi bi-rocket me-2"></i>
                            Začít zdarma
                        </a>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 276 */;
		echo '" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-list-check me-2"></i>
                            Všechny funkce
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials sekce -->
<section class="testimonials-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Co říkají naši klienti</h2>
                <p class="section-subtitle">
                    Přečtěte si zkušenosti podnikatelů, kteří už používají QRdoklad
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">
                        "QRdoklad mi ušetřil hodiny práce měsíčně. QR platby jsou skvělé - klienti platí mnohem rychleji."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h6>Martin Novák</h6>
                            <small>Freelancer, IT konzultant</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">
                        "Konečně systém, který funguje jak má. Jednoduché ovládání a skvělá podpora. Doporučuji!"
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h6>Jana Svobodová</h6>
                            <small>Majitelka e-shopu</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="testimonial-card">
                    <div class="testimonial-rating">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="testimonial-text">
                        "Přechod z Excelu byl hračka. Automatické ARES vyhledávání šetří spoustu času při vystavování faktur."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h6>Petr Dvořák</h6>
                            <small>Stavební firma</small>
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
                <h2 class="cta-title">Začněte už dnes</h2>
                <p class="cta-subtitle">
                    Připojte se k tisícům spokojených podnikatelů, kteří si zjednodušili fakturaci 
                    s QRdokladem. Žádné závazky, žádné skryté poplatky.
                </p>
                <div class="cta-buttons">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-rocket me-2"></i>
                        Vyzkoušet 30 dní zdarma
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 390 */;
		echo '" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-envelope me-2"></i>
                        Kontaktovat nás
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
