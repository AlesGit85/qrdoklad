<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/help.latte */
final class Template_c86552de1e extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/help.latte';

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
<!-- Hero sekce pro nápovědu -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Nápověda a <span class="text-primary">dokumentace</span>
                </h1>
                <p class="hero-subtitle">
                    Kompletní návody, video tutoriály a dokumentace k fakturačnímu systému QRdoklad. 
                    Najděte rychlé odpovědi na své otázky.
                </p>
                
                <!-- Centrální vyhledávání -->
                <div class="mt-4">
                    <div class="search-box mx-auto" style="max-width: 600px;">
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-white border-end-0">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" class="form-control border-start-0" 
                                   placeholder="Hledejte v nápovědě... (např. \'jak vystavit fakturu\')" 
                                   id="helpSearch">
                            <button class="btn btn-primary" type="button">
                                Hledat
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Rychlé odkazy -->
                <div class="mt-4">
                    <p class="text-muted mb-2">Populární témata:</p>
                    <div class="quick-links">
                        <a href="#getting-started" class="btn btn-outline-primary btn-sm me-2 mb-2">První kroky</a>
                        <a href="#invoices" class="btn btn-outline-primary btn-sm me-2 mb-2">Vytvoření faktury</a>
                        <a href="#qr-payments" class="btn btn-outline-primary btn-sm me-2 mb-2">QR platby</a>
                        <a href="#ares" class="btn btn-outline-primary btn-sm me-2 mb-2">ARES integrace</a>
                        <a href="#api" class="btn btn-outline-primary btn-sm me-2 mb-2">API dokumentace</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kategorie nápovědy -->
