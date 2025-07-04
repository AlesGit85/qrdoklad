<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/incidents.latte */
final class Template_5d0e66a289 extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/incidents.latte';

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
<!-- Hero sekce pro historii incidentů -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Historie <span class="text-primary">incidentů</span>
                </h1>
                <p class="hero-subtitle">
                    Kompletní přehled všech incidentů, výpadků a plánovaných údržeb. 
                    Snažíme se být transparentní v komunikaci o dostupnosti služeb.
                </p>
                
                <!-- Breadcrumb navigace -->
                <nav aria-label="breadcrumb" class="mt-4">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item">
                            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:status')) /* line 20 */;
		echo '" class="text-primary">Status služeb</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Historie incidentů</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Statistiky incidentů -->
<section class="incidents-stats py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="section-title text-center mb-5">Statistiky spolehlivosti</h2>
                
                <div class="row g-4">
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card text-center p-4 bg-white rounded-3 shadow-sm">
                            <div class="stat-icon text-success mb-3">
                                <i class="bi bi-check-circle fs-1"></i>
                            </div>
                            <h4 class="text-success mb-1">99.97%</h4>
                            <p class="text-muted mb-0">Celkové uptime<br><small>Od spuštění (květen 2025)</small></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card text-center p-4 bg-white rounded-3 shadow-sm">
                            <div class="stat-icon text-primary mb-3">
                                <i class="bi bi-exclamation-triangle fs-1"></i>
                            </div>
                            <h4 class="text-primary mb-1">3</h4>
                            <p class="text-muted mb-0">Celkem incidentů<br><small>Od spuštění služby</small></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card text-center p-4 bg-white rounded-3 shadow-sm">
                            <div class="stat-icon text-warning mb-3">
                                <i class="bi bi-clock fs-1"></i>
                            </div>
                            <h4 class="text-warning mb-1">12 min</h4>
                            <p class="text-muted mb-0">Průměrný čas řešení<br><small>Rychlá reakce na problémy</small></p>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="stat-card text-center p-4 bg-white rounded-3 shadow-sm">
                            <div class="stat-icon text-info mb-3">
                                <i class="bi bi-calendar-week fs-1"></i>
                            </div>
                            <h4 class="text-info mb-1">45</h4>
                            <p class="text-muted mb-0">Dní bez incidentu<br><small>Aktuální série</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Filtry a vyhledávání -->
<section class="incidents-filters py-4 bg-white border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div class="filter-buttons">
                        <div class="btn-group" role="group">
                            <input type="radio" class="btn-check" name="incidentFilter" id="filterAll" checked>
                            <label class="btn btn-outline-primary" for="filterAll">Všechny</label>
                            
                            <input type="radio" class="btn-check" name="incidentFilter" id="filterIncidents">
                            <label class="btn btn-outline-primary" for="filterIncidents">Incidenty</label>
                            
                            <input type="radio" class="btn-check" name="incidentFilter" id="filterMaintenance">
                            <label class="btn btn-outline-primary" for="filterMaintenance">Údržby</label>
                            
                            <input type="radio" class="btn-check" name="incidentFilter" id="filterResolved">
                            <label class="btn btn-outline-primary" for="filterResolved">Vyřešené</label>
                        </div>
                    </div>
                    
                    <div class="incidents-search">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Hledat v incidentech..." id="incidentsSearch">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kompletní seznam incidentů -->
