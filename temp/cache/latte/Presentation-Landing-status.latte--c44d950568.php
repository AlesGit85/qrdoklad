<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/status.latte */
final class Template_c44d950568 extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/status.latte';

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
		echo 'Status systému - QRdoklad';
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
                <div class="status-indicator mb-4">
                    <div class="status-badge bg-success text-white px-4 py-2 rounded-pill d-inline-flex align-items-center">
                        <div class="status-dot bg-white rounded-circle me-2" style="width: 12px; height: 12px;"></div>
                        Všechny systémy fungují normálně
                    </div>
                </div>
                <h1 class="hero-title">
                    Status systému <span class="text-primary">QRdoklad</span>
                </h1>
                <p class="hero-subtitle">
                    Aktuální stav dostupnosti všech našich služeb a systémů.
                    Monitorujeme dostupnost 24/7 a okamžitě informujeme o jakýchkoli problémech.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Aktuální metriky -->
<section class="metrics-section py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="metric-card text-center p-4">
                    <div class="metric-icon">
                        <i class="bi bi-speedometer2"></i>
                    </div>
                    <div class="metric-value text-primary">99.9%</div>
                    <div class="metric-label">Dostupnost tento měsíc</div>
                    <div class="metric-description text-muted">
                        Průměrná dostupnost za posledních 30 dní
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="metric-card text-center p-4">
                    <div class="metric-icon">
                        <i class="bi bi-clock"></i>
                    </div>
                    <div class="metric-value text-primary">240ms</div>
                    <div class="metric-label">Průměrná doba odezvy</div>
                    <div class="metric-description text-muted">
                        Rychlost odpovědi API za posledních 24 hodin
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="metric-card text-center p-4">
                    <div class="metric-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <div class="metric-value text-primary">0</div>
                    <div class="metric-label">Incidenty za 30 dní</div>
                    <div class="metric-description text-muted">
                        Počet významných výpadků nebo problémů
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Aktuální stav služeb -->
<section class="services-status-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-center mb-5">Aktuální stav služeb</h2>
                
                <div class="services-list">
                    <div class="service-item d-flex align-items-center justify-content-between p-3 mb-3 bg-white rounded">
                        <div class="service-info d-flex align-items-center">
                            <div class="status-dot bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                            <div>
                                <h6 class="mb-1">Webová aplikace</h6>
                                <small class="text-muted">Hlavní rozhraní QRdokladu</small>
                            </div>
                        </div>
                        <span class="badge bg-success">Funkční</span>
                    </div>
                    
                    <div class="service-item d-flex align-items-center justify-content-between p-3 mb-3 bg-white rounded">
                        <div class="service-info d-flex align-items-center">
                            <div class="status-dot bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                            <div>
                                <h6 class="mb-1">API služby</h6>
                                <small class="text-muted">REST API pro integracje</small>
                            </div>
                        </div>
                        <span class="badge bg-success">Funkční</span>
                    </div>
                    
                    <div class="service-item d-flex align-items-center justify-content-between p-3 mb-3 bg-white rounded">
                        <div class="service-info d-flex align-items-center">
                            <div class="status-dot bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                            <div>
                                <h6 class="mb-1">Generování faktur</h6>
                                <small class="text-muted">PDF export a QR kódy</small>
                            </div>
                        </div>
                        <span class="badge bg-success">Funkční</span>
                    </div>
                    
                    <div class="service-item d-flex align-items-center justify-content-between p-3 mb-3 bg-white rounded">
                        <div class="service-info d-flex align-items-center">
                            <div class="status-dot bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                            <div>
                                <h6 class="mb-1">ARES integrace</h6>
                                <small class="text-muted">Vyhledávání firemních údajů</small>
                            </div>
                        </div>
                        <span class="badge bg-success">Funkční</span>
                    </div>
                    
                    <div class="service-item d-flex align-items-center justify-content-between p-3 mb-3 bg-white rounded">
                        <div class="service-info d-flex align-items-center">
                            <div class="status-dot bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                            <div>
                                <h6 class="mb-1">E-mailové notifikace</h6>
                                <small class="text-muted">Automatické připomínky a oznámení</small>
                            </div>
                        </div>
                        <span class="badge bg-success">Funkční</span>
                    </div>
                    
                    <div class="service-item d-flex align-items-center justify-content-between p-3 mb-3 bg-white rounded">
                        <div class="service-info d-flex align-items-center">
                            <div class="status-dot bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                            <div>
                                <h6 class="mb-1">Zálohy databáze</h6>
                                <small class="text-muted">Automatické zálohování dat</small>
                            </div>
                        </div>
                        <span class="badge bg-success">Funkční</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Historie incidentů -->
