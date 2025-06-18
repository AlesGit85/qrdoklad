<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/faq.latte */
final class Template_8ee902cb3d extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/faq.latte';

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


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['categoryKey' => '100', 'category' => '100', 'index' => '108', 'qa' => '108'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '
<!-- Hero sekce pro FAQ -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Často kladené <span class="text-primary">otázky</span>
                </h1>
                <p class="hero-subtitle">
                    Najděte rychlé odpovědi na nejčastější dotazy ohledně QRdokladu. 
                    Pokud nenajdete odpověď, neváhejte nás kontaktovat.
                </p>
                <div class="hero-features mt-4">
                    <div class="feature-item">
                        <i class="bi bi-search text-primary"></i>
                        <span>Rychlé hledání</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-clock text-primary"></i>
                        <span>Okamžité odpovědi</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-chat-dots text-primary"></i>
                        <span>Další podpora</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ kategorie přehled -->
<section class="faq-categories py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Kategorie otázek</h2>
                <p class="section-subtitle">
                    Vyberte kategorii, která vás zajímá nejvíce
                </p>
            </div>
        </div>
        
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="faq-category-card">
                    <div class="category-icon">
                        <i class="bi bi-info-circle"></i>
                    </div>
                    <h5>Obecné otázky</h5>
                    <p>';
		echo LR\Filters::escapeHtmlText(count($faqData['general']['questions'])) /* line 53 */;
		echo ' otázek</p>
                    <a href="#general" class="btn btn-outline-primary btn-sm">Zobrazit</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="faq-category-card">
                    <div class="category-icon">
                        <i class="bi bi-currency-euro"></i>
                    </div>
                    <h5>Ceny a platba</h5>
                    <p>';
		echo LR\Filters::escapeHtmlText(count($faqData['pricing']['questions'])) /* line 64 */;
		echo ' otázek</p>
                    <a href="#pricing" class="btn btn-outline-primary btn-sm">Zobrazit</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="faq-category-card">
                    <div class="category-icon">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h5>Technické otázky</h5>
                    <p>';
		echo LR\Filters::escapeHtmlText(count($faqData['technical']['questions'])) /* line 75 */;
		echo ' otázek</p>
                    <a href="#technical" class="btn btn-outline-primary btn-sm">Zobrazit</a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="faq-category-card">
                    <div class="category-icon">
                        <i class="bi bi-tools"></i>
                    </div>
                    <h5>Funkce</h5>
                    <p>';
		echo LR\Filters::escapeHtmlText(count($faqData['features']['questions'])) /* line 86 */;
		echo ' otázek</p>
                    <a href="#features" class="btn btn-outline-primary btn-sm">Zobrazit</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Obsah -->
<section class="faq-content py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                
';
		foreach ($faqData as $categoryKey => $category) /* line 100 */ {
			echo '                <div class="faq-section mb-5" id="';
			echo LR\Filters::escapeHtmlAttr($categoryKey) /* line 101 */;
			echo '">
                    <h2 class="faq-section-title text-primary mb-4">
                        <i class="bi bi-';
			echo LR\Filters::escapeHtmlAttr($categoryKey === 'general' ? 'info-circle' : ($categoryKey === 'pricing' ? 'currency-euro' : ($categoryKey === 'technical' ? 'gear' : 'tools'))) /* line 103 */;
			echo ' me-2"></i>
                        ';
			echo LR\Filters::escapeHtmlText($category['title']) /* line 104 */;
			echo '
                    </h2>
                    
                    <div class="accordion" id="faq';
			echo LR\Filters::escapeHtmlAttr(($this->filters->firstUpper)($categoryKey)) /* line 107 */;
			echo '">
';
			foreach ($category['questions'] as $index => $qa) /* line 108 */ {
				echo '                        <div class="accordion-item">
                            <h3 class="accordion-header" id="faq';
				echo LR\Filters::escapeHtmlAttr(($this->filters->firstUpper)($categoryKey)) /* line 110 */;
				echo LR\Filters::escapeHtmlAttr($index) /* line 110 */;
				echo '">
                                <button class="accordion-button';
				if ($index !== 0) /* line 111 */ {
					echo ' collapsed';
				}
				echo '" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapse';
				echo LR\Filters::escapeHtmlAttr(($this->filters->firstUpper)($categoryKey)) /* line 114 */;
				echo LR\Filters::escapeHtmlAttr($index) /* line 114 */;
				echo '"
                                        aria-expanded="';
				if ($index === 0) /* line 115 */ {
					echo 'true';
				} else /* line 115 */ {
					echo 'false';
				}
				echo '">
                                    ';
				echo LR\Filters::escapeHtmlText($qa['question']) /* line 116 */;
				echo '
                                </button>
                            </h3>
                            <div id="collapse';
				echo LR\Filters::escapeHtmlAttr(($this->filters->firstUpper)($categoryKey)) /* line 119 */;
				echo LR\Filters::escapeHtmlAttr($index) /* line 119 */;
				echo '" 
                                 class="accordion-collapse collapse';
				if ($index === 0) /* line 120 */ {
					echo ' show';
				}
				echo '" 
                                 data-bs-parent="#faq';
				echo LR\Filters::escapeHtmlAttr(($this->filters->firstUpper)($categoryKey)) /* line 121 */;
				echo '">
                                <div class="accordion-body">
                                    ';
				echo $qa['answer'] /* line 123 */;
				echo '
                                </div>
                            </div>
                        </div>
';

			}

			echo '                    </div>
                </div>
';

		}

		echo '                
            </div>
        </div>
    </div>
</section>

<!-- Nenašli jste odpověď? -->
<section class="faq-contact py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="contact-card bg-white p-4 p-md-5 rounded-3 shadow text-center">
                    <div class="contact-icon mb-4">
                        <i class="bi bi-question-circle text-primary"></i>
                    </div>
                    <h3 class="text-primary mb-3">Nenašli jste odpověď?</h3>
                    <p class="mb-4">
                        Náš tým je připraven odpovědět na všechny vaše dotazy. 
                        Kontaktujte nás telefonicky, e-mailem nebo přes kontaktní formulář.
                    </p>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="contact-method">
                                <i class="bi bi-telephone-fill text-primary"></i>
                                <h6>Telefon</h6>
                                <p class="small mb-0">
                                    <a href="tel:+420703985390" class="text-decoration-none">+420 703 985 390</a><br>
                                    <small class="text-muted">Po-Pá 8:00-17:00</small>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-method">
                                <i class="bi bi-envelope-fill text-primary"></i>
                                <h6>E-mail</h6>
                                <p class="small mb-0">
                                    <a href="mailto:info@qrdoklad.cz" class="text-decoration-none">info@qrdoklad.cz</a><br>
                                    <small class="text-muted">Odpověď do 24h</small>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="contact-method">
                                <i class="bi bi-chat-dots-fill text-primary"></i>
                                <h6>Online chat</h6>
                                <p class="small mb-0">
                                    V aplikaci<br>
                                    <small class="text-muted">Po-Pá 8:00-17:00</small>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="contact-buttons">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 186 */;
		echo '" class="btn btn-primary btn-lg me-3">
                            <i class="bi bi-envelope me-2"></i>
                            Kontaktní formulář
                        </a>
                        <a href="https://app.qrdoklad.cz" class="btn btn-outline-primary btn-lg" target="_blank" rel="noopener">
                            <i class="bi bi-box-arrow-up-right me-2"></i>
                            Přihlásit se
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
                <h2 class="cta-title">Přesvědčili jsme vás?</h2>
                <p class="cta-subtitle">
                    Vyzkoušejte QRdoklad zdarma po dobu 30 dní a přesvědčte se sami 
                    o kvalitě našeho fakturačního systému.
                </p>
                <div class="cta-buttons">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-light btn-lg me-3" target="_blank" rel="noopener">
                        <i class="bi bi-rocket-takeoff me-2"></i>
                        Začít zdarma
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 216 */;
		echo '" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-gear me-2"></i>
                        Zobrazit funkce
                    </a>
                </div>
                
                <div class="guarantee-info mt-4">
                    <p class="mb-0">
                        <i class="bi bi-shield-check me-2"></i>
                        30 dní zdarma • Bez platební karty • Zrušitelné kdykoli
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.faq-category-card {
    background: white;
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: all 0.3s ease;
    height: 100%;
}

.faq-category-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 30px rgba(177, 210, 53, 0.2);
}

.category-icon {
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

.faq-category-card h5 {
    color: #212529;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.faq-category-card p {
    color: #6c757d;
    margin-bottom: 1.5rem;
}

.faq-section-title {
    font-size: 1.8rem;
    font-weight: 700;
    border-bottom: 3px solid #B1D235;
    padding-bottom: 1rem;
    margin-bottom: 2rem;
}

.contact-card .contact-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, #B1D235, #95B11F);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto;
    color: #212529;
    font-size: 3rem;
}

.contact-method {
    text-align: center;
    padding: 1rem;
}

.contact-method i {
    font-size: 2rem;
    margin-bottom: 1rem;
}

.contact-method h6 {
    color: #212529;
    font-weight: 600;
    margin-bottom: 0.5rem;
}

.contact-buttons {
    margin-top: 2rem;
}

@media (max-width: 768px) {
    .hero-features {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
    
    .contact-buttons .btn {
        width: 100%;
        margin-bottom: 1rem;
    }
    
    .faq-category-card {
        padding: 1.5rem;
    }
    
    .category-icon {
        width: 60px;
        height: 60px;
        font-size: 1.8rem;
    }
}
</style>

';
	}
}
