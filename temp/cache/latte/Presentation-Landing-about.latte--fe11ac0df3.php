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
		echo 'O QRdokladu - QRdoklad.cz | od Allimedia.cz';
	}


	/** {block content} on line 5 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '
<div class="about-page">

<!-- Hero sekce -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    O <span class="text-primary">QRdokladu</span>
                </h1>
                <p class="hero-subtitle">
                    Fakturační systém od živnostníka pro živnostníky. 
                    Naší misí je zjednodušit fakturaci pro české podnikatele pomocí moderních technologií.
                </p>
                
                <!-- Statistiky o QRdokladu -->
                <div class="company-stats row g-4 justify-content-center mt-4">
                    <div class="col-auto">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-calendar"></i>
                            </div>
                            <div class="stat-text">
                                <span class="stat-number text-primary">2025</span>
                                <span class="stat-label">Rok vzniku</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-heart"></i>
                            </div>
                            <div class="stat-text">
                                <span class="stat-number text-primary">Osobní</span>
                                <span class="stat-label">Přístup</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-code-slash"></i>
                            </div>
                            <div class="stat-text">
                                <span class="stat-number text-primary">100%</span>
                                <span class="stat-label">Na míru</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- O tvůrci - Aleš/Allimedia -->
<section class="creator-section py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="creator-content">
                    <h2 class="section-title">Ahoj, jmenuji se Aleš</h2>
                    <h3 class="text-primary h4 mb-4">Pod značkou <strong>Allimedia.cz</strong> vyvíjím weby a chytrá řešení</h3>
                    
                    <p class="mb-4">
                        <strong>QRdoklad</strong> je můj autorský fakturační systém, který jsem vytvořil 
                        speciálně pro české podnikatele. Vše od návrhu přes kód až po nasazení řeším 
                        osobně – bez zprostředkovatelů, bez chaosu, s důrazem na kvalitu a funkčnost.
                    </p>
                    
                    <p class="mb-4">
                        Spojuji svět programování s nejnovějšími technologiemi včetně umělé inteligence. 
                        Pomáhám firmám, freelancerům i agenturám tvořit efektivnější weby, automatizovat 
                        opakující se činnosti a vytvářet digitální nástroje, které šetří čas i náklady.
                    </p>
                    
                    <div class="creator-contact mt-4">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-globe text-primary me-2"></i>
                            <span>Allimedia.cz</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-envelope text-primary me-2"></i>
                            <span>info@qrdoklad.cz</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="creator-photo-card">
                    <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($baseUrl)) /* line 99 */;
		echo 'images/ales-qrdoklad.webp" alt="Aleš Zita - zakladatel Allimedia.cz" class="creator-photo">
                    <div class="photo-overlay">
                        <div class="overlay-content text-white text-center">
                            <h5>Aleš Zita</h5>
                            <p class="mb-0">Zakladatel Allimedia.cz</p>
                            <small>Autor QRdokladu (2025)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Proč QRdoklad vznikl -->
