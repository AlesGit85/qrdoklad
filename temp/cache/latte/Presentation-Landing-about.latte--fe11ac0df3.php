<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/about.latte */
final class Template_fe11ac0df3 extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/about.latte';

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
<section class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title text-white mb-4">
                    O společnosti QRdoklad
                </h1>
                <p class="hero-subtitle text-light mb-4">
                    Jsme tým nadšenců, kteří věří, že fakturace může být jednoduchá, rychlá a efektivní.
                    Naší misí je pomoci českým podnikatelům ušetřit čas a soustředit se na to, co umí nejlépe.
                </p>
                <div class="hero-stats row g-4 justify-content-center">
                    <div class="col-auto">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-calendar"></i>
                            </div>
                            <div class="stat-text">
                                <span class="stat-number">2024</span>
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
                                <span class="stat-number">1000+</span>
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
                                <span class="stat-number">50k+</span>
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
                <div class="mission-content">
                    <h2 class="section-title">Naše mise</h2>
                    <p class="section-subtitle text-muted">
                        Zjednodušit podnikání pomocí moderních technologií
                    </p>
                    <p>
                        Věříme, že každý podnikatel by měl mít přístup k profesionálním nástrojům, 
                        které mu umožní efektivně spravovat svou administrativu. QRdoklad je výsledkem 
                        našeho úsilí vytvořit fakturační systém, který kombinuje jednoduchost s výkonem.
                    </p>
                    <p>
                        Naším cílem není jen poskytovat software, ale být partnerem, který pomáhá 
                        českým firmám růst a prosperovat v digitální éře.
                    </p>
                    <div class="mission-values mt-4">
                        <div class="value-item d-flex align-items-center mb-3">
                            <div class="value-icon me-3">
                                <i class="bi bi-lightbulb text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Inovace</h6>
                                <p class="small text-muted mb-0">Neustále hledáme nové způsoby, jak zlepšit uživatelský zážitek</p>
                            </div>
                        </div>
                        <div class="value-item d-flex align-items-center mb-3">
                            <div class="value-icon me-3">
                                <i class="bi bi-shield-check text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Spolehlivost</h6>
                                <p class="small text-muted mb-0">Vaše data jsou v bezpečí a služba dostupná 24/7</p>
                            </div>
                        </div>
                        <div class="value-item d-flex align-items-center">
                            <div class="value-icon me-3">
                                <i class="bi bi-heart text-primary"></i>
                            </div>
                            <div>
                                <h6 class="mb-1">Zákaznický přístup</h6>
                                <p class="small text-muted mb-0">Každý zákazník je pro nás důležitý, bez ohledu na velikost</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mission-image">
                    <div class="image-placeholder bg-primary bg-opacity-10 rounded d-flex align-items-center justify-content-center">
                        <div class="text-center">
                            <i class="bi bi-rocket text-primary" style="font-size: 6rem; opacity: 0.3;"></i>
                            <p class="text-muted mt-3">Zde bude obrázek týmu nebo kanceláře</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Náš příběh -->
<section class="story-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Náš příběh</h2>
                <p class="section-subtitle">
                    Jak vznikl QRdoklad a proč jsme se rozhodli změnit svět fakturace
                </p>
            </div>
        </div>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-marker">
                    <div class="timeline-icon">
                        <i class="bi bi-lightbulb"></i>
                    </div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-date">Začátek 2024</div>
                    <h5>Nápad</h5>
                    <p>
                        Frustrace z komplikovaných fakturačních systémů nás vedla k myšlence 
                        vytvořit něco lepšího. Systém, který bude intuitivní, rychlý a přitom výkonný.
                    </p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">
                    <div class="timeline-icon">
                        <i class="bi bi-code-slash"></i>
                    </div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-date">Jaro 2024</div>
                    <h5>Vývoj</h5>
                    <p>
                        Začali jsme vyvíjet první verzi QRdokladu. Zaměřili jsme se na jednoduchost 
                        použití a moderní technologie včetně QR plateb.
                    </p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">
                    <div class="timeline-icon">
                        <i class="bi bi-people"></i>
                    </div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-date">Léto 2024</div>
                    <h5>Beta testování</h5>
                    <p>
                        Spustili jsme beta verzi s prvními uživateli. Jejich zpětná vazba 
                        nám pomohla vylepšit systém a přidat chybějící funkce.
                    </p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">
                    <div class="timeline-icon">
                        <i class="bi bi-rocket"></i>
                    </div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-date">Podzim 2024</div>
                    <h5>Oficiální spuštění</h5>
                    <p>
                        QRdoklad byl oficiálně spuštěn pro veřejnost. Od té doby neustále 
                        přidáváme nové funkce a vylepšujeme uživatelský zážitek.
                    </p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-marker">
                    <div class="timeline-icon">
                        <i class="bi bi-graph-up"></i>
                    </div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-date">2025</div>
                    <h5>Růst a inovace</h5>
                    <p>
                        Pokračujeme v rozvoji systému, přidáváme pokročilé funkce 
                        a rozšiřujeme náš tým, abychom mohli poskytovat ještě lepší služby.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Náš tým -->