<section class="incidents-list py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                
                <!-- Červenec 2025 -->
                <div class="month-section mb-5">
                    <h3 class="month-title text-primary mb-4">
                        <i class="bi bi-calendar3 me-2"></i>Červenec 2025
                    </h3>
                    
                    <!-- Aktuální stav -->
                    <div class="incident-detail bg-white rounded-3 shadow-sm p-4 mb-4" data-type="status">
                        <div class="d-flex align-items-start">
                            <div class="incident-status me-3">
                                <div class="status-dot bg-success rounded-circle" style="width: 20px; height: 20px; margin-top: 6px;"></div>
                            </div>
                            <div class="incident-content flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h5 class="text-success mb-1">Všechny služby jsou funkční</h5>
                                        <div class="incident-meta">
                                            <span class="badge bg-success me-2">Funkční</span>
                                            <small class="text-muted">4. 7. 2025 - pokračuje</small>
                                        </div>
                                    </div>
                                    <span class="incident-id text-muted small">#2025-07-001</span>
                                </div>
                                <p class="text-muted mb-3">
                                    V současné době nehlásíme žádné výpadky nebo problémy. Všechny služby běží stabilně 
                                    a výkon systému je optimální.
                                </p>
                                <div class="incident-details">
                                    <strong class="text-success">✓ Služby dostupné:</strong>
                                    <ul class="mt-2 mb-0">
                                        <li>Webová aplikace - 100% dostupnost</li>
                                        <li>API služby - 100% dostupnost</li>
                                        <li>ARES integrace - 100% dostupnost</li>
                                        <li>Email služby - 100% dostupnost</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Červen 2025 -->
                <div class="month-section mb-5">
                    <h3 class="month-title text-primary mb-4">
                        <i class="bi bi-calendar3 me-2"></i>Červen 2025
                    </h3>
                    
                    <!-- Plánovaná údržba -->
                    <div class="incident-detail bg-white rounded-3 shadow-sm p-4 mb-4" data-type="maintenance">
                        <div class="d-flex align-items-start">
                            <div class="incident-status me-3">
                                <div class="status-dot bg-success rounded-circle" style="width: 20px; height: 20px; margin-top: 6px;"></div>
                            </div>
                            <div class="incident-content flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h5 class="mb-1">Plánovaná údržba databáze - dokončena</h5>
                                        <div class="incident-meta">
                                            <span class="badge bg-info me-2">Plánovaná údržba</span>
                                            <small class="text-muted">28. 6. 2025 02:15 - 02:45</small>
                                        </div>
                                    </div>
                                    <span class="incident-id text-muted small">#2025-06-002</span>
                                </div>
                                <p class="text-muted mb-3">
                                    Plánovaná údržba databázového serveru byla úspěšně dokončena. Aktualizovali jsme databázový engine 
                                    a optimalizovali výkon. Služby byly nedostupné po dobu 30 minut.
                                </p>
                                <div class="incident-timeline">
                                    <h6 class="text-primary mb-3">Timeline události:</h6>
                                    <div class="timeline-events">
                                        <div class="timeline-event d-flex mb-2">
                                            <span class="time badge bg-light text-dark me-3">02:00</span>
                                            <span>Oznámení plánované údržby uživatelům</span>
                                        </div>
                                        <div class="timeline-event d-flex mb-2">
                                            <span class="time badge bg-warning me-3">02:15</span>
                                            <span>Údržba zahájena - služby nedostupné</span>
                                        </div>
                                        <div class="timeline-event d-flex mb-2">
                                            <span class="time badge bg-info me-3">02:30</span>
                                            <span>Databáze aktualizována a optimalizována</span>
                                        </div>
                                        <div class="timeline-event d-flex mb-2">
                                            <span class="time badge bg-success me-3">02:30</span>
                                            <span>Služby obnoveny - testování funkcionality</span>
                                        </div>
                                        <div class="timeline-event d-flex">
                                            <span class="time badge bg-success me-3">02:45</span>
                                            <span>Incident uzavřen - plná funkcionalita obnovena</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="incident-impact mt-3 p-3 bg-light rounded">
                                    <strong class="text-primary">Dopad:</strong> Úplný výpadek všech služeb po dobu 30 minut<br>
                                    <strong class="text-primary">Ovlivnění uživatelé:</strong> Všichni registrovaní uživatelé<br>
                                    <strong class="text-primary">Příčina:</strong> Plánovaná údržba
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ARES problém -->
                    <div class="incident-detail bg-white rounded-3 shadow-sm p-4 mb-4" data-type="incident">
                        <div class="d-flex align-items-start">
                            <div class="incident-status me-3">
                                <div class="status-dot bg-success rounded-circle" style="width: 20px; height: 20px; margin-top: 6px;"></div>
                            </div>
                            <div class="incident-content flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h5 class="mb-1">Zpomalené ARES dotazy - vyřešeno</h5>
                                        <div class="incident-meta">
                                            <span class="badge bg-warning me-2">Částečný výpadek</span>
                                            <small class="text-muted">15. 6. 2025 14:30 - 16:20</small>
                                        </div>
                                    </div>
                                    <span class="incident-id text-muted small">#2025-06-001</span>
                                </div>
                                <p class="text-muted mb-3">
                                    Dočasné zpomalení ARES služeb způsobené vysokým zatížením na straně státní správy. 
                                    Vyhledávání firemních údajů trvalo výrazně déle než obvykle. Problém vyřešen implementací 
                                    pokročilé cache a optimalizací dotazů.
                                </p>
                                <div class="incident-timeline">
                                    <h6 class="text-primary mb-3">Timeline události:</h6>
                                    <div class="timeline-events">
                                        <div class="timeline-event d-flex mb-2">
                                            <span class="time badge bg-warning me-3">14:30</span>
                                            <span>Problém detekován - ARES dotazy trvají déle než 10s</span>
                                        </div>
                                        <div class="timeline-event d-flex mb-2">
                                            <span class="time badge bg-info me-3">14:35</span>
                                            <span>Uživatelé informováni o problému</span>
                                        </div>
                                        <div class="timeline-event d-flex mb-2">
                                            <span class="time badge bg-info me-3">14:45</span>
                                            <span>Dočasné řešení nasazeno - cache pro ARES dotazy</span>
                                        </div>
                                        <div class="timeline-event d-flex mb-2">
                                            <span class="time badge bg-info me-3">15:30</span>
                                            <span>Optimalizace dotazů implementována</span>
                                        </div>
                                        <div class="timeline-event d-flex">
                                            <span class="time badge bg-success me-3">16:20</span>
                                            <span>Incident uzavřen - normální rychlost obnovena</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="incident-impact mt-3 p-3 bg-light rounded">
                                    <strong class="text-primary">Dopad:</strong> Zpomalené vyhledávání firemních údajů<br>
                                    <strong class="text-primary">Ovlivnění uživatelé:</strong> Všichni uživatelé používající ARES<br>
                                    <strong class="text-primary">Příčina:</strong> Externí závislost (ARES státní správa)
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Květen 2025 -->
                <div class="month-section mb-5">
                    <h3 class="month-title text-primary mb-4">
                        <i class="bi bi-calendar3 me-2"></i>Květen 2025
                    </h3>
                    
                    <!-- Spuštění služby -->
                    <div class="incident-detail bg-white rounded-3 shadow-sm p-4 mb-4" data-type="launch">
                        <div class="d-flex align-items-start">
                            <div class="incident-status me-3">
                                <div class="status-dot bg-primary rounded-circle" style="width: 20px; height: 20px; margin-top: 6px;"></div>
                            </div>
                            <div class="incident-content flex-grow-1">
                                <div class="d-flex justify-content-between align-items-start mb-3">
                                    <div>
                                        <h5 class="mb-1">🚀 Spuštění QRdoklad služby</h5>
                                        <div class="incident-meta">
                                            <span class="badge bg-primary me-2">Spuštění</span>
                                            <small class="text-muted">20. 5. 2025</small>
                                        </div>
                                    </div>
                                    <span class="incident-id text-muted small">#2025-05-001</span>
                                </div>
                                <p class="text-muted mb-3">
                                    Oficiální spuštění QRdoklad fakturačního systému pro české podnikatele. 
                                    Všechny hlavní funkce jsou plně dostupné a testované.
                                </p>
                                <div class="incident-details">
                                    <strong class="text-primary">🎉 Dostupné funkce:</strong>
                                    <ul class="mt-2 mb-0">
                                        <li>Vystavování faktur s QR platbami</li>
                                        <li>ARES integrace pro automatické doplňování údajů</li>
                                        <li>Responzivní rozhraní pro všechna zařízení</li>
                                        <li>Export faktur do PDF</li>
                                        <li>Správa klientů a produktů</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Info o dalších incidentech -->
                <div class="text-center mt-5">
                    <div class="info-card bg-light rounded-3 p-4">
                        <h5 class="text-primary mb-3">
                            <i class="bi bi-info-circle me-2"></i>
                            Historie kompletní
                        </h5>
                        <p class="text-muted mb-0">
                            Zobrazena je kompletní historie všech incidentů od spuštění služby v květnu 2025. 
                            Starší záznamy nejsou k dispozici.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tlačítko zpět na status -->
