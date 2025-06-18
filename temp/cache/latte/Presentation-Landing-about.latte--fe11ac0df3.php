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
<!-- Hero sekce pro O nás -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    O <span class="text-primary">QRdokladu</span>
                </h1>
                <p class="hero-subtitle">
                    Jsme tým nadšenců, kteří věří, že fakturace může být jednoduchá, rychlá a příjemná. 
                    Naše mise je revolucionalizovat způsob, jakým čeští podnikatelé spravují své finance.
                </p>
                <div class="hero-stats mt-4">
                    <div class="row justify-content-center g-4">
                        <div class="col-auto">
                            <div class="stat-item">
                                <h3 class="text-primary counter" data-count="1000">0</h3>
                                <p>Spokojených zákazníků</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-item">
                                <h3 class="text-primary counter" data-count="50000">0</h3>
                                <p>Vystavených faktur</p>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-item">
                                <h3 class="text-primary counter" data-count="2024">0</h3>
                                <p>Rok založení</p>
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
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <h2 class="section-title">Naše mise</h2>
                <p class="section-subtitle mb-4">
                    Věříme, že administrace by neměla brzdit podnikání. Proto vytváříme nástroje, 
                    které šetří čas a umožňují podnikatelům soustředit se na to, co je baví.
                </p>
                
                <div class="mission-points">
                    <div class="mission-point">
                        <div class="point-icon">
                            <i class="bi bi-lightning-charge"></i>
                        </div>
                        <div class="point-content">
                            <h5>Rychlost a jednoduchost</h5>
                            <p>Fakturu vystavíte za méně než 2 minuty díky intuitivnímu rozhraní.</p>
                        </div>
                    </div>
                    
                    <div class="mission-point">
                        <div class="point-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        <div class="point-content">
                            <h5>Bezpečnost a spolehlivost</h5>
                            <p>Vaše data jsou v bezpečí díky moderním technologiím a pravidelným zálohám.</p>
                        </div>
                    </div>
                    
                    <div class="mission-point">
                        <div class="point-icon">
                            <i class="bi bi-heart"></i>
                        </div>
                        <div class="point-content">
                            <h5>Zákaznická spokojenost</h5>
                            <p>Neustále vylepšujeme náš systém na základě zpětné vazby od uživatelů.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="mission-visual">
                    <div class="visual-card">
                        <div class="card-icon">
                            <i class="bi bi-bullseye"></i>
                        </div>
                        <h4>Naše vize</h4>
                        <p>
                            Chceme být nejvíce oblíbeným fakturačním systémem v České republice. 
                            Systémem, který je tak jednoduchý a efektivní, že si uživatelé nedokážou 
                            představit práci bez něj.
                        </p>
                        <div class="progress-indicators">
                            <div class="progress-item">
                                <span>Uživatelská spokojenost</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 96%">96%</div>
                                </div>
                            </div>
                            <div class="progress-item">
                                <span>Rychlost růstu</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 87%">87%</div>
                                </div>
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
                    Poznámte lidi, kteří denně pracují na tom, aby byl QRdoklad lepší
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-avatar">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <h5>Martin Nový</h5>
                    <p class="role">Zakladatel & CEO</p>
                    <p class="bio">
                        Zkušený podnikatel s vášní pro jednoduché řešení složitých problémů. 
                        15 let zkušeností v IT a fintech.
                    </p>
                    <div class="team-social">
                        <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-twitter-x"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-avatar">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <h5>Jana Svobodová</h5>
                    <p class="role">CTO & Tech Lead</p>
                    <p class="bio">
                        Technologická nadšenkyně, která dbá na to, aby QRdoklad fungoval 
                        rychle, bezpečně a spolehlivě 24/7.
                    </p>
                    <div class="team-social">
                        <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="team-card">
                    <div class="team-avatar">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <h5>Tomáš Dvořák</h5>
                    <p class="role">Head of Customer Success</p>
                    <p class="bio">
                        Zodpovídá za spokojenost našich zákazníků. Věří, že nejlepší produkt 
                        je ten, který skutečně pomáhá lidem.
                    </p>
                    <div class="team-social">
                        <a href="#" class="social-link"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="social-link"><i class="bi bi-envelope"></i></a>
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
                    Principy, kterými se řídíme při vývoji a provozu QRdokladu
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-rocket-takeoff"></i>
                    </div>
                    <h5>Inovace</h5>
                    <p>Neustále hledáme nové způsoby, jak zjednodušit a zrychlit fakturaci.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <h5>Zákazník na prvním místě</h5>
                    <p>Každé rozhodnutí děláme s ohledem na to, co je nejlepší pro naše uživatele.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-transparency"></i>
                    </div>
                    <h5>Transparentnost</h5>
                    <p>Žádné skryté poplatky, jasný ceník a otevřená komunikace.</p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-card">
                    <div class="value-icon">
                        <i class="bi bi-award"></i>
                    </div>
                    <h5>Kvalita</h5>
                    <p>Preferujeme kvalitu před kvantitou ve všem, co děláme.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Časová osa -->
