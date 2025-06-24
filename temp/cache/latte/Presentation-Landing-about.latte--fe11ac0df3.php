<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/about.latte */
final class Template_fe11ac0df3 extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/about.latte';

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
		echo 'O nás - QRdoklad';
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
                    O společnosti <span class="text-primary">QRdoklad</span>
                </h1>
                <p class="hero-subtitle">
                    Jsme tým nadšenců, kteří věří, že fakturace může být jednoduchá, rychlá a efektivní.
                    Naší misí je pomoci českým podnikatelům ušetřit čas a soustředit se na to, co umí nejlépe.
                </p>
                
                <!-- Statistiky společnosti -->
                <div class="company-stats row g-4 justify-content-center mt-4">
                    <div class="col-auto">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-calendar"></i>
                            </div>
                            <div class="stat-text">
                                <span class="stat-number text-primary">2024</span>
                                <span class="stat-label">Rok založení</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-people"></i>
                            </div>
                            <div class="stat-text">
                                <span class="stat-number text-primary">1000+</span>
                                <span class="stat-label">Spokojených klientů</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-file-text"></i>
                            </div>
                            <div class="stat-text">
                                <span class="stat-number text-primary">50k+</span>
                                <span class="stat-label">Vystavených faktur</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Naše mise -->
<section class="mission-section py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <h2 class="section-title">Naše mise</h2>
                <h3 class="text-primary h4 mb-4">Zjednodušit podnikání pomocí moderních technologií</h3>
                
                <p class="mb-4">
                    Věříme, že každý podnikatel by měl mít přístup k profesionálním nástrojům, které 
                    mu ušetří čas a pomohou se soustředit na podstatné věci - růst jeho podnikání.
                </p>
                
                <div class="mission-points">
                    <div class="mission-point">
                        <div class="point-icon">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <div class="point-content">
                            <h5>Inovace</h5>
                            <p>Používáme nejnovější technologie pro vytváření intuitivních řešení</p>
                        </div>
                    </div>
                    
                    <div class="mission-point">
                        <div class="point-icon">
                            <i class="bi bi-heart"></i>
                        </div>
                        <div class="point-content">
                            <h5>Zákaznický přístup</h5>
                            <p>Každý názor a zpětná vazba od našich klientů je pro nás důležitá</p>
                        </div>
                    </div>
                    
                    <div class="mission-point">
                        <div class="point-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="point-content">
                            <h5>Spolehlivost</h5>
                            <p>Poskytujeme stabilní a bezpečné řešení, na které se můžete spolehnout</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="visual-card">
                    <div class="card-icon">
                        <i class="bi bi-target text-primary"></i>
                    </div>
                    <h4 class="text-primary">Naše vize do roku 2030</h4>
                    <p class="text-muted">
                        Chceme být jedničkou na českém trhu fakturačních systémů a pomoci 
                        více než 10 000 podnikatelům digitalizovat jejich administrativu.
                    </p>
                    <div class="progress-items">
                        <div class="progress-item">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="small">Registrovaní uživatelé</span>
                                <span class="small text-primary">1,200 / 10,000</span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-primary" style="width: 12%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Náš tým -->