<section class="why-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Proč QRdoklad vznikl?</h2>
                <p class="section-subtitle">
                    Příběh, jak vznikl fakturační systém od živnostníka pro živnostníky
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="story-card text-center p-4 h-100">
                    <div class="story-icon">
                        <i class="bi bi-lightbulb text-primary"></i>
                    </div>
                    <h5>Vlastní potřeba</h5>
                    <p class="text-muted">
                        Jako živnostník jsem potřeboval jednoduchý a moderní způsob, 
                        jak vystavovat faktury s QR platbami
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="story-card text-center p-4 h-100">
                    <div class="story-icon">
                        <i class="bi bi-people text-primary"></i>
                    </div>
                    <h5>Pro ostatní živnostníky</h5>
                    <p class="text-muted">
                        Zjistil jsem, že stejný problém má spousta dalších podnikatelů. 
                        Rozhodl jsem se systém zpřístupnit všem
                    </p>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="story-card text-center p-4 h-100">
                    <div class="story-icon">
                        <i class="bi bi-rocket text-primary"></i>
                    </div>
                    <h5>Neustálé vylepšování</h5>
                    <p class="text-muted">
                        Pravidelně přidávám nové funkce na základě zpětné vazby 
                        od uživatelů a vlastních potřeb
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Moje práce a spolupráce -->
<section class="work-section py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="work-visual-card">
                    <div class="card-icon">
                        <i class="bi bi-tools text-primary"></i>
                    </div>
                    <h4 class="text-primary">Co kromě QRdokladu dělám?</h4>
                    <ul class="work-list">
                        <li><i class="bi bi-check text-primary"></i> Webové stránky a aplikace</li>
                        <li><i class="bi bi-check text-primary"></i> WordPress pluginy</li>
                        <li><i class="bi bi-check text-primary"></i> Automatizace procesů</li>
                        <li><i class="bi bi-check text-primary"></i> Integrace s AI nástroji</li>
                        <li><i class="bi bi-check text-primary"></i> Digitální řešení na míru</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-6">
                <h3 class="mb-4">Osobní přístup, profesionální výsledky</h3>
                
                <p class="mb-4">
                    Přestože <strong>Allimedia</strong> je moje osobní značka, podle potřeby 
                    spolupracuji s ověřenými designéry, copywritery nebo markeťáky. 
                    Díky tomu zvládnu i rozsáhlejší projekty bez ztráty lidského přístupu.
                </p>
                
                <div class="approach-points">
                    <div class="approach-point">
                        <div class="point-icon">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <div class="point-content">
                            <h6>Osobní komunikace</h6>
                            <p class="small text-muted">Vždy komunikujete přímo se mnou, ne s call centrem</p>
                        </div>
                    </div>
                    
                    <div class="approach-point">
                        <div class="point-icon">
                            <i class="bi bi-lightning"></i>
                        </div>
                        <div class="point-content">
                            <h6>Rychlé reakce</h6>
                            <p class="small text-muted">Flexibilita malého studia s profesionalitou</p>
                        </div>
                    </div>
                    
                    <div class="approach-point">
                        <div class="point-icon">
                            <i class="bi bi-heart"></i>
                        </div>
                        <div class="point-content">
                            <h6>Lidský přístup</h6>
                            <p class="small text-muted">Každý projekt beru osobně a záleží mi na výsledku</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Moje hodnoty -->
<section class="values-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Moje hodnoty</h2>
                <p class="section-subtitle">
                    Principy, kterými se řídím při každém projektu
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon">
                        <i class="bi bi-lightning text-primary"></i>
                    </div>
                    <h5>Efektivita</h5>
                    <p class="text-muted">
                        Vytvářím řešení, která skutečně šetří čas a zjednoduší práci
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon">
                        <i class="bi bi-shield-check text-primary"></i>
                    </div>
                    <h5>Spolehlivost</h5>
                    <p class="text-muted">
                        Každé řešení důkladně testuji a zajišťuji jeho dlouhodobou funkčnost
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon">
                        <i class="bi bi-people text-primary"></i>
                    </div>
                    <h5>Osobní přístup</h5>
                    <p class="text-muted">
                        Věřím v osobní komunikaci a individuální řešení pro každého klienta
                    </p>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="value-card text-center p-4 h-100">
                    <div class="value-icon">
                        <i class="bi bi-arrow-up text-primary"></i>
                    </div>
                    <h5>Neustálý růst</h5>
                    <p class="text-muted">
                        Sleduju nejnovější trendy a neustále se učím novým technologiím
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA sekce -->
<section class="cta-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title text-white">Máte projekt nebo nápad?</h2>
                <p class="section-subtitle text-white mb-4">
                    Rád si s vámi popovídám o vašich potřebách a najdeme společně nejvhodnější řešení.
                </p>
                
                <div class="cta-buttons">
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 308 */;
		echo '" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-envelope me-2"></i>Napište mi
                    </a>
                    <a href="https://qrdoklad.cz" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-arrow-right me-2"></i>Vyzkoušet QRdoklad
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

</div>

';
	}
}