<section class="timeline-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Naše cesta</h2>
                <p class="section-subtitle">
                    Jak se QRdoklad vyvíjel od nápadu k realitě
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <div class="timeline-content">
                            <h5>Leden 2024 - Nápad</h5>
                            <p>
                                Zakladatel Martin bojoval s komplikovaným fakturačním systémem 
                                ve své firmě. Rozhodl se vytvořit něco lepšího.
                            </p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <i class="bi bi-code-slash"></i>
                        </div>
                        <div class="timeline-content">
                            <h5>Březen 2024 - První prototyp</h5>
                            <p>
                                Tým začal pracovat na MVP s básickou funkcionalitou 
                                pro vystavování faktur s QR platbami.
                            </p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="timeline-content">
                            <h5>Červen 2024 - Beta testování</h5>
                            <p>
                                50 beta testerů pomohlo vyladit systém a identifikovat 
                                nejdůležitější funkce pro první verzi.
                            </p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <i class="bi bi-rocket"></i>
                        </div>
                        <div class="timeline-content">
                            <h5>Září 2024 - Oficiální spuštění</h5>
                            <p>
                                QRdoklad oficiálně vstoupil na trh s kompletní sadou 
                                funkcí pro malé a střední podniky.
                            </p>
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-marker">
                            <i class="bi bi-trophy"></i>
                        </div>
                        <div class="timeline-content">
                            <h5>Prosinec 2024 - První milník</h5>
                            <p>
                                Překročili jsme hranici 1000 aktivních uživatelů 
                                a 50 000 vystavených faktur.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontakt tým -->
<section class="team-contact py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="contact-card bg-white p-4 p-md-5 rounded-3 shadow text-center">
                    <h3 class="text-primary mb-3">Chcete se k nám připojit?</h3>
                    <p class="mb-4">
                        Hledáme talentované lidi, kteří chtějí pomoci změnit způsob, 
                        jakým čeští podnikatelé spravují své finance.
                    </p>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="job-highlight">
                                <i class="bi bi-house-heart text-primary"></i>
                                <h6>Práce z domova</h6>
                                <p class="small mb-0">Flexibilní pracovní doba</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="job-highlight">
                                <i class="bi bi-graph-up-arrow text-primary"></i>
                                <h6>Růst s firmou</h6>
                                <p class="small mb-0">Možnost podílet se na úspěchu</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="job-highlight">
                                <i class="bi bi-people text-primary"></i>
                                <h6>Skvělý tým</h6>
                                <p class="small mb-0">Příjemná pracovní atmosféra</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-buttons">
                        <a href="mailto:kariera@qrdoklad.cz" class="btn btn-primary btn-lg me-3">
                            <i class="bi bi-envelope me-2"></i>
                            Napište nám
                        </a>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 371 */;
		echo '" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-chat-dots me-2"></i>
                            Více informací
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
                <h2 class="cta-title">Připojte se k naší komunitě</h2>
                <p class="cta-subtitle">
                    Stanete se součástí rostoucí komunity podnikatelů, kteří si zjednodušili 
                    fakturaci s QRdokladem.
                </p>
                <div class="cta-buttons">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-light btn-lg me-3" target="_blank" rel="noopener">
                        <i class="bi bi-rocket-takeoff me-2"></i>
                        Začít zdarma
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 397 */;
		echo '" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-chat-dots me-2"></i>
                        Kontaktovat nás
                    </a>
                </div>
                
                <div class="guarantee-info mt-4">
                    <p class="mb-0">
                        <i class="bi bi-shield-check me-2"></i>
                        30 dní zdarma • Bez závazků • Česká podpora
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.stat-item {
    text-align: center;
    padding: 1rem;
}

.stat-item h3 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stat-item p {
    color: #6c757d;
    margin: 0;
    font-weight: 500;
}

.mission-point {
    display: flex;
    align-items: flex-start;
    margin-bottom: 2rem;
    gap: 1rem;
}

