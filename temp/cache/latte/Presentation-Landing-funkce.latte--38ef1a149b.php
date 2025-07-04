<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/funkce.latte */
final class Template_38ef1a149b extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/funkce.latte';

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
<!-- Hero sekce pro funkce -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Kompletní přehled <span class="text-primary">funkcí</span>
                </h1>
                <p class="hero-subtitle">
                    QRdoklad obsahuje vše, co potřebujete pro efektivní správu faktur a klientů. 
                    Objevte všechny možnosti, které vám náš systém nabízí.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Hlavní funkce -->
<section class="features-detail-section py-5">
    <div class="container">
        <div class="row g-5">
            <!-- QR platby -->
            <div class="col-lg-6">
                <div class="feature-detail-card">
                    <div class="feature-icon-large">
                        <i class="bi bi-qr-code"></i>
                    </div>
                    <h3>QR platby</h3>
                    <p class="feature-description">
                        Každá faktura obsahuje QR kód pro okamžitou platbu. Vaši klienti jednoduše naskenují kód 
                        mobilním bankovnictvím a platba je vyřízena během sekund.
                    </p>
                    <ul class="feature-benefits">
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Okamžité platby</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Minimální riziko chyb</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Kompatibilní se všemi bankami</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Automatické párování plateb</li>
                    </ul>
                </div>
            </div>

            <!-- ARES integrace -->
            <div class="col-lg-6">
                <div class="feature-detail-card">
                    <div class="feature-icon-large">
                        <i class="bi bi-search"></i>
                    </div>
                    <h3>ARES integrace</h3>
                    <p class="feature-description">
                        Automatické vyhledávání a doplňování firemních údajů z databáze ARES. 
                        Stačí zadat IČO a vše ostatní se vyplní samo.
                    </p>
                    <ul class="feature-benefits">
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Aktuální firemní údaje</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Ušetřený čas při vystavování</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Minimální riziko chyb</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Ověření plátcovství DPH</li>
                    </ul>
                </div>
            </div>

            <!-- Správa klientů -->
            <div class="col-lg-6">
                <div class="feature-detail-card">
                    <div class="feature-icon-large">
                        <i class="bi bi-people"></i>
                    </div>
                    <h3>Správa klientů</h3>
                    <p class="feature-description">
                        Uchovávejte všechny informace o vašich klientech na jednom místě. 
                        Historie faktur, kontaktní údaje a poznámky vždy po ruce.
                    </p>
                    <ul class="feature-benefits">
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Kompletní klientské profily</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Historie všech faktur</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Poznámky a tagy</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Export dat</li>
                    </ul>
                </div>
            </div>

            <!-- Šablony faktur -->
            <div class="col-lg-6">
                <div class="feature-detail-card">
                    <div class="feature-icon-large">
                        <i class="bi bi-file-earmark-text"></i>
                    </div>
                    <h3>Vlastní šablony</h3>
                    <p class="feature-description">
                        Přizpůsobte si faktury podle vašeho firemního stylu. 
                        Vlastní logo, barvy, fonty a rozložení.
                    </p>
                    <ul class="feature-benefits">
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Vlastní logo a hlavička</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Firemní barvy a fonty</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Různé formáty (A4, A5)</li>
                        <li><i class="bi bi-check-circle-fill text-primary"></i> Více šablon pro různé účely</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pokročilé funkce -->
<section class="advanced-features-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Pokročilé funkce</h2>
                <p class="section-subtitle">
                    Pro efektivní správu vašich financí a administrativy
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="advanced-feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                    <h5>Reporty a analýzy</h5>
                    <p>Kompletní přehled příjmů, výdajů a DPH. Grafy, exporty do Excelu a připravené sestavy pro účetní.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="advanced-feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                    <h5>Automatické připomínky</h5>
                    <p>Systém automaticky pošle připomínky o splatných fakturách. Nastavitelné termíny a vlastní texty.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="advanced-feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5>Bezpečnost a zálohy</h5>
                    <p>Pravidelné automatické zálohy, šifrování dat a dvou-faktorové ověřování pro maximální bezpečnost.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="advanced-feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-arrow-repeat"></i>
                    </div>
                    <h5>Opakující se faktury</h5>
                    <p>Nastavte automatické vystavování pro pravidelné služby. Měsíční, čtvrtletní nebo roční cykly.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="advanced-feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-phone"></i>
                    </div>
                    <h5>Mobilní aplikace</h5>
                    <p>Spravujte faktury kdekoli. Plně responzivní design optimalizovaný pro mobily a tablety.</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="advanced-feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-puzzle"></i>
                    </div>
                    <h5>API integrace</h5>
                    <p>Propojte QRdoklad s vašimi systémy přes REST API. Dokumentace a SDK k dispozici.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Proces vystavení faktury -->
<section class="process-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Jak jednoduše vystavit fakturu</h2>
                <p class="section-subtitle">
                    Celý proces zabere méně než 2 minuty
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">1</div>
                    <div class="step-icon">
                        <i class="bi bi-person-plus"></i>
                    </div>
                    <h5>Vyberte klienta</h5>
                    <p>Zadejte IČO nebo vyberte z existujících klientů. ARES automaticky doplní údaje.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">2</div>
                    <div class="step-icon">
                        <i class="bi bi-list-ul"></i>
                    </div>
                    <h5>Přidejte položky</h5>
                    <p>Zadejte služby nebo zboží. Systém automaticky vypočítá DPH a celkovou částku.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">3</div>
                    <div class="step-icon">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h5>Zkontrolujte náhled</h5>
                    <p>Prohlédněte si náhled faktury s QR kódem a zkontrolujte všechny údaje.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="process-step">
                    <div class="step-number">4</div>
                    <div class="step-icon">
                        <i class="bi bi-send"></i>
                    </div>
                    <h5>Odešlete klientovi</h5>
                    <p>Pošlete e-mailem nebo stáhněte PDF. Klient může okamžitě zaplatit přes QR kód.</p>
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
                <h2 class="cta-title">Připraveni začít?</h2>
                <p class="cta-subtitle">
                    Registrace je zdarma a všechny základní funkce máte navždy bez poplatků. 
                    Bez platební karty, bez závazků.
                </p>
                <div class="cta-buttons">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-rocket-takeoff me-2"></i>
                        Registrace zdarma
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 258 */;
		echo '" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-chat-dots me-2"></i>
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
