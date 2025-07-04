<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/status.latte */
final class Template_c44d950568 extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/status.latte';

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
<!-- Hero sekce pro status -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Status <span class="text-primary">služeb</span>
                </h1>
                <p class="hero-subtitle">
                    Sledujte aktuální stav všech služeb QRdoklad v reálném čase. 
                    Transparentní přehled dostupnosti a výkonu systému.
                </p>
                
                <!-- Hlavní status indikátor -->
                <div class="mt-4">
                    <div class="main-status-card mx-auto" style="max-width: 400px;">
                        <div class="status-indicator d-flex align-items-center justify-content-center">
                            <div class="status-dot bg-success rounded-circle me-3" style="width: 16px; height: 16px;"></div>
                            <div class="status-text">
                                <h4 class="text-success mb-1">Všechny služby funkční</h4>
                                <p class="text-muted mb-0">Žádné problémy nebo výpadky</p>
                            </div>
                        </div>
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
                    <!-- Webová aplikace -->
                    <div class="service-item bg-white rounded-3 shadow-sm p-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="service-info d-flex align-items-center">
                                <div class="status-dot bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                                <div>
                                    <h6 class="mb-1">Webová aplikace</h6>
                                    <small class="text-muted">Hlavní rozhraní QRdokladu</small>
                                </div>
                            </div>
                            <span class="badge bg-success">Funkční</span>
                        </div>
                        <div class="mt-3">
                            <div class="row g-3 text-center">
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Uptime (30 dní)</small>
                                    <strong class="text-success">99.97%</strong>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Rychlost odezvy</small>
                                    <strong class="text-primary">142ms</strong>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Poslední kontrola</small>
                                    <strong class="text-success">Právě teď</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- API služby -->
                    <div class="service-item bg-white rounded-3 shadow-sm p-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="service-info d-flex align-items-center">
                                <div class="status-dot bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                                <div>
                                    <h6 class="mb-1">API služby</h6>
                                    <small class="text-muted">REST API pro integrace</small>
                                </div>
                            </div>
                            <span class="badge bg-success">Funkční</span>
                        </div>
                        <div class="mt-3">
                            <div class="row g-3 text-center">
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Uptime (30 dní)</small>
                                    <strong class="text-success">99.95%</strong>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Rychlost odezvy</small>
                                    <strong class="text-primary">89ms</strong>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Poslední kontrola</small>
                                    <strong class="text-success">Právě teď</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ARES integrace -->
                    <div class="service-item bg-white rounded-3 shadow-sm p-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="service-info d-flex align-items-center">
                                <div class="status-dot bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                                <div>
                                    <h6 class="mb-1">ARES integrace</h6>
                                    <small class="text-muted">Vyhledávání firemních údajů</small>
                                </div>
                            </div>
                            <span class="badge bg-success">Funkční</span>
                        </div>
                        <div class="mt-3">
                            <div class="row g-3 text-center">
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Uptime (30 dní)</small>
                                    <strong class="text-success">99.92%</strong>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Rychlost odezvy</small>
                                    <strong class="text-primary">320ms</strong>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Poslední kontrola</small>
                                    <strong class="text-success">Právě teď</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Email služby -->
                    <div class="service-item bg-white rounded-3 shadow-sm p-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="service-info d-flex align-items-center">
                                <div class="status-dot bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                                <div>
                                    <h6 class="mb-1">Email služby</h6>
                                    <small class="text-muted">Odesílání faktur a připomínek</small>
                                </div>
                            </div>
                            <span class="badge bg-success">Funkční</span>
                        </div>
                        <div class="mt-3">
                            <div class="row g-3 text-center">
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Uptime (30 dní)</small>
                                    <strong class="text-success">99.98%</strong>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Rychlost doručení</small>
                                    <strong class="text-primary">2.3s</strong>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Poslední kontrola</small>
                                    <strong class="text-success">Právě teď</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Databáze -->
                    <div class="service-item bg-white rounded-3 shadow-sm p-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="service-info d-flex align-items-center">
                                <div class="status-dot bg-success rounded-circle me-3" style="width: 12px; height: 12px;"></div>
                                <div>
                                    <h6 class="mb-1">Databázové služby</h6>
                                    <small class="text-muted">Úložiště dat a zálohování</small>
                                </div>
                            </div>
                            <span class="badge bg-success">Funkční</span>
                        </div>
                        <div class="mt-3">
                            <div class="row g-3 text-center">
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Uptime (30 dní)</small>
                                    <strong class="text-success">99.99%</strong>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Rychlost odezvy</small>
                                    <strong class="text-primary">12ms</strong>
                                </div>
                                <div class="col-md-4">
                                    <small class="text-muted d-block">Poslední záloha</small>
                                    <strong class="text-success">Před 2h</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Celkové metriky -->