<section class="help-categories-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Kategorie nápovědy</h2>
                <p class="section-subtitle">
                    Vyberte kategorii podle toho, co potřebujete
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <!-- Začínáme -->
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100 bg-white rounded-3 shadow-sm p-4" id="getting-started">
                    <div class="category-header text-center mb-4">
                        <div class="category-icon bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-rocket text-white fs-1"></i>
                        </div>
                        <h5 class="text-primary">Začínáme</h5>
                        <p class="text-muted">Základní návody pro nové uživatele</p>
                    </div>
                    <ul class="help-links list-unstyled">
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-play-circle text-primary me-2"></i>
                                <span>Registrace a první kroky</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-gear text-primary me-2"></i>
                                <span>Nastavení firemních údajů</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-file-earmark-plus text-primary me-2"></i>
                                <span>Jak vystavit první fakturu</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-people text-primary me-2"></i>
                                <span>Import kontaktů</span>
                            </a>
                        </li>
                    </ul>
                    <div class="articles-count text-center mt-4">
                        <span class="badge bg-primary">8 článků</span>
                    </div>
                </div>
            </div>
            
            <!-- Faktury -->
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100 bg-white rounded-3 shadow-sm p-4" id="invoices">
                    <div class="category-header text-center mb-4">
                        <div class="category-icon bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-file-earmark-text text-white fs-1"></i>
                        </div>
                        <h5 class="text-success">Faktury</h5>
                        <p class="text-muted">Vše o vystavování a správě faktur</p>
                    </div>
                    <ul class="help-links list-unstyled">
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-plus-circle text-success me-2"></i>
                                <span>Vytvoření nové faktury</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none" id="qr-payments">
                                <i class="bi bi-qr-code text-success me-2"></i>
                                <span>QR platby na fakturách</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-palette text-success me-2"></i>
                                <span>Vlastní šablony faktur</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-clock text-success me-2"></i>
                                <span>Opakující se faktury</span>
                            </a>
                        </li>
                    </ul>
                    <div class="articles-count text-center mt-4">
                        <span class="badge bg-success">12 článků</span>
                    </div>
                </div>
            </div>
            
            <!-- Klienti -->
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100 bg-white rounded-3 shadow-sm p-4">
                    <div class="category-header text-center mb-4">
                        <div class="category-icon bg-warning rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-people text-white fs-1"></i>
                        </div>
                        <h5 class="text-warning">Klienti a kontakty</h5>
                        <p class="text-muted">Správa klientů a kontaktů</p>
                    </div>
                    <ul class="help-links list-unstyled">
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-person-plus text-warning me-2"></i>
                                <span>Přidání nového klienta</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none" id="ares">
                                <i class="bi bi-search text-warning me-2"></i>
                                <span>ARES vyhledávání</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-upload text-warning me-2"></i>
                                <span>Import kontaktů z Excelu</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-tags text-warning me-2"></i>
                                <span>Kategorie a štítky</span>
                            </a>
                        </li>
                    </ul>
                    <div class="articles-count text-center mt-4">
                        <span class="badge bg-warning">6 článků</span>
                    </div>
                </div>
            </div>
            
            <!-- Platby -->
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100 bg-white rounded-3 shadow-sm p-4">
                    <div class="category-header text-center mb-4">
                        <div class="category-icon bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-credit-card text-white fs-1"></i>
                        </div>
                        <h5 class="text-info">Platby a finance</h5>
                        <p class="text-muted">Správa plateb a finančních přehledů</p>
                    </div>
                    <ul class="help-links list-unstyled">
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-check-circle text-info me-2"></i>
                                <span>Označení faktur jako zaplacené</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-bell text-info me-2"></i>
                                <span>Automatické připomínky</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-bank text-info me-2"></i>
                                <span>Bankovní párování</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-graph-up text-info me-2"></i>
                                <span>Finanční přehledy</span>
                            </a>
                        </li>
                    </ul>
                    <div class="articles-count text-center mt-4">
                        <span class="badge bg-info">10 článků</span>
                    </div>
                </div>
            </div>
            
            <!-- Reporty -->
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100 bg-white rounded-3 shadow-sm p-4">
                    <div class="category-header text-center mb-4">
                        <div class="category-icon bg-secondary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-graph-up text-white fs-1"></i>
                        </div>
                        <h5 class="text-secondary">Reporty a analýzy</h5>
                        <p class="text-muted">Analýzy a reportování</p>
                    </div>
                    <ul class="help-links list-unstyled">
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-bar-chart text-secondary me-2"></i>
                                <span>Přehledy příjmů</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-percent text-secondary me-2"></i>
                                <span>DPH reporty</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-download text-secondary me-2"></i>
                                <span>Export dat do Excelu</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-clipboard-data text-secondary me-2"></i>
                                <span>Vlastní reporty</span>
                            </a>
                        </li>
                    </ul>
                    <div class="articles-count text-center mt-4">
                        <span class="badge bg-secondary">5 článků</span>
                    </div>
                </div>
            </div>
            
            <!-- API & Integrace -->
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100 bg-white rounded-3 shadow-sm p-4" id="api">
                    <div class="category-header text-center mb-4">
                        <div class="category-icon bg-dark rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-code-slash text-white fs-1"></i>
                        </div>
                        <h5 class="text-dark">API & Integrace</h5>
                        <p class="text-muted">Technická dokumentace a API</p>
                    </div>
                    <ul class="help-links list-unstyled">
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-book text-dark me-2"></i>
                                <span>REST API dokumentace</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-webhook text-dark me-2"></i>
                                <span>Webhooks nastavení</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-gear text-dark me-2"></i>
                                <span>Integrace s e-shopy</span>
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                <i class="bi bi-code text-dark me-2"></i>
                                <span>SDK a knihovny</span>
                            </a>
                        </li>
                    </ul>
                    <div class="articles-count text-center mt-4">
                        <span class="badge bg-dark">15 článků</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Populární články -->
