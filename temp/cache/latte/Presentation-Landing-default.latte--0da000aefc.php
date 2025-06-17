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
        <div class="row align-items-center min-vh-100 py-5">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="hero-title">
                        Moderní fakturační systém 
                        <span class="text-primary">pro vaše podnikání</span>
                    </h1>
                    <p class="hero-subtitle">
                        Vystavujte faktury rychle a profesionálně s QR platbami, 
                        automatickým ARES vyhledáváním a pokročilými funkcemi pro efektivní správu financí.
                    </p>
                    <div class="hero-buttons">
                        <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-primary btn-lg me-3">
                            <i class="bi bi-rocket-takeoff me-2"></i>
                            Vyzkoušet zdarma
                        </a>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 22 */;
		echo '" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-play-circle me-2"></i>
                            Zobrazit demo
                        </a>
                    </div>
                    <div class="hero-features">
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill text-primary"></i>
                            <span>30 dní zdarma</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill text-primary"></i>
                            <span>Bez závazků</span>
                        </div>
                        <div class="feature-item">
                            <i class="bi bi-check-circle-fill text-primary"></i>
                            <span>Česká podpora</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image">
                    <div class="floating-card invoice-card">
                        <div class="card-header">
                            <h6 class="mb-0">Faktura #2024-001</h6>
                            <span class="badge bg-success">Zaplaceno</span>
                        </div>
                        <div class="card-body">
                            <div class="invoice-total">45 890 Kč</div>
                            <div class="qr-code-placeholder"></div>
                        </div>
                    </div>
                    <div class="floating-card stats-card">
                        <div class="stat-item">
                            <i class="bi bi-graph-up text-primary"></i>
                            <div>
                                <div class="stat-number">+247%</div>
                                <div class="stat-label">Rychlost vystavení</div>
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
                    <p>Kompletní přehled o vašich příjmech, výdajích a DPH. Vše na jednom místě.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="bi bi-phone"></i>
                    </div>
                    <h4>Mobilní aplikace</h4>
                    <p>Spravujte faktury kdykoli a kdekoli. Plně responzivní design pro všechna zařízení.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Funkce sekce -->
<section class="features-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2 class="section-title">Kompletní řešení pro vaši administrativu</h2>
                <p class="section-subtitle mb-4">
                    Vše co potřebujete pro efektivní správu faktur a klientů na jednom místě
                </p>
                
                <div class="feature-list">
                    <div class="feature-list-item">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        <div>
                            <h5>Správa klientů</h5>
                            <p>Uchovávejte všechny informace o vašich klientech strukturovaně</p>
                        </div>
                    </div>
                    
                    <div class="feature-list-item">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        <div>
                            <h5>Vlastní šablony</h5>
                            <p>Přizpůsobte si faktury podle vašich potřeb a firemního stylu</p>
                        </div>
                    </div>
                    
                    <div class="feature-list-item">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        <div>
                            <h5>Automatické připomínky</h5>
                            <p>Systém pošle připomínky o splatných fakturách automaticky</p>
                        </div>
                    </div>
                </div>
                
                <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 182 */;
		echo '" class="btn btn-primary btn-lg mt-3">
                    <i class="bi bi-arrow-right me-2"></i>
                    Zobrazit všechny funkce
                </a>
            </div>
            
            <div class="col-lg-6">
                <div class="features-visual">
                    <div class="dashboard-preview">
                        <!-- Zde by byl screenshot dashboardu -->
                        <div class="preview-placeholder">
                            <i class="bi bi-graph-up-arrow"></i>
                            <p>Dashboard náhled</p>
                        </div>
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
                        "Přechod z konkurence byl hračka. Export, import a během hodiny jsem měl vše nastavené."
                    </p>
                    <div class="testimonial-author">
                        <div class="author-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <div>
                            <h6>Tomáš Dvořák</h6>
                            <small>Účetní firma</small>
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
                <h2 class="cta-title">Začněte ještě dnes</h2>
                <p class="cta-subtitle">
                    Připojte se k tisícům spokojených podnikatelů, kteří už používají QRdoklad. 
                    Prvních 30 dní máte zdarma!
                </p>
                <div class="cta-buttons">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-rocket-takeoff me-2"></i>
                        Vyzkoušet zdarma
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 306 */;
		echo '" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-chat-dots me-2"></i>
                        Máte otázky?
                    </a>
                </div>
                
                <div class="cta-features mt-4">
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <div class="cta-feature">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Bez platební karty</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="cta-feature">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Zrušitelné kdykoli</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="cta-feature">
                                <i class="bi bi-check-circle-fill me-2"></i>
                                <span>Aktivace za 2 minuty</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
