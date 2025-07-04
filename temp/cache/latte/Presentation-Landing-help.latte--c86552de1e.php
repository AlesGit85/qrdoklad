<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/help.latte */
final class Template_c86552de1e extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/help.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo "\n";
		$this->renderBlock('title', get_defined_vars()) /* line 3 */;
		echo '

';
		$this->renderBlock('content', get_defined_vars()) /* line 5 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = '../@layout.latte';
		return get_defined_vars();
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'Nápověda a dokumentace - QRdoklad';
	}


	/** {block content} on line 5 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '
<!-- Hero sekce -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Nápověda a <span class="text-primary">dokumentace</span>
                </h1>
                <p class="hero-subtitle">
                    Vše, co potřebujete vědět o QRdokladu. Návody, tipy a triky 
                    pro efektivní používání našeho fakturačního systému.
                </p>
                
                <!-- Vyhledávání -->
                <div class="search-box mx-auto mt-4" style="max-width: 500px;">
                    <div class="input-group input-group-lg">
                        <input type="text" class="form-control" placeholder="Hledejte v nápovědě..." aria-label="Hledat v nápovědě">
                        <button class="btn btn-primary" type="button">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </div>
                
                <div class="popular-searches mt-3">
                    <p class="small text-muted mb-2">Populární hledání:</p>
                    <div class="d-flex flex-wrap justify-content-center gap-2">
                        <a href="#" class="badge bg-primary text-white text-decoration-none">QR platby</a>
                        <a href="#" class="badge bg-primary text-white text-decoration-none">ARES</a>
                        <a href="#" class="badge bg-primary text-white text-decoration-none">Šablony</a>
                        <a href="#" class="badge bg-primary text-white text-decoration-none">Export</a>
                        <a href="#" class="badge bg-primary text-white text-decoration-none">API</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rychlý start -->
<section class="quick-start-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Rychlý start</h2>
                <p class="section-subtitle">
                    Začněte s QRdokladem během několika minut
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="quick-start-card text-center p-4 h-100">
                    <div class="step-number">1</div>
                    <div class="step-icon mb-3">
                        <i class="bi bi-person-plus text-primary"></i>
                    </div>
                    <h5>Registrace</h5>
                    <p class="text-muted mb-3">Vytvořte si účet a nastavte základní údaje své firmy</p>
                    <a href="#" class="btn btn-outline-primary">Návod k registraci</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="quick-start-card text-center p-4 h-100">
                    <div class="step-number">2</div>
                    <div class="step-icon mb-3">
                        <i class="bi bi-gear text-primary"></i>
                    </div>
                    <h5>Nastavení</h5>
                    <p class="text-muted mb-3">Nakonfigurujte faktury, šablony a automatizace</p>
                    <a href="#" class="btn btn-outline-primary">Základní nastavení</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="quick-start-card text-center p-4 h-100">
                    <div class="step-number">3</div>
                    <div class="step-icon mb-3">
                        <i class="bi bi-file-text text-primary"></i>
                    </div>
                    <h5>První faktura</h5>
                    <p class="text-muted mb-3">Vystavte svou první fakturu s QR platbou</p>
                    <a href="#" class="btn btn-outline-primary">Vystavení faktury</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="quick-start-card text-center p-4 h-100">
                    <div class="step-number">4</div>
                    <div class="step-icon mb-3">
                        <i class="bi bi-people text-primary"></i>
                    </div>
                    <h5>Správa klientů</h5>
                    <p class="text-muted mb-3">Přidejte zákazníky a nastavte automatizace</p>
                    <a href="#" class="btn btn-outline-primary">Správa kontaktů</a>
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
                    Najděte odpovědi podle kategorií
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100">
                    <div class="category-icon">
                        <i class="bi bi-rocket"></i>
                    </div>
                    <h5>Začínáme</h5>
                    <p class="text-muted">Základní návody pro nové uživatele</p>
                    <ul class="help-links">
                        <li><a href="#">Registrace a první kroky</a></li>
                        <li><a href="#">Nastavení firemních údajů</a></li>
                        <li><a href="#">Jak vystavit první fakturu</a></li>
                        <li><a href="#">Import kontaktů</a></li>
                    </ul>
                    <div class="articles-count">
                        <span class="badge bg-primary">8 článků</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100">
                    <div class="category-icon">
                        <i class="bi bi-file-text"></i>
                    </div>
                    <h5>Faktury</h5>
                    <p class="text-muted">Vše o vystavování a správě faktur</p>
                    <ul class="help-links">
                        <li><a href="#">Vytvoření faktury</a></li>
                        <li><a href="#">QR platby na fakturách</a></li>
                        <li><a href="#">Vlastní šablony</a></li>
                        <li><a href="#">Opakující se faktury</a></li>
                    </ul>
                    <div class="articles-count">
                        <span class="badge bg-primary">12 článků</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100">
                    <div class="category-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h5>Klienti</h5>
                    <p class="text-muted">Správa zákazníků a dodavatelů</p>
                    <ul class="help-links">
                        <li><a href="#">Přidání nového klienta</a></li>
                        <li><a href="#">ARES vyhledávání</a></li>
                        <li><a href="#">Organizace kontaktů</a></li>
                        <li><a href="#">Historie fakturace</a></li>
                    </ul>
                    <div class="articles-count">
                        <span class="badge bg-primary">6 článků</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100">
                    <div class="category-icon">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <h5>Platby</h5>
                    <p class="text-muted">Zpracování a sledování plateb</p>
                    <ul class="help-links">
                        <li><a href="#">Párování plateb</a></li>
                        <li><a href="#">Automatické připomínky</a></li>
                        <li><a href="#">Platební brány</a></li>
                        <li><a href="#">Přehledy plateb</a></li>
                    </ul>
                    <div class="articles-count">
                        <span class="badge bg-primary">9 článků</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100">
                    <div class="category-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <h5>Reporty</h5>
                    <p class="text-muted">Analýzy a reportování</p>
                    <ul class="help-links">
                        <li><a href="#">Přehledy příjmů</a></li>
                        <li><a href="#">DPH reporty</a></li>
                        <li><a href="#">Export dat</a></li>
                        <li><a href="#">Vlastní reporty</a></li>
                    </ul>
                    <div class="articles-count">
                        <span class="badge bg-primary">5 článků</span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="help-category-card h-100">
                    <div class="category-icon">
                        <i class="bi bi-code-slash"></i>
                    </div>
                    <h5>API & Integrace</h5>
                    <p class="text-muted">Technická dokumentace a API</p>
                    <ul class="help-links">
                        <li><a href="#">REST API dokumentace</a></li>
                        <li><a href="#">Webhooks</a></li>
                        <li><a href="#">Integrace se systémy</a></li>
                        <li><a href="#">SDK a knihovny</a></li>
                    </ul>
                    <div class="articles-count">
                        <span class="badge bg-primary">15 článků</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video návody -->
<section class="video-guides-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Video návody</h2>
                <p class="section-subtitle">
                    Vizuální průvodci nejčastějšími úkoly
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="help-card text-center">
                    <div class="help-icon">
                        <i class="bi bi-play-circle"></i>
                    </div>
                    <h5>Základy QRdokladu</h5>
                    <p>5minutový úvod do systému pro začátečníky</p>
                    <a href="#" class="btn btn-outline-primary">
                        Pustit video
                    </a>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="help-card text-center">
                    <div class="help-icon">
                        <i class="bi bi-play-circle"></i>
                    </div>
                    <h5>Pokročilé funkce</h5>
                    <p>Krok za krokem videa, které vás provedou všemi funkcemi.</p>
                    <a href="#" class="btn btn-outline-primary">
                        Sledovat videa
                    </a>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="help-card text-center">
                    <div class="help-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h5>Komunita</h5>
                    <p>Připojte se k ostatním uživatelům a sdílejte zkušenosti.</p>
                    <a href="#" class="btn btn-outline-primary">
                        Vstoupit do komunity
                    </a>
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
                <h2 class="cta-title">Stále potřebujete pomoc?</h2>
                <p class="cta-subtitle">
                    Náš tým podpory je tu pro vás 24/7. Kontaktujte nás a rádi vám pomůžeme.
                </p>
                <div class="cta-buttons">
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 304 */;
		echo '" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-envelope me-2"></i>
                        Kontaktovat podporu
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:faq')) /* line 308 */;
		echo '" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-question-circle me-2"></i>
                        Procházet FAQ
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