<section class="popular-articles-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Nejčtenější články</h2>
                <p class="section-subtitle">
                    Nejoblíbenější návody a odpovědi na často kladené otázky
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="article-card bg-white rounded-3 shadow-sm p-4 h-100">
                    <div class="article-meta mb-3">
                        <span class="badge bg-primary me-2">Začínáme</span>
                        <span class="text-muted small">5 min čtení</span>
                    </div>
                    <h5 class="article-title mb-3">
                        <a href="#" class="text-decoration-none text-dark">
                            Jak vystavit první fakturu v QRdokladu
                        </a>
                    </h5>
                    <p class="text-muted mb-3">
                        Krok za krokem návod pro začátečníky. Naučte se vystavit svou první fakturu 
                        včetně QR platby během 5 minut.
                    </p>
                    <div class="article-stats d-flex align-items-center justify-content-between">
                        <div class="article-rating">
                            <i class="bi bi-star-fill text-warning me-1"></i>
                            <span class="text-muted">4.8 (247 hodnocení)</span>
                        </div>
                        <a href="#" class="btn btn-outline-primary btn-sm">Číst článek</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="article-card bg-white rounded-3 shadow-sm p-4 h-100">
                    <div class="article-meta mb-3">
                        <span class="badge bg-success me-2">Faktury</span>
                        <span class="text-muted small">3 min čtení</span>
                    </div>
                    <h5 class="article-title mb-3">
                        <a href="#" class="text-decoration-none text-dark">
                            Jak fungují QR platby na fakturách
                        </a>
                    </h5>
                    <p class="text-muted mb-3">
                        Vše, co potřebujete vědět o QR platbách. Jak se generují, jak je používají 
                        vaši klienti a jaké mají výhody.
                    </p>
                    <div class="article-stats d-flex align-items-center justify-content-between">
                        <div class="article-rating">
                            <i class="bi bi-star-fill text-warning me-1"></i>
                            <span class="text-muted">4.9 (189 hodnocení)</span>
                        </div>
                        <a href="#" class="btn btn-outline-primary btn-sm">Číst článek</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="article-card bg-white rounded-3 shadow-sm p-4 h-100">
                    <div class="article-meta mb-3">
                        <span class="badge bg-warning me-2">Klienti</span>
                        <span class="text-muted small">4 min čtení</span>
                    </div>
                    <h5 class="article-title mb-3">
                        <a href="#" class="text-decoration-none text-dark">
                            ARES integrace - automatické doplňování údajů
                        </a>
                    </h5>
                    <p class="text-muted mb-3">
                        Jak využít ARES integraci pro automatické vyhledávání a doplňování 
                        firemních údajů podle IČO.
                    </p>
                    <div class="article-stats d-flex align-items-center justify-content-between">
                        <div class="article-rating">
                            <i class="bi bi-star-fill text-warning me-1"></i>
                            <span class="text-muted">4.7 (156 hodnocení)</span>
                        </div>
                        <a href="#" class="btn btn-outline-primary btn-sm">Číst článek</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="article-card bg-white rounded-3 shadow-sm p-4 h-100">
                    <div class="article-meta mb-3">
                        <span class="badge bg-info me-2">Platby</span>
                        <span class="text-muted small">6 min čtení</span>
                    </div>
                    <h5 class="article-title mb-3">
                        <a href="#" class="text-decoration-none text-dark">
                            Nastavení automatických připomínek
                        </a>
                    </h5>
                    <p class="text-muted mb-3">
                        Jak nastavit automatické odesílání připomínek po splatnosti faktury 
                        a ušetřit si čas s vymáháním plateb.
                    </p>
                    <div class="article-stats d-flex align-items-center justify-content-between">
                        <div class="article-rating">
                            <i class="bi bi-star-fill text-warning me-1"></i>
                            <span class="text-muted">4.6 (98 hodnocení)</span>
                        </div>
                        <a href="#" class="btn btn-outline-primary btn-sm">Číst článek</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="#" class="btn btn-primary">
                <i class="bi bi-arrow-right me-2"></i>
                Zobrazit všechny články
            </a>
        </div>
    </div>
</section>

<!-- Video návody -->
<section class="video-guides-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Video návody</h2>
                <p class="section-subtitle">
                    Vizuální průvodci nejčastějšími úkoly v QRdokladu
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="video-card bg-white rounded-3 shadow-sm overflow-hidden h-100">
                    <div class="video-thumbnail position-relative">
                        <div class="video-placeholder bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-play-circle text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <div class="video-duration position-absolute bottom-0 end-0 bg-dark text-white px-2 py-1 m-2 rounded">
                            5:24
                        </div>
                    </div>
                    <div class="video-content p-4">
                        <h6 class="video-title mb-2">Základy QRdokladu</h6>
                        <p class="text-muted small mb-3">5minutový úvod do systému pro začátečníky</p>
                        <div class="video-stats d-flex align-items-center justify-content-between">
                            <small class="text-muted">1,247 zhlédnutí</small>
                            <a href="#" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-play me-1"></i>Pustit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="video-card bg-white rounded-3 shadow-sm overflow-hidden h-100">
                    <div class="video-thumbnail position-relative">
                        <div class="video-placeholder bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-play-circle text-success" style="font-size: 3rem;"></i>
                        </div>
                        <div class="video-duration position-absolute bottom-0 end-0 bg-dark text-white px-2 py-1 m-2 rounded">
                            8:15
                        </div>
                    </div>
                    <div class="video-content p-4">
                        <h6 class="video-title mb-2">Vytvoření první faktury</h6>
                        <p class="text-muted small mb-3">Kompletní návod vystavení faktury s QR platbou</p>
                        <div class="video-stats d-flex align-items-center justify-content-between">
                            <small class="text-muted">892 zhlédnutí</small>
                            <a href="#" class="btn btn-outline-success btn-sm">
                                <i class="bi bi-play me-1"></i>Pustit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="video-card bg-white rounded-3 shadow-sm overflow-hidden h-100">
                    <div class="video-thumbnail position-relative">
                        <div class="video-placeholder bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                            <i class="bi bi-play-circle text-warning" style="font-size: 3rem;"></i>
                        </div>
                        <div class="video-duration position-absolute bottom-0 end-0 bg-dark text-white px-2 py-1 m-2 rounded">
                            6:42
                        </div>
                    </div>
                    <div class="video-content p-4">
                        <h6 class="video-title mb-2">Pokročilé funkce</h6>
                        <p class="text-muted small mb-3">Automatizace, šablony a pokročilé nastavení</p>
                        <div class="video-stats d-flex align-items-center justify-content-between">
                            <small class="text-muted">567 zhlédnutí</small>
                            <a href="#" class="btn btn-outline-warning btn-sm">
                                <i class="bi bi-play me-1"></i>Pustit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rychlé odkazy -->