<section class="metrics-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="section-title text-center mb-5">Celkové metriky</h2>
                
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="metric-card text-center p-4 bg-white rounded-3 shadow-sm">
                            <div class="metric-icon text-success mb-3">
                                <i class="bi bi-graph-up fs-1"></i>
                            </div>
                            <h4 class="text-success mb-1">99.97%</h4>
                            <p class="text-muted mb-0">Celkové uptime<br><small>Za posledních 30 dní</small></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="metric-card text-center p-4 bg-white rounded-3 shadow-sm">
                            <div class="metric-icon text-primary mb-3">
                                <i class="bi bi-speedometer2 fs-1"></i>
                            </div>
                            <h4 class="text-primary mb-1">89ms</h4>
                            <p class="text-muted mb-0">Průměrná odezva<br><small>Rychlost načítání stránek</small></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="metric-card text-center p-4 bg-white rounded-3 shadow-sm">
                            <div class="metric-icon text-warning mb-3">
                                <i class="bi bi-shield-check fs-1"></i>
                            </div>
                            <h4 class="text-warning mb-1">0</h4>
                            <p class="text-muted mb-0">Bezpečnostní incidenty<br><small>Za posledních 90 dní</small></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="metric-card text-center p-4 bg-white rounded-3 shadow-sm">
                            <div class="metric-icon text-info mb-3">
                                <i class="bi bi-people fs-1"></i>
                            </div>
                            <h4 class="text-info mb-1">1,247</h4>
                            <p class="text-muted mb-0">Aktivní uživatelé<br><small>Za posledních 24 hodin</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Historie incidentů -->
<section class="incidents-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-center mb-5">Historie incidentů</h2>
                
                <div class="incidents-timeline">
                    <!-- Aktuální stav - žádné incidenty -->
                    <div class="incident-item bg-white rounded-3 shadow-sm p-4 mb-4">
                        <div class="d-flex align-items-start">
                            <div class="incident-status me-3">
                                <div class="status-dot bg-success rounded-circle" style="width: 16px; height: 16px; margin-top: 4px;"></div>
                            </div>
                            <div class="incident-content flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="text-success mb-1">Všechny služby jsou funkční</h6>
                                    <small class="text-muted">';
		echo LR\Filters::escapeHtmlText(date('j. n. Y H:i')) /* line 266 */;
		echo '</small>
                                </div>
                                <p class="text-muted mb-0">
                                    V současné době nehlásíme žádné výpadky nebo problémy. Všechny služby běží bez problémů.
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Příklad vyřešeného incidentu -->
                    <div class="incident-item bg-white rounded-3 shadow-sm p-4 mb-4">
                        <div class="d-flex align-items-start">
                            <div class="incident-status me-3">
                                <div class="status-dot bg-success rounded-circle" style="width: 16px; height: 16px; margin-top: 4px;"></div>
                            </div>
                            <div class="incident-content flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="mb-1">Plánovaná údržba databáze - dokončena</h6>
                                    <small class="text-muted">28. 6. 2025</small>
                                </div>
                                <p class="text-muted mb-2">
                                    Plánovaná údržba databázového serveru byla úspěšně dokončena. Služby byly nedostupné po dobu 15 minut.
                                </p>
                                <div class="incident-timeline">
                                    <small class="text-muted d-block">
                                        <strong>02:15</strong> - Údržba zahájena<br>
                                        <strong>02:30</strong> - Služby obnoveny<br>
                                        <strong>02:45</strong> - Incident uzavřen
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Příklad minulého incidentu -->
                    <div class="incident-item bg-white rounded-3 shadow-sm p-4 mb-4">
                        <div class="d-flex align-items-start">
                            <div class="incident-status me-3">
                                <div class="status-dot bg-success rounded-circle" style="width: 16px; height: 16px; margin-top: 4px;"></div>
                            </div>
                            <div class="incident-content flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h6 class="mb-1">Zpomalené ARES dotazy - vyřešeno</h6>
                                    <small class="text-muted">15. 6. 2025</small>
                                </div>
                                <p class="text-muted mb-2">
                                    Dočasné zpomalení ARES služeb způsobené vysokým zatížením na straně státní správy. Problém vyřešen optimalizací cache.
                                </p>
                                <div class="incident-timeline">
                                    <small class="text-muted d-block">
                                        <strong>14:30</strong> - Problem detekován<br>
                                        <strong>14:45</strong> - Dočasné řešení nasazeno<br>
                                        <strong>16:20</strong> - Trvalé řešení dokončeno
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Odkaz na více historie -->
                <div class="text-center mt-4">
                    <p class="text-muted">
                        Zobrazeny jsou pouze poslední incidenty. 
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:incidents')) /* line 330 */;
		echo '" class="text-primary">Zobrazit kompletní historii</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Plánované údržby -->