.point-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #B1D235, #95B11F);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #212529;
    font-size: 1.5rem;
    flex-shrink: 0;
}

.point-content h5 {
    color: #212529;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.point-content p {
    color: #6c757d;
    margin: 0;
    line-height: 1.5;
}

.visual-card {
    background: white;
    padding: 2.5rem;
    border-radius: 16px;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.visual-card .card-icon {
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, #B1D235, #95B11F);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: #212529;
    font-size: 2.5rem;
}

.visual-card h4 {
    color: #212529;
    font-weight: 700;
    margin-bottom: 1rem;
}

.progress-indicators {
    margin-top: 2rem;
}

.progress-item {
    margin-bottom: 1rem;
}

.progress-item span {
    display: block;
    color: #6c757d;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
    text-align: left;
}

.progress {
    height: 8px;
    background: #f8f9fa;
    border-radius: 4px;
}

.progress-bar {
    background: linear-gradient(90deg, #B1D235, #95B11F);
    border-radius: 4px;
    height: 100%;
    transition: width 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    padding-right: 8px;
    color: #212529;
    font-size: 0.8rem;
    font-weight: 600;
}

.team-card {
    background: white;
    padding: 2rem;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
}

.team-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(177, 210, 53, 0.2);
}

.team-avatar {
    width: 100px;
    height: 100px;
    margin: 0 auto 1.5rem;
    color: #B1D235;
    font-size: 6rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.team-card h5 {
    color: #212529;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.team-card .role {
    color: #B1D235;
    font-weight: 600;
    margin-bottom: 1rem;
}

.team-card .bio {
    color: #6c757d;
    line-height: 1.5;
    margin-bottom: 1.5rem;
}

.team-social {
    display: flex;
    justify-content: center;
    gap: 1rem;
}

.social-link {
    width: 40px;
    height: 40px;
    background: #f8f9fa;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #6c757d;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: #B1D235;
    color: #212529;
    transform: translateY(-2px);
}

.value-card {
    background: white;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
}

.value-card:hover {
    transform: translateY(-5px);
}

.value-icon {
    width: 70px;
    height: 70px;
    background: linear-gradient(135deg, #B1D235, #95B11F);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    color: #212529;
    font-size: 2rem;
}

.value-card h5 {
    color: #212529;
    font-weight: 600;
    margin-bottom: 1rem;
}

.value-card p {
    color: #6c757d;
    line-height: 1.5;
    margin: 0;
}

.timeline {
    position: relative;
    padding: 2rem 0;
}

.timeline::before {
    content: \'\';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 2px;
    background: #B1D235;
    transform: translateX(-50%);
}

.timeline-item {
    position: relative;
    display: flex;
    justify-content: center;
    margin-bottom: 3rem;
}

.timeline-item:nth-child(odd) .timeline-content {
    text-align: right;
    padding-right: 3rem;
    margin-right: 2rem;
}

.timeline-item:nth-child(even) .timeline-content {
    text-align: left;
    padding-left: 3rem;
    margin-left: 2rem;
}

.timeline-marker {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #B1D235, #95B11F);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #212529;
    font-size: 1.5rem;
    z-index: 2;
    border: 4px solid white;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

.timeline-content {
    background: white;
    padding: 1.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    max-width: 350px;
}

.timeline-content h5 {
    color: #212529;
    font-weight: 600;
    margin-bottom: 1rem;
}

.timeline-content p {
    color: #6c757d;
    line-height: 1.5;
    margin: 0;
}

.job-highlight {
    text-align: center;
    padding: 1rem;
}

.job-highlight i {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.job-highlight h6 {
    color: #212529;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

@media (max-width: 768px) {
    .hero-stats .row {
        flex-direction: column;
        gap: 1rem;
    }
    
    .mission-point {
        flex-direction: column;
        text-align: center;
        gap: 1rem;
    }
    
    .point-icon {
        margin: 0 auto;
    }
    
    .timeline::before {
        left: 30px;
    }
    
    .timeline-marker {
        left: 30px;
    }
    
    .timeline-item:nth-child(odd) .timeline-content,
    .timeline-item:nth-child(even) .timeline-content {
        text-align: left;
        padding-left: 80px;
        margin-left: 0;
        margin-right: 0;
        padding-right: 1.5rem;
    }
    
    .contact-buttons .btn {
        width: 100%;
        margin-bottom: 1rem;
    }
}
</style>

';
	}
}