<section class="quick-help-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="section-title text-center mb-5">Potřebujete rychlou pomoc?</h2>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="quick-help-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                            <div class="help-icon bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="bi bi-question-circle text-white fs-3"></i>
                            </div>
                            <h6 class="mb-2">FAQ</h6>
                            <p class="text-muted mb-3">Odpovědi na nejčastější otázky o QRdokladu</p>
                            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:faq')) /* line 540 */;
		echo '" class="btn btn-outline-primary">
                                Procházet FAQ
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="quick-help-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                            <div class="help-icon bg-success rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="bi bi-chat-dots text-white fs-3"></i>
                            </div>
                            <h6 class="mb-2">Kontakt</h6>
                            <p class="text-muted mb-3">Máte specifickou otázku? Kontaktujte nás přímo</p>
                            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 553 */;
		echo '" class="btn btn-outline-success">
                                Napsat zprávu
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="quick-help-card text-center p-4 bg-white rounded-3 shadow-sm h-100">
                            <div class="help-icon bg-info rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="bi bi-headset text-white fs-3"></i>
                            </div>
                            <h6 class="mb-2">Telefonní podpora</h6>
                            <p class="text-muted mb-3">V pracovních dnech v čase 9:00 - 17:00</p>
                            <a href="tel:+420703985390" class="btn btn-outline-info">
                                Zavolat nyní
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Status služeb -->
<section class="status-check py-4 bg-light border-top">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="mb-1">Stav služeb QRdoklad</h6>
                        <p class="text-muted mb-0 small">Všechny systémy jsou funkční</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="status-dot bg-success rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                        <span class="text-success small me-3">Funkční</span>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:status')) /* line 590 */;
		echo '" class="btn btn-outline-primary btn-sm">
                            Zobrazit status
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript pro vyhledávání -->
<script>
document.addEventListener(\'DOMContentLoaded\', function() {
    initHelpSearch();
    initQuickLinks();
});

function initHelpSearch() {
    const searchInput = document.getElementById(\'helpSearch\');
    
    if (!searchInput) return;
    
    searchInput.addEventListener(\'input\', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        // Jednoduché vyhledávání v kategoriích a článcích
        const categories = document.querySelectorAll(\'.help-category-card\');
        const articles = document.querySelectorAll(\'.article-card\');
        
        categories.forEach(category => {
            const text = category.textContent.toLowerCase();
            const shouldShow = !searchTerm || text.includes(searchTerm);
            category.style.display = shouldShow ? \'\' : \'none\';
        });
        
        articles.forEach(article => {
            const text = article.textContent.toLowerCase();
            const shouldShow = !searchTerm || text.includes(searchTerm);
            article.style.display = shouldShow ? \'\' : \'none\';
        });
    });
}

function initQuickLinks() {
    const quickLinks = document.querySelectorAll(\'.quick-links a\');
    
    quickLinks.forEach(link => {
        link.addEventListener(\'click\', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute(\'href\');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: \'smooth\',
                    block: \'start\'
                });
                
                // Zvýrazni kategorii na chvíli
                targetElement.style.transform = \'scale(1.02)\';
                targetElement.style.transition = \'transform 0.3s ease\';
                
                setTimeout(() => {
                    targetElement.style.transform = \'\';
                }, 500);
            }
        });
    });
}
</script>

<style>
.help-category-card {
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.help-category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-color: var(--primary-color);
}

.article-card {
    transition: all 0.3s ease;
}

.article-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.video-card {
    transition: all 0.3s ease;
}

.video-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.help-links a {
    color: var(--gray-color);
    transition: color 0.3s ease;
}

.help-links a:hover {
    color: var(--primary-color);
}

#helpSearch:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(177, 210, 53, 0.25);
}

.quick-links .btn {
    transition: all 0.3s ease;
}

.quick-links .btn:hover {
    transform: translateY(-1px);
}
</style>

';
	}
}
