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
                            Začít zdarma
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
                            <div class="stat-number" data-target="247">0</div>
                            <div class="stat-label">% rychlost vystavení</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="hero-image">
                    <div class="floating-card invoice-card">
                        <div class="card-header">
                            <h6 class="mb-0">Faktura 2025060013</h6>
                            <span class="badge" style="background-color: #f8f9fa; color: #6c757d;">Vystaveno</span>
                        </div>
                        <div class="invoice-total">65 840 Kč</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-muted">Splatnost</small><br>
                                <strong>29.06.2025</strong>
                            </div>
                            <div class="qr-code-placeholder">
                            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 60 */;
		echo '/favicon-32x32.png" alt="QR kód" class="qr-code-image">
                            </div>
                        </div>
                    </div>
                    
                    <div class="floating-card stats-card">
                        <div class="stat-item">
                            <h3 class="text-primary">16</h3>
                            <p>Vystavených faktur</p>
                        </div>
                        <div class="stat-item">
                            <h3 class="text-success">6</h3>
                            <p>Zaplacených faktur</p>
                        </div>
                        <div class="stat-item">
                            <h3 class="text-primary">29</h3>
                            <p>Klientů celkem</p>
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
                    <p>Vaši klienti mohou platit faktury jednoduše nascanováním QR kódu.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-search"></i>
                    </div>
                    <h4>ARES integrace</h4>
                    <p>Automatické vyhledávání a doplňování firemních údajů z databáze ARES.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-palette"></i>
                    </div>
                    <h4>Vlastní design</h4>
                    <p>Přizpůsobte si faktury podle vaší firemní identity a značky.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-phone"></i>
                    </div>
                    <h4>Mobilní přístup</h4>
                    <p>Spravujte faktury kdekoli pomocí mobilního telefonu nebo tabletu.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h4>Bezpečnost</h4>
                    <p>Vaše data jsou v bezpečí díky pokročilému šifrování a zálohování.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h4>Podpora 24/7</h4>
                    <p>Náš tým podpory je k dispozici kdykoliv potřebujete pomoc.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Ukázka systému sekce -->
<section class="system-preview-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Podívejte se, jak QRdoklad funguje</h2>
                <p class="section-subtitle">
                    Moderní a intuitivní rozhraní navržené pro jednoduchost a efektivitu
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="system-preview-main mb-5">
                    <div class="preview-image-container">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 177 */;
		echo '/images/qrdoklad-dashboard.webp" 
                             alt="QRdoklad Dashboard - Přehled systému" 
                             class="img-fluid rounded preview-image"
                             loading="lazy">
                        <div class="preview-overlay">
                            <div class="preview-content">
                                <h4 class="text-white mb-3">
                                    <i class="bi bi-speedometer2 me-2"></i>
                                    Přehledný dashboard
                                </h4>
                                <p class="text-white-50 mb-0">
                                    Všechny důležité informace na jednom místě - přehled faktur, plateb a statistik
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
                                    Kompletní správa kontaktů s ARES integrací
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
		echo '/images/qrdoklad-invoice-detail.webp" 
                             alt="QRdoklad Detail faktury s QR kódem" 
                             class="img-fluid rounded preview-image">
                        <div class="preview-overlay">
                            <div class="preview-content">
                                <h5 class="text-white mb-2">
                                    <i class="bi bi-qr-code me-2"></i>
                                    QR platby
                                </h5>
                                <p class="text-white-50 small mb-0">
                                    Každá faktura obsahuje QR kód pro okamžitou platbu
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-8 mx-auto">
                <div class="system-preview-cta text-center">
                    <h3 class="mb-3">Připraveni začít?</h3>
                    <p class="text-muted mb-4">
                        Registrace trvá jen pár minut a můžete začít ihned vystavovat faktury.
                    </p>
                    <div class="cta-buttons d-flex flex-column flex-sm-row gap-3 justify-content-center">
                        <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-primary btn-lg">
                            <i class="bi bi-rocket me-2"></i>
                            Registrace zdarma
                        </a>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 275 */;
		echo '" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-list-check me-2"></i>
                            Zobrazit všechny funkce
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
                    Přečtěte si hodnocení od skutečných uživatelů QRdokladu
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card h-100">
                    <div class="testimonial-content">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="testimonial-text">
                            "QRdoklad mi ušetřil spoustu času při fakturaci. QR platby jsou skvělé - klienti platí okamžitě."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="author-info">
                            <h6>Jan Novák</h6>
                            <span class="text-muted">Grafický designér</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card h-100">
                    <div class="testimonial-content">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="testimonial-text">
                            "Konečně fakturační systém, který opravdu funguje. ARES integrace je perfektní."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="author-info">
                            <h6>Marie Svobodová</h6>
                            <span class="text-muted">IT konzultantka</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="testimonial-card h-100">
                    <div class="testimonial-content">
                        <div class="testimonial-rating">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                        </div>
                        <p class="testimonial-text">
                            "Snadné používání a skvělá podpora. Doporučuji všem podnikatelům."
                        </p>
                    </div>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="bi bi-person-circle"></i>
                        </div>
                        <div class="author-info">
                            <h6>Petr Dvořák</h6>
                            <span class="text-muted">Majitel e-shopu</span>
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
                    Začněte šetřit čas už dnes
                </h2>
                <p class="cta-subtitle text-white mb-4">
                    Přidejte se k tisícům spokojených podnikatelů, kteří si díky QRdokladu zjednodušili fakturaci.
                </p>
                <div class="cta-buttons">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-white btn-lg me-3">
                        <i class="bi bi-rocket-takeoff me-2"></i>Registrace zdarma
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 395 */;
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