<section class="team-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Náš tým</h2>
                <p class="section-subtitle">
                    Poznamezte lidi, kteří stojí za QRdokladem
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-avatar">
                        <div class="avatar-placeholder bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person text-primary" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                    <div class="team-info">
                        <h5>Jan Novák</h5>
                        <p class="team-role text-primary">CEO & Founder</p>
                        <p class="team-description">
                            Zakladatel a vizionář QRdokladu. Více než 10 let zkušeností 
                            v oblasti fintech a podnikového software.
                        </p>
                        <div class="team-social">
                            <a href="#" class="text-muted me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-muted me-2"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="text-muted"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-avatar">
                        <div class="avatar-placeholder bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person text-primary" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                    <div class="team-info">
                        <h5>Marie Svobodová</h5>
                        <p class="team-role text-primary">CTO</p>
                        <p class="team-description">
                            Technická vedoucí s vášní pro clean code a uživatelský zážitek. 
                            Specialistka na cloud architekturu a bezpečnost.
                        </p>
                        <div class="team-social">
                            <a href="#" class="text-muted me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-muted me-2"><i class="bi bi-github"></i></a>
                            <a href="#" class="text-muted"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-avatar">
                        <div class="avatar-placeholder bg-primary bg-opacity-10 rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person text-primary" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                    <div class="team-info">
                        <h5>Pavel Dvořák</h5>
                        <p class="team-role text-primary">Head of Customer Success</p>
                        <p class="team-description">
                            Stará se o spokojenost našich zákazníků a řídí tým podpory. 
                            Věří, že každý problém má řešení.
                        </p>
                        <div class="team-social">
                            <a href="#" class="text-muted me-2"><i class="bi bi-linkedin"></i></a>
                            <a href="#" class="text-muted me-2"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="text-muted"><i class="bi bi-envelope"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-12 text-center">
                <div class="join-team-cta p-4 bg-primary bg-opacity-10 rounded">
                    <h4 class="text-primary mb-3">Chcete se k nám přidat?</h4>
                    <p class="mb-3">
                        Hledáme talentované lidi, kteří chtějí měnit svět technologií. 
                        Podívejte se na naše otevřené pozice.
                    </p>
                    <a href="#" class="btn btn-primary">
                        <i class="bi bi-briefcase me-2"></i>
                        Zobrazit volné pozice
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontakt a lokace -->
<section class="location-section py-5 bg-light">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6">
                <h2 class="section-title">Kde nás najdete</h2>
                <p class="section-subtitle text-muted mb-4">
                    Jsme česká společnost s kořeny v Hradci Králové
                </p>
                
                <div class="location-info">
                    <div class="contact-item d-flex align-items-start mb-4">
                        <div class="contact-icon me-3">
                            <i class="bi bi-geo-alt text-primary"></i>
                        </div>
                        <div>
                            <h6>Adresa</h6>
                            <p class="text-muted mb-0">
                                Librantice 167<br>
                                503 46 Librantice<br>
                                Česká republika
                            </p>
                        </div>
                    </div>
                    
                    <div class="contact-item d-flex align-items-start mb-4">
                        <div class="contact-icon me-3">
                            <i class="bi bi-telephone text-primary"></i>
                        </div>
                        <div>
                            <h6>Telefon</h6>
                            <p class="text-muted mb-0">
                                <a href="tel:+420703985390" class="text-decoration-none">
                                    +420 703 985 390
                                </a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="contact-item d-flex align-items-start mb-4">
                        <div class="contact-icon me-3">
                            <i class="bi bi-envelope text-primary"></i>
                        </div>
                        <div>
                            <h6>E-mail</h6>
                            <p class="text-muted mb-0">
                                <a href="mailto:info@qrdoklad.cz" class="text-decoration-none">
                                    info@qrdoklad.cz
                                </a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="contact-item d-flex align-items-start">
                        <div class="contact-icon me-3">
                            <i class="bi bi-clock text-primary"></i>
                        </div>
                        <div>
                            <h6>Pracovní doba</h6>
                            <p class="text-muted mb-0">
                                Pondělí - Pátek: 9:00 - 17:00<br>
                                Sobota - Neděle: Zavřeno
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="map-placeholder bg-light border rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                    <div class="text-center text-muted">
                        <i class="bi bi-map" style="font-size: 4rem; opacity: 0.3;"></i>
                        <p class="mt-3">Zde bude interaktivní mapa</p>
                        <small>Google Maps integrace</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section text-white text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="cta-title text-dark">Připraveni začít s QRdokladem?</h2>
                <p class="cta-subtitle text-dark">
                    Připojte se k více než 1000 spokojeným podnikatelům, 
                    kteří již používají QRdoklad pro svou fakturaci.
                </p>
                
                <div class="cta-buttons d-flex flex-column flex-sm-row gap-3 justify-content-center">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-dark btn-lg">
                        <i class="bi bi-rocket me-2"></i>
                        Vyzkoušet 30 dní zdarma
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 413 */;
		echo '" class="btn btn-outline-dark btn-lg">
                        <i class="bi bi-calendar me-2"></i>
                        Naplánovat demo
                    </a>
                </div>
                
                <div class="cta-features row g-3 justify-content-center mt-4">
                    <div class="col-auto">
                        <span class="cta-feature text-dark">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            Bez závazků
                        </span>
                    </div>
                    <div class="col-auto">
                        <span class="cta-feature text-dark">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            Platební karta není potřeba
                        </span>
                    </div>
                    <div class="col-auto">
                        <span class="cta-feature text-dark">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            Aktivace do 2 minut
                        </span>
                    </div>
                </div>
                
                <div class="guarantee-info mt-4">
                    <p class="small text-dark mb-1">
                        <i class="bi bi-shield-check me-1"></i>
                        <strong>30denní záruka vrácení peněz</strong>
                    </p>
                    <p class="small text-dark opacity-75">
                        Pokud nebudete spokojeni, vrátíme vám všechny peníze. Bez otázek.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