<section class="incidents-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-center mb-5">Historie incidentů</h2>
                
                <div class="timeline">
                    <div class="no-incidents text-center p-5">
                        <div class="check-icon text-success mb-3">
                            <i class="bi bi-check-circle" style="font-size: 3rem;"></i>
                        </div>
                        <h4 class="text-success">Žádné incidenty</h4>
                        <p class="text-muted">
                            Za posledních 90 dní jsme nezaznamenali žádné významné výpadky nebo problémy.
                            Všechny systémy fungují stabilně a spolehlivě.
                        </p>
                        <small class="text-muted">
                            Poslední kontrola: ';
		echo LR\Filters::escapeHtmlText(date('d.m.Y H:i')) /* line 173 */;
		echo '
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Monitoring a statistiky -->
<section class="monitoring-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="section-title text-center mb-5">Monitoring a statistiky</h2>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="monitoring-card p-4 bg-white rounded h-100">
                            <h5 class="text-primary mb-3">
                                <i class="bi bi-shield-check me-2"></i>
                                Bezpečnost
                            </h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    SSL certifikáty aktivní
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    Firewall funkční
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    DDoS ochrana aktivní
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check-circle text-success me-2"></i>
                                    Zálohy aktuální
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="monitoring-card p-4 bg-white rounded h-100">
                            <h5 class="text-primary mb-3">
                                <i class="bi bi-graph-up me-2"></i>
                                Výkon
                            </h5>
                            <div class="performance-metrics">
                                <div class="metric-row d-flex justify-content-between mb-2">
                                    <span>CPU využití:</span>
                                    <span class="text-success">12%</span>
                                </div>
                                <div class="metric-row d-flex justify-content-between mb-2">
                                    <span>Paměť:</span>
                                    <span class="text-success">68%</span>
                                </div>
                                <div class="metric-row d-flex justify-content-between mb-2">
                                    <span>Diskový prostor:</span>
                                    <span class="text-success">45%</span>
                                </div>
                                <div class="metric-row d-flex justify-content-between mb-2">
                                    <span>Síťový provoz:</span>
                                    <span class="text-success">Normal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Subscription pro notifikace -->
<section class="notifications-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto text-center">
                <h3 class="mb-4">Sledujte status v reálném čase</h3>
                <p class="text-muted mb-4">
                    Přihlaste se k odběru notifikací a buďte informováni o změnách stavu systému.
                </p>
                
                <div class="notification-options row g-3">
                    <div class="col-md-6">
                        <a href="#" class="btn btn-outline-primary w-100">
                            <i class="bi bi-envelope me-2"></i>
                            E-mailové notifikace
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="btn btn-outline-primary w-100">
                            <i class="bi bi-rss me-2"></i>
                            RSS feed
                        </a>
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
                <h2 class="cta-title">Máte technické potíže?</h2>
                <p class="cta-subtitle">
                    Náš technický tým je připraven vám pomoci s jakýmkoli problémem.
                    Kontaktujte nás a vyřešíme to společně.
                </p>
                <div class="cta-buttons">
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 289 */;
		echo '" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-headset me-2"></i>
                        Technická podpora
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:help')) /* line 293 */;
		echo '" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-book me-2"></i>
                        Nápověda
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