<section class="team-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Náš tým</h2>
                <p class="section-subtitle">
                    Poznajte lidi za QRdokladem
                </p>
            </div>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center">
                    <div class="team-photo">
                        <div class="photo-placeholder bg-primary">
                            <i class="bi bi-person text-white"></i>
                        </div>
                    </div>
                    <h5 class="mt-3">Jan Novák</h5>
                    <p class="text-primary mb-2">Founder & CEO</p>
                    <p class="text-muted small">
                        15 let zkušeností v oblasti fintech a vývoje webových aplikací. 
                        Věří v sílu jednoduchých řešení složitých problémů.
                    </p>
                    <div class="social-links">
                        <a href="#" class="text-muted me-2"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center">
                    <div class="team-photo">
                        <div class="photo-placeholder bg-primary">
                            <i class="bi bi-person text-white"></i>
                        </div>
                    </div>
                    <h5 class="mt-3">Petra Svobodová</h5>
                    <p class="text-primary mb-2">CTO</p>
                    <p class="text-muted small">
                        Expertka na backend architekturu a bezpečnost. 
                        Má na starosti technickou stránku celého systému.
                    </p>
                    <div class="social-links">
                        <a href="#" class="text-muted me-2"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card text-center">
                    <div class="team-photo">
                        <div class="photo-placeholder bg-primary">
                            <i class="bi bi-person text-white"></i>
                        </div>
                    </div>
                    <h5 class="mt-3">Tomáš Dvořák</h5>
                    <p class="text-primary mb-2">Head of Customer Success</p>
                    <p class="text-muted small">
                        Zodpoví za spokojenost zákazníků a rozvoj produktu 
                        na základě zpětné vazby od uživatelů.
                    </p>
                    <div class="social-links">
                        <a href="#" class="text-muted me-2"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="text-muted"><i class="bi bi-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Naše hodnoty -->
<section class="values-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Naše hodnoty</h2>
                <p class="section-subtitle">
                    Principy, kterými se řídíme každý den
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon">
                        <i class="bi bi-rocket text-primary"></i>
                    </div>
                    <h5>Rychlost</h5>
                    <p class="text-muted">
                        Rychle reagujeme na potřeby trhu a neustále vylepšujeme náš produkt
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon">
                        <i class="bi bi-hand-thumbs-up text-primary"></i>
                    </div>
                    <h5>Kvalita</h5>
                    <p class="text-muted">
                        Každá funkce prochází důkladným testováním před uvedením do provozu
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon">
                        <i class="bi bi-people-fill text-primary"></i>
                    </div>
                    <h5>Transparentnost</h5>
                    <p class="text-muted">
                        Otevřeně komunikujeme s našimi zákazníky o všech změnách a aktualizacích
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon">
                        <i class="bi bi-shield-check text-primary"></i>
                    </div>
                    <h5>Bezpečnost</h5>
                    <p class="text-muted">
                        Bezpečnost vašich dat je pro nás absolutní prioritou
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Naše cesta -->
<section class="journey-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Naše cesta</h2>
                <p class="section-subtitle">
                    Od nápadu k úspěšnému produktu
                </p>
            </div>
        </div>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-marker">2024</div>
                <div class="timeline-content">
                    <h5>Založení společnosti</h5>
                    <p class="text-muted">
                        Vznik nápadu na jednoduchý fakturační systém s QR platbami 
                        po osobních zkušenostech s komplikovanými řešeními.
                    </p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">Q2</div>
                <div class="timeline-content">
                    <h5>Vývoj MVP</h5>
                    <p class="text-muted">
                        Vytvoření základní verze systému s nejdůležitějšími funkcemi 
                        a testování s prvními uživateli.
                    </p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">Q3</div>
                <div class="timeline-content">
                    <h5>Oficiální launch</h5>
                    <p class="text-muted">
                        Spuštění veřejné beta verze a získání prvních 100 zákazníků 
                        během prvního měsíce.
                    </p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">Q4</div>
                <div class="timeline-content">
                    <h5>Růst a rozvoj</h5>
                    <p class="text-muted">
                        Dosažení 1000+ aktivních uživatelů a přidání pokročilých funkcí 
                        na základě zpětné vazby.
                    </p>
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
                <h2 class="cta-title">Připojte se k naší cestě</h2>
                <p class="cta-subtitle">
                    Staňte se součástí komunity podnikatelů, kteří si zjednodušili fakturaci 
                    s QRdokladem. Začněte ještě dnes zdarma.
                </p>
                <div class="cta-buttons">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-rocket me-2"></i>
                        Vyzkoušet zdarma
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 349 */;
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
