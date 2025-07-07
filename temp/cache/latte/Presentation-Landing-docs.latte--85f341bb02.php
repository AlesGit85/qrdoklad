<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/docs.latte */
final class Template_85f341bb02 extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/docs.latte';

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
<!-- Hero sekce pro dokumentaci -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    <span class="text-primary">Dokumentace</span> QRdokladu
                </h1>
                <p class="hero-subtitle">
                    Kompletní návod k používání fakturačního systému QRdoklad. 
                    Najdete zde vše od prvního přihlášení až po pokročilé funkce.
                </p>
                <div class="d-flex justify-content-center align-items-center gap-4 mt-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-book-fill text-primary me-2"></i>
                        <span class="text-muted">Krok za krokem návody</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-lightbulb-fill text-warning me-2"></i>
                        <span class="text-muted">Tipy a triky</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hlavní obsah dokumentace -->
<section class="docs-section py-5">
    <div class="container-fluid">
        <div class="row">
            
            <!-- Sidebar navigace -->
            <div class="col-lg-3 col-xl-2">
                <div class="docs-sidebar">
                    <div class="sidebar-header mb-4">
                        <h6 class="text-primary mb-3">
                            <i class="bi bi-list-ul me-2"></i>
                            Obsah dokumentace
                        </h6>
                        
                        <!-- Vyhledávání -->
                        <div class="docs-search mb-3">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Hledat v dokumentaci..." id="docsSearch">
                                <i class="bi bi-search position-absolute top-50 end-0 translate-middle-y me-3 text-muted"></i>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Menu -->
                    <nav class="docs-nav">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#rychly-start">
                                    <i class="bi bi-rocket-takeoff"></i>
                                    Rychlý start
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#zakladni-funkce">
                                    <i class="bi bi-gear"></i>
                                    Základní funkce
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#faktury">
                                    <i class="bi bi-file-earmark-text"></i>
                                    Faktury
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#klienti">
                                    <i class="bi bi-people"></i>
                                    Klienti
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#qr-platby">
                                    <i class="bi bi-qr-code"></i>
                                    QR platby
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#nastaveni">
                                    <i class="bi bi-sliders"></i>
                                    Nastavení
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pokrocile-faq">
                                    <i class="bi bi-question-circle"></i>
                                    Pokročilé FAQ
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tipy-triky">
                                    <i class="bi bi-lightbulb"></i>
                                    Tipy a triky
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            
            <!-- Hlavní obsah -->
            <div class="col-lg-9 col-xl-10">
                <div class="docs-content">
                    
                    <!-- Rychlý start -->
                    <div id="rychly-start" class="docs-section-content mb-5">
                        <div class="section-header mb-4">
                            <h2 class="text-primary">
                                <i class="bi bi-rocket-takeoff me-3"></i>
                                Rychlý start
                            </h2>
                            <p class="text-muted">Začněte s QRdokladem během několika minut</p>
                        </div>
                        
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="quick-start-card">
                                    <div class="step-number">1</div>
                                    <h4>Registrace</h4>
                                    <p>Vytvořte si bezplatný účet na <a href="https://app.qrdoklad.cz/sign/up" target="_blank">app.qrdoklad.cz</a>. Registrace trvá méně než minutu.</p>
                                    <div class="step-details">
                                        <ul>
                                            <li>Zadejte email a vytvořte heslo</li>
                                            <li>Ověřte email adresu</li>
                                            <li>Přihlaste se do systému</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="quick-start-card">
                                    <div class="step-number">2</div>
                                    <h4>Základní nastavení</h4>
                                    <p>Nastavte své firemní údaje a preference pro fakturaci.</p>
                                    <div class="step-details">
                                        <ul>
                                            <li>Vyplňte údaje o vaší firmě</li>
                                            <li>Nastavte bankovní účet</li>
                                            <li>Zvolte číselnou řadu faktur</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="quick-start-card">
                                    <div class="step-number">3</div>
                                    <h4>První klient</h4>
                                    <p>Přidejte svého prvního klienta pomocí ARES vyhledávání.</p>
                                    <div class="step-details">
                                        <ul>
                                            <li>Klikněte na "Nový klient"</li>
                                            <li>Zadejte IČO (systém doplní údaje)</li>
                                            <li>Zkontrolujte a uložte</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="quick-start-card">
                                    <div class="step-number">4</div>
                                    <h4>První faktura</h4>
                                    <p>Vystavte svou první fakturu s QR platbou během pár kliknutí.</p>
                                    <div class="step-details">
                                        <ul>
                                            <li>Zvolte klienta</li>
                                            <li>Přidejte položky</li>
                                            <li>Zkontrolujte a odešlete</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="alert alert-success mt-4">
                            <div class="d-flex">
                                <i class="bi bi-check-circle-fill me-3" style="font-size: 1.5rem;"></i>
                                <div>
                                    <h5 class="alert-heading">Gratulujeme!</h5>
                                    <p class="mb-0">Nyní máte QRdoklad připravený k používání. Pokračujte čtením pro pokročilejší funkce.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Základní funkce -->
                    <div id="zakladni-funkce" class="docs-section-content mb-5">
                        <div class="section-header mb-4">
                            <h2 class="text-primary">
                                <i class="bi bi-gear me-3"></i>
                                Základní funkce
                            </h2>
                            <p class="text-muted">Přehled hlavních funkcí systému</p>
                        </div>
                        
                        <div class="row g-4">
                            <div class="col-lg-4">
                                <div class="feature-doc-card">
                                    <div class="feature-icon">
                                        <i class="bi bi-file-earmark-plus-fill"></i>
                                    </div>
                                    <h4>Vytváření faktur</h4>
                                    <p>Rychlé a intuitivní vytváření faktur s automatickým generováním čísel a QR kódů.</p>
                                    <a href="#faktury" class="btn btn-outline-primary btn-sm">Zjistit více</a>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="feature-doc-card">
                                    <div class="feature-icon">
                                        <i class="bi bi-qr-code-scan"></i>
                                    </div>
                                    <h4>QR platby</h4>
                                    <p>Automatické generování QR kódů pro okamžité platby přes mobilní bankovnictví.</p>
                                    <a href="#qr-platby" class="btn btn-outline-primary btn-sm">Zjistit více</a>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="feature-doc-card">
                                    <div class="feature-icon">
                                        <i class="bi bi-search"></i>
                                    </div>
                                    <h4>ARES integrace</h4>
                                    <p>Automatické vyhledávání a doplňování údajů o firmách podle IČO.</p>
                                    <a href="#klienti" class="btn btn-outline-primary btn-sm">Zjistit více</a>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="feature-doc-card">
                                    <div class="feature-icon">
                                        <i class="bi bi-graph-up"></i>
                                    </div>
                                    <h4>Přehledy a statistiky</h4>
                                    <p>Detailní přehledy tržeb, nezaplacených faktur a další důležité metriky.</p>
                                    <a href="#nastaveni" class="btn btn-outline-primary btn-sm">Zjistit více</a>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="feature-doc-card">
                                    <div class="feature-icon">
                                        <i class="bi bi-file-pdf"></i>
                                    </div>
                                    <h4>PDF export</h4>
                                    <p>Profesionální PDF faktury s možností vlastního loga a přizpůsobení designu.</p>
                                    <a href="#faktury" class="btn btn-outline-primary btn-sm">Zjistit více</a>
                                </div>
                            </div>
                            
                            <div class="col-lg-4">
                                <div class="feature-doc-card">
                                    <div class="feature-icon">
                                        <i class="bi bi-cloud-check"></i>
                                    </div>
                                    <h4>Cloudové ukládání</h4>
                                    <p>Bezpečné ukládání všech dat v cloudu s pravidelným zálohováním.</p>
                                    <a href="#nastaveni" class="btn btn-outline-primary btn-sm">Zjistit více</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Faktury -->
                    <div id="faktury" class="docs-section-content mb-5">
                        <div class="section-header mb-4">
                            <h2 class="text-primary">
                                <i class="bi bi-file-earmark-text me-3"></i>
                                Práce s fakturami
                            </h2>
                            <p class="text-muted">Kompletní návod k vytváření a správě faktur</p>
                        </div>
                        
                        <div class="docs-content-wrapper">
                            <h3>Vytvoření nové faktury</h3>
                            <ol class="process-steps">
                                <li>
                                    <strong>Přejděte do sekce Faktury</strong>
                                    <p>V hlavním menu klikněte na "Faktury" a poté na tlačítko "Nová faktura".</p>
                                </li>
                                <li>
                                    <strong>Vyberte klienta</strong>
                                    <p>Zvolte existujícího klienta nebo přidejte nového pomocí tlačítka "+". Systém automaticky doplní údaje z ARES.</p>
                                </li>
                                <li>
                                    <strong>Přidejte položky</strong>
                                    <p>Vyplňte název, množství, jednotku a cenu. DPH se vypočítá automaticky podle nastavení.</p>
                                </li>
                                <li>
                                    <strong>Zkontrolujte náhled</strong>
                                    <p>Prohlédněte si náhled faktury a ověřte všechny údaje. QR kód se vygeneruje automaticky.</p>
                                </li>
                                <li>
                                    <strong>Odešlete nebo uložte</strong>
                                    <p>Fakturu můžete odeslat emailem, vytisknout nebo pouze uložit jako koncept.</p>
                                </li>
                            </ol>
                            
                            <div class="info-box mt-4">
                                <h4>
                                    <i class="bi bi-lightbulb-fill text-warning me-2"></i>
                                    Pro tip
                                </h4>
                                <p>Často používané položky si můžete uložit jako šablony. Najdete je v nastavení pod "Položky a služby".</p>
                            </div>
                            
                            <h3 class="mt-5">Stavy faktur</h3>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="status-card draft">
                                        <h5><i class="bi bi-file-earmark me-2"></i>Koncept</h5>
                                        <p>Faktura je rozpracovaná a nebyla ještě odeslána klientovi.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="status-card sent">
                                        <h5><i class="bi bi-send me-2"></i>Odeslaná</h5>
                                        <p>Faktura byla odeslána klientovi a čeká na úhradu.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="status-card paid">
                                        <h5><i class="bi bi-check-circle me-2"></i>Zaplacená</h5>
                                        <p>Faktura byla úspěšně zaplacena klientem.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="status-card overdue">
                                        <h5><i class="bi bi-exclamation-circle me-2"></i>Po splatnosti</h5>
                                        <p>Faktura nebyla zaplacena do data splatnosti.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Klienti -->
                    <div id="klienti" class="docs-section-content mb-5">
                        <div class="section-header mb-4">
                            <h2 class="text-primary">
                                <i class="bi bi-people me-3"></i>
                                Správa klientů
                            </h2>
                            <p class="text-muted">Jak efektivně spravovat databázi klientů</p>
                        </div>
                        
                        <div class="docs-content-wrapper">
                            <h3>Přidání nového klienta</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Pomocí ARES vyhledávání</h4>
                                    <ol>
                                        <li>Zadejte IČO do vyhledávacího pole</li>
                                        <li>Systém automaticky doplní všechny údaje</li>
                                        <li>Zkontrolujte a upravte podle potřeby</li>
                                        <li>Uložte klienta</li>
                                    </ol>
                                </div>
                                <div class="col-lg-6">
                                    <h4>Manuální zadání</h4>
                                    <ol>
                                        <li>Klikněte na "Přidat ručně"</li>
                                        <li>Vyplňte všechny povinné údaje</li>
                                        <li>Zkontrolujte správnost údajů</li>
                                        <li>Uložte klienta</li>
                                    </ol>
                                </div>
                            </div>
                            
                            <div class="warning-box mt-4">
                                <h4>
                                    <i class="bi bi-info-circle-fill text-info me-2"></i>
                                    Důležité informace
                                </h4>
                                <ul>
                                    <li>ARES data se aktualizují automaticky každých 24 hodin</li>
                                    <li>Můžete přepsat automaticky doplněné údaje</li>
                                    <li>Neplatná IČO systém automaticky označí</li>
                                </ul>
                            </div>
                            
                            <h3 class="mt-5">Organizace klientů</h3>
                            <div class="feature-grid">
                                <div class="feature-item">
                                    <i class="bi bi-tags-fill"></i>
                                    <h5>Štítky</h5>
                                    <p>Označte klienty barevnými štítky pro lepší přehled.</p>
                                </div>
                                <div class="feature-item">
                                    <i class="bi bi-funnel-fill"></i>
                                    <h5>Filtrování</h5>
                                    <p>Filtrujte klienty podle různých kritérií.</p>
                                </div>
                                <div class="feature-item">
                                    <i class="bi bi-search"></i>
                                    <h5>Vyhledávání</h5>
                                    <p>Rychle najděte klienta podle jména nebo IČO.</p>
                                </div>
                                <div class="feature-item">
                                    <i class="bi bi-archive-fill"></i>
                                    <h5>Archivace</h5>
                                    <p>Archivujte neaktivní klienty.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- QR Platby -->
                    <div id="qr-platby" class="docs-section-content mb-5">
                        <div class="section-header mb-4">
                            <h2 class="text-primary">
                                <i class="bi bi-qr-code me-3"></i>
                                QR platby
                            </h2>
                            <p class="text-muted">Jak fungují QR platby a jak je nastavit</p>
                        </div>
                        
                        <div class="docs-content-wrapper">
                            <div class="qr-explanation mb-4">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <h3>Co jsou QR platby?</h3>
                                        <p>QR platby umožňují vašim klientům zaplatit fakturu během několika sekund naskenováním QR kódu mobilním bankovnictvím. Všechny údaje se předvyplní automaticky.</p>
                                        
                                        <h4>Výhody QR plateb:</h4>
                                        <ul>
                                            <li data-icon="🚀">Rychlost - platba během 10 sekund</li>
                                            <li data-icon="✅">Přesnost - žádné překlepy v účtu nebo VS</li>
                                            <li data-icon="📱">Jednoduchost - jen naskenovat a potvrdit</li>
                                            <li data-icon="🔒">Bezpečnost - standardní bankovní zabezpečení</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div class="qr-demo">
                                            <div class="qr-placeholder">
                                                <i class="bi bi-qr-code" style="font-size: 4rem; color: var(--primary-color);"></i>
                                            </div>
                                            <p class="small text-muted mt-2">Ukázkový QR kód</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <h3>Jak nastavit QR platby</h3>
                            <div class="setup-steps">
                                <div class="step">
                                    <div class="step-icon">1</div>
                                    <div class="step-content">
                                        <h4>Zadejte bankovní účet</h4>
                                        <p>V nastavení firmy zadejte svůj bankovní účet ve formátu IBAN. QR kódy se budou generovat automaticky.</p>
                                    </div>
                                </div>
                                
                                <div class="step">
                                    <div class="step-icon">2</div>
                                    <div class="step-content">
                                        <h4>Ověřte kompatibilitu</h4>
                                        <p>QR platby podporují všechny hlavní české banky. Seznam najdete v nápovědě.</p>
                                    </div>
                                </div>
                                
                                <div class="step">
                                    <div class="step-icon">3</div>
                                    <div class="step-content">
                                        <h4>Testování</h4>
                                        <p>Vystavte testovací fakturu a naskenujte QR kód svým mobilním bankovnictvím.</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="alert alert-info mt-4">
                                <h5><i class="bi bi-info-circle me-2"></i>Podporované banky</h5>
                                <p class="mb-2">QR platby podporují všechny banky, které implementovaly QR platební standard:</p>
                                <div class="bank-list">
                                    <span class="badge bg-light text-dark me-2">Česká spořitelna</span>
                                    <span class="badge bg-light text-dark me-2">ČSOB</span>
                                    <span class="badge bg-light text-dark me-2">Komerční banka</span>
                                    <span class="badge bg-light text-dark me-2">mBank</span>
                                    <span class="badge bg-light text-dark me-2">Raiffeisenbank</span>
                                    <span class="badge bg-light text-dark me-2">Air Bank</span>
                                    <span class="badge bg-light text-dark">a další...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Nastavení -->
                    <div id="nastaveni" class="docs-section-content mb-5">
                        <div class="section-header mb-4">
                            <h2 class="text-primary">
                                <i class="bi bi-sliders me-3"></i>
                                Nastavení systému
                            </h2>
                            <p class="text-muted">Přizpůsobte si QRdoklad podle svých potřeb</p>
                        </div>
                        
                        <div class="settings-sections">
                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <div class="setting-category">
                                        <h4><i class="bi bi-building me-2"></i>Firemní údaje</h4>
                                        <ul>
                                            <li>Název firmy a kontaktní údaje</li>
                                            <li>IČO a DIČ</li>
                                            <li>Bankovní účet pro QR platby</li>
                                            <li>Logo firmy (pro faktury)</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="setting-category">
                                        <h4><i class="bi bi-file-earmark-text me-2"></i>Faktury</h4>
                                        <ul>
                                            <li>Číselné řady faktur</li>
                                            <li>Výchozí splatnost</li>
                                            <li>DPH sazby</li>
                                            <li>Šablony položek</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="setting-category">
                                        <h4><i class="bi bi-envelope me-2"></i>Email</h4>
                                        <ul>
                                            <li>Předmět a text emailů</li>
                                            <li>Podpis v emailech</li>
                                            <li>Automatické kopie</li>
                                            <li>Připomínky plateb</li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="col-lg-6">
                                    <div class="setting-category">
                                        <h4><i class="bi bi-palette me-2"></i>Vzhled</h4>
                                        <ul>
                                            <li>Barevné schéma systému</li>
                                            <li>Design faktur</li>
                                            <li>Vlastní CSS (pokročilé)</li>
                                            <li>Jazyk rozhraní</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Pokročilé FAQ -->
                    <div id="pokrocile-faq" class="docs-section-content mb-5">
                        <div class="section-header mb-4">
                            <h2 class="text-primary">
                                <i class="bi bi-question-circle me-3"></i>
                                Pokročilé FAQ
                            </h2>
                            <p class="text-muted">Odpovědi na složitější otázky</p>
                        </div>
                        
                        <div class="faq-advanced">
                            <div class="accordion" id="advancedFaq">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                            Jak importovat data z jiného fakturačního systému?
                                        </button>
                                    </h2>
                                    <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#advancedFaq">
                                        <div class="accordion-body">
                                            <p>QRdoklad umožňuje import dat z Excel/CSV souborů. Postupujte takto:</p>
                                            <ol>
                                                <li>Exportujte data z původního systému do Excel/CSV</li>
                                                <li>Stáhněte si naši šablonu importu</li>
                                                <li>Přemapujte sloupce podle šablony</li>
                                                <li>Nahrajte soubor přes import wizard</li>
                                            </ol>
                                            <p><strong>Tip:</strong> Před importem doporučujeme otestovat na malém vzorku dat.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                            Můžu používat vlastní číselné řady faktur?
                                        </button>
                                    </h2>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#advancedFaq">
                                        <div class="accordion-body">
                                            <p>Ano, QRdoklad podporuje plně přizpůsobitelné číselné řady:</p>
                                            <ul>
                                                <li><strong>Formát:</strong> 2025001, FA-2025-001, atd.</li>
                                                <li><strong>Vícero řad:</strong> pro různé typy faktur</li>
                                                <li><strong>Automatický reset:</strong> podle roku nebo měsíce</li>
                                                <li><strong>Vlastní prefix:</strong> s vaším označením</li>
                                            </ul>
                                            <p>Nastavení najdete v sekci Faktury → Číselné řady.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                            Jak funguje automatické párování plateb?
                                        </button>
                                    </h2>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#advancedFaq">
                                        <div class="accordion-body">
                                            <p>Automatické párování plateb funguje na základě variabilního symbolu:</p>
                                            <ol>
                                                <li>Každá faktura má unikátní variabilní symbol</li>
                                                <li>Systém monitoruje váš bankovní účet (s vaším souhlasem)</li>
                                                <li>Při příchozí platbě se automaticky spáruje podle VS</li>
                                                <li>Faktura se označí jako zaplacená</li>
                                            </ol>
                                            <p><strong>Poznámka:</strong> Tato funkce vyžaduje napojení na bankovní API.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                            Je možné vytvářet pravidelné faktury?
                                        </button>
                                    </h2>
                                    <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#advancedFaq">
                                        <div class="accordion-body">
                                            <p>Ano, QRdoklad podporuje automatické opakované faktury:</p>
                                            <ul>
                                                <li><strong>Frekvence:</strong> týdenní, měsíční, čtvrtletní, roční</li>
                                                <li><strong>Automatické odesílání:</strong> klientovi emailem</li>
                                                <li><strong>Vlastní kalendář:</strong> zvolte konkrétní dny</li>
                                                <li><strong>Ukončení:</strong> po určitém počtu nebo datu</li>
                                            </ul>
                                            <p>Ideální pro pravidelné služby, pronájmy nebo předplatné.</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                            Můžu přizpůsobit vzhled faktur?
                                        </button>
                                    </h2>
                                    <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#advancedFaq">
                                        <div class="accordion-body">
                                            <p>QRdoklad nabízí několik úrovní přizpůsobení:</p>
                                            <div class="customization-levels">
                                                <div class="level">
                                                    <h5><i class="bi bi-1-circle-fill text-success"></i> Základní</h5>
                                                    <p>Logo, barvy, kontaktní údaje</p>
                                                </div>
                                                <div class="level">
                                                    <h5><i class="bi bi-2-circle-fill text-primary"></i> Pokročilé</h5>
                                                    <p>Vlastní layout, fonty, pozice elementů</p>
                                                </div>
                                                <div class="level">
                                                    <h5><i class="bi bi-3-circle-fill text-warning"></i> Expert</h5>
                                                    <p>Vlastní CSS, kompletní redesign</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Tipy a triky -->
                    <div id="tipy-triky" class="docs-section-content mb-5">
                        <div class="section-header mb-4">
                            <h2 class="text-primary">
                                <i class="bi bi-lightbulb me-3"></i>
                                Tipy a triky
                            </h2>
                            <p class="text-muted">Pokročilé techniky pro efektivnější práci</p>
                        </div>
                        
                        <div class="tips-grid">
                            <div class="tip-card">
                                <div class="tip-icon">
                                    <i class="bi bi-keyboard"></i>
                                </div>
                                <h4>Klávesové zkratky</h4>
                                <div class="shortcuts">
                                    <div class="shortcut">
                                        <span class="keys"><kbd>Ctrl</kbd> + <kbd>N</kbd></span>
                                        <span class="action">Nová faktura</span>
                                    </div>
                                    <div class="shortcut">
                                        <span class="keys"><kbd>Ctrl</kbd> + <kbd>S</kbd></span>
                                        <span class="action">Uložit</span>
                                    </div>
                                    <div class="shortcut">
                                        <span class="keys"><kbd>/</kbd></span>
                                        <span class="action">Globální vyhledávání</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tip-card">
                                <div class="tip-icon">
                                    <i class="bi bi-magic"></i>
                                </div>
                                <h4>Šablony položek</h4>
                                <p>Vytvořte si knihovnu často používaných položek. Ušetříte čas při vytváření faktur.</p>
                                <ul class="tip-benefits">
                                    <li>Jednotné názvy služeb</li>
                                    <li>Konzistentní ceny</li>
                                    <li>Rychlejší vystavování</li>
                                </ul>
                            </div>
                            
                            <div class="tip-card">
                                <div class="tip-icon">
                                    <i class="bi bi-tags"></i>
                                </div>
                                <h4>Organizace štítky</h4>
                                <p>Používejte barevné štítky pro kategorizaci klientů:</p>
                                <ul class="tip-benefits">
                                    <li><span class="badge bg-success">VIP</span> - největší klienti</li>
                                    <li><span class="badge bg-warning">Pozor</span> - pomalí plátci</li>
                                    <li><span class="badge bg-info">Nový</span> - nové kontakty</li>
                                </ul>
                            </div>
                            
                            <div class="tip-card">
                                <div class="tip-icon">
                                    <i class="bi bi-calendar-event"></i>
                                </div>
                                <h4>Plánování faktur</h4>
                                <p>Využijte funkci naplánovaných faktur pro pravidelné klienty. Systém je automaticky odešle.</p>
                                <ul class="tip-benefits">
                                    <li>Méně zapomínání</li>
                                    <li>Pravidelný cash flow</li>
                                    <li>Spokojenější klienti</li>
                                </ul>
                            </div>
                            
                            <div class="tip-card">
                                <div class="tip-icon">
                                    <i class="bi bi-graph-up-arrow"></i>
                                </div>
                                <h4>Sledování metrik</h4>
                                <p>Pravidelně kontrolujte tyto klíčové metriky:</p>
                                <ul class="tip-benefits">
                                    <li>Průměrná doba úhrady</li>
                                    <li>Počet po splatnosti</li>
                                    <li>Měsíční tržby</li>
                                    <li>TOP klienti</li>
                                </ul>
                            </div>
                            
                            <div class="tip-card">
                                <div class="tip-icon">
                                    <i class="bi bi-shield-check"></i>
                                </div>
                                <h4>Bezpečnostní tipy</h4>
                                <p>Chraňte svůj účet a data:</p>
                                <ul class="tip-benefits">
                                    <li>Silné heslo</li>
                                    <li>Pravidelné odhlašování</li>
                                    <li>Aktualizace prohlížeče</li>
                                    <li>Dvoutfaktorové ověření</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Video návody (připraveno pro budoucnost) -->
                    <div id="video-navody" class="docs-section-content mb-5">
                        <div class="section-header mb-4">
                            <h2 class="text-primary">
                                <i class="bi bi-play-circle me-3"></i>
                                Video návody
                            </h2>
                            <p class="text-muted">Vizuální návody pro rychlejší pochopení</p>
                        </div>
                        
                        <div class="video-coming-soon">
                            <div class="text-center py-5">
                                <i class="bi bi-camera-video" style="font-size: 4rem; color: var(--primary-color);"></i>
                                <h3 class="mt-3">Brzy k dispozici</h3>
                                <p class="text-muted">Připravujeme pro vás detailní video návody, které vám pomohou zvládnout všechny funkce QRdokladu.</p>
                                <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 799 */;
		echo '" class="btn btn-outline-primary">
                                    <i class="bi bi-bell me-2"></i>
                                    Informujte mě o novinkách
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Kontakt a podpora -->
                    <div class="docs-footer mt-5 pt-5">
                        <div class="alert alert-light border">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4><i class="bi bi-question-circle-fill text-primary me-2"></i>Máte další otázky?</h4>
                                    <p class="mb-0">Neváhejte nás kontaktovat. Jsme tu, abychom vám pomohli s QRdokladem.</p>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 816 */;
		echo '" class="btn btn-primary me-2">
                                        <i class="bi bi-envelope me-2"></i>
                                        Kontaktovat podporu
                                    </a>
                                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:faq')) /* line 820 */;
		echo '" class="btn btn-outline-primary">
                                        <i class="bi bi-question-circle me-2"></i>
                                        Základní FAQ
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>';
	}
}