<section class="back-to-status py-4 bg-light border-top">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:status')) /* line 349 */;
		echo '" class="btn btn-primary">
                    <i class="bi bi-arrow-left me-2"></i>
                    Zpět na Status služeb
                </a>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript pro filtrování -->
<script>
document.addEventListener(\'DOMContentLoaded\', function() {
    initIncidentsFiltering();
});

function initIncidentsFiltering() {
    const filterButtons = document.querySelectorAll(\'input[name="incidentFilter"]\');
    const searchInput = document.getElementById(\'incidentsSearch\');
    const incidents = document.querySelectorAll(\'.incident-detail\');
    
    // Filtrování podle typu
    filterButtons.forEach(button => {
        button.addEventListener(\'change\', function() {
            const filterType = this.id.replace(\'filter\', \'\').toLowerCase();
            
            incidents.forEach(incident => {
                const incidentType = incident.getAttribute(\'data-type\');
                let shouldShow = false;
                
                switch(filterType) {
                    case \'all\':
                        shouldShow = true;
                        break;
                    case \'incidents\':
                        shouldShow = incidentType === \'incident\';
                        break;
                    case \'maintenance\':
                        shouldShow = incidentType === \'maintenance\';
                        break;
                    case \'resolved\':
                        shouldShow = incidentType === \'incident\' || incidentType === \'maintenance\';
                        break;
                }
                
                incident.style.display = shouldShow ? \'\' : \'none\';
            });
        });
    });
    
    // Vyhledávání v textu
    searchInput.addEventListener(\'input\', function() {
        const searchTerm = this.value.toLowerCase();
        
        incidents.forEach(incident => {
            const text = incident.textContent.toLowerCase();
            const shouldShow = text.includes(searchTerm);
            
            // Pouze pokud není skrytý filtrem
            if (incident.style.display !== \'none\' || searchTerm) {
                incident.style.display = shouldShow ? \'\' : \'none\';
            }
        });
    });
}
</script>

<style>
.incident-detail {
    transition: all 0.3s ease;
}

.incident-detail:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0,0,0,0.1) !important;
}

.timeline-event {
    padding-left: 1rem;
    border-left: 2px solid var(--primary-color);
    margin-left: 1rem;
    position: relative;
}

.timeline-event::before {
    content: \'\';
    position: absolute;
    left: -6px;
    top: 8px;
    width: 10px;
    height: 10px;
    background: var(--primary-color);
    border-radius: 50%;
}

.month-title {
    border-bottom: 2px solid var(--primary-color);
    padding-bottom: 0.5rem;
}

.incident-id {
    font-family: \'Courier New\', monospace;
}

.btn-check:checked + .btn-outline-primary {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
}
</style>

';
	}
}