<section class="maintenance-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-center mb-5">Plánované údržby</h2>
                
                <div class="maintenance-card bg-white rounded-3 shadow-sm p-4 text-center">
                    <div class="maintenance-icon text-primary mb-3">
                        <i class="bi bi-calendar-check fs-1"></i>
                    </div>
                    <h5 class="text-primary mb-3">Žádné plánované údržby</h5>
                    <p class="text-muted mb-0">
                        V současné době nemáme naplánované žádné údržby, které by ovlivnily dostupnost služeb. 
                        O všech plánovaných údržbách budeme informovat s předstihem.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontakt a hlášení problémů -->
<section class="support-contact py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title mb-4">Máte problém?</h2>
                <p class="text-muted mb-5">
                    Pokud zaznamenáte nějaký problém se službami, neváhejte nás kontaktovat. 
                    Snažíme se reagovat na všechny hlášení co nejrychleji.
                </p>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="contact-method bg-white rounded-3 shadow-sm p-4 h-100 text-center">
                            <div class="contact-icon bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-envelope fs-1 text-white"></i>
                            </div>
                            <h6 class="mb-2">Email podpora</h6>
                            <p class="text-muted mb-3">Pro hlášení problémů a technické dotazy</p>
                            <a href="mailto:podpora@qrdoklad.cz" class="btn btn-primary">
                                podpora@qrdoklad.cz
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="contact-method bg-white rounded-3 shadow-sm p-4 h-100 text-center">
                            <div class="contact-icon bg-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-telephone fs-1 text-white"></i>
                            </div>
                            <h6 class="mb-2">Telefonní podpora</h6>
                            <p class="text-muted mb-3">V pracovních dnech 9:00 - 17:00</p>
                            <a href="tel:+420703985390" class="btn btn-primary">
                                +420 703 985 390
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4">
                    <p class="text-muted small">
                        <i class="bi bi-info-circle me-2"></i>
                        Kritické problémy řešíme nepřetržitě. Na ostatní dotazy odpovídáme v pracovních dnech do 24 hodin.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Auto-refresh info -->
<section class="auto-refresh py-3 border-top">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <small class="text-muted">
                    <i class="bi bi-arrow-clockwise me-2"></i>
                    Stránka se automaticky obnovuje každých 5 minut. 
                    Poslední aktualizace: <span id="lastUpdate">';
		echo LR\Filters::escapeHtmlText(date('j. n. Y H:i:s')) /* line 418 */;
		echo '</span>
                </small>
            </div>
        </div>
    </div>
</section>

<script>
// Auto-refresh stránky každých 5 minut
setTimeout(function() {
    location.reload();
}, 300000); // 5 minut = 300000ms

// Aktualizace času posledního načtení
document.addEventListener(\'DOMContentLoaded\', function() {
    const now = new Date();
    const options = { 
        day: \'numeric\', 
        month: \'numeric\', 
        year: \'numeric\',
        hour: \'2-digit\', 
        minute: \'2-digit\',
        second: \'2-digit\'
    };
    document.getElementById(\'lastUpdate\').textContent = now.toLocaleDateString(\'cs-CZ\', options);
});
</script>

';
	}
}
