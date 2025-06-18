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
			foreach (array_intersect_key(['categoryKey' => '81', 'category' => '81', 'questionKey' => '89', 'question' => '89'], $this->params) as $ʟ_v => $ʟ_l) {
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
<!-- Hero sekce -->
<section class="hero-section d-flex align-items-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title text-white mb-4">
                    Často kladené otázky
                </h1>
                <p class="hero-subtitle text-light mb-4">
                    Najděte rychlé odpovědi na nejčastější dotazy o QRdokladu.
                    Pokud nenajdete odpověď na svou otázku, rádi vám pomůžeme.
                </p>
                <div class="hero-stats row g-4 justify-content-center">
                    <div class="col-auto">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-chat-dots"></i>
                            </div>
                            <div class="stat-text">
                                <span class="stat-number">24h</span>
                                <span class="stat-label">Odpověď na dotaz</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="stat-item">
                            <div class="stat-icon">
                                <i class="bi bi-book"></i>
                            </div>
                            <div class="stat-text">
                                <span class="stat-number">50+</span>
                                <span class="stat-label">Článků nápovědy</span>
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
                                <span class="stat-label">Spokojených uživatelů</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ sekce -->
<section class="faq-section py-5">
    <div class="container">
        <!-- Rychlé akce -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="quick-actions-card">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-8">
                            <h3 class="text-primary mb-2">Nenašli jste odpověď?</h3>
                            <p class="mb-0">
                                Naš tým podpory je připraven vám pomoci s jakýmkoli dotazem nebo problémem.
                                Odpovídáme během 24 hodin.
                            </p>
                        </div>
                        <div class="col-lg-4 text-lg-end">
                            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 71 */;
		echo '" class="btn btn-primary btn-lg">
                                <i class="bi bi-envelope me-2"></i>
                                Kontaktovat podporu
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

';
		foreach ($faqData as $categoryKey => $category) /* line 81 */ {
			echo '        <!-- Kategorie FAQ -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="faq-category">
                    <h2 class="section-title text-center mb-5">';
			echo LR\Filters::escapeHtmlText($category . 'title') /* line 86 */;
			echo '</h2>
                    
                    <div class="accordion faq-accordion" id="accordion-';
			echo LR\Filters::escapeHtmlAttr($categoryKey) /* line 88 */;
			echo '">
';
			foreach ($category . 'questions' as $questionKey => $question) /* line 89 */ {
				echo '                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button ';
				if (!$questionKey) /* line 92 */ {
					echo 'collapsed';
				}
				echo '" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapse-';
				echo LR\Filters::escapeHtmlAttr($categoryKey) /* line 95 */;
				echo '-';
				echo LR\Filters::escapeHtmlAttr($questionKey) /* line 95 */;
				echo '"
                                        aria-expanded="';
				if (!$questionKey) /* line 96 */ {
					echo 'true';
				} else /* line 96 */ {
					echo 'false';
				}
				echo '" 
                                        aria-controls="collapse-';
				echo LR\Filters::escapeHtmlAttr($categoryKey) /* line 97 */;
				echo '-';
				echo LR\Filters::escapeHtmlAttr($questionKey) /* line 97 */;
				echo '">
                                    <i class="bi bi-question-circle me-3 text-primary"></i>
                                    ';
				echo LR\Filters::escapeHtmlText($question . 'question') /* line 99 */;
				echo '
                                </button>
                            </h3>
                            <div id="collapse-';
				echo LR\Filters::escapeHtmlAttr($categoryKey) /* line 102 */;
				echo '-';
				echo LR\Filters::escapeHtmlAttr($questionKey) /* line 102 */;
				echo '" 
                                 class="accordion-collapse collapse ';
				if (!$questionKey) /* line 103 */ {
					echo 'show';
				}
				echo '" 
                                 data-bs-parent="#accordion-';
				echo LR\Filters::escapeHtmlAttr($categoryKey) /* line 104 */;
				echo '">
                                <div class="accordion-body">
                                    <div class="faq-answer">
                                        <p>';
				echo LR\Filters::escapeHtmlText($question . 'answer') /* line 107 */;
				echo '</p>
                                    </div>
                                </div>
                            </div>
                        </div>
';

			}

			echo '                    </div>
                </div>
            </div>
        </div>
';

		}

		echo '
        <!-- Další pomoc sekce -->
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="help-section">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="help-card text-center">
                                <div class="help-icon">
                                    <i class="bi bi-book"></i>
                                </div>
                                <h5>Dokumentace</h5>
                                <p>Kompletní návody a příručky pro všechny funkce QRdokladu.</p>
                                <a href="#" class="btn btn-outline-primary">
                                    Přejít na dokumentaci
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="help-card text-center">
                                <div class="help-icon">
                                    <i class="bi bi-play-circle"></i>
                                </div>
                                <h5>Video návody</h5>
                                <p>Krok za krokem videa, které vás provedou všemi funkcemi.</p>
                                <a href="#" class="btn btn-outline-primary">
                                    Sledovat videa
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="help-card text-center">
                                <div class="help-icon">
                                    <i class="bi bi-people"></i>
                                </div>
                                <h5>Komunita</h5>
                                <p>Připojte se k ostatním uživatelům a sdílejte zkušenosti.</p>
                                <a href="#" class="btn btn-outline-primary">
                                    Vstoupit do komunity
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontakt FAQ sekce -->
<section class="contact-faq-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title mb-4">Rychlé kontakty</h2>
                <p class="section-subtitle mb-5">
                    Pro specifické dotazy nás kontaktujte přímo
                </p>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-headset"></i>
                    </div>
                    <h5>Technická podpora</h5>
                    <p>Pomoc s technickými problémy a nastavením systému</p>
                    <a href="mailto:podpora@qrdoklad.cz" class="contact-link">
                        podpora@qrdoklad.cz
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-currency-euro"></i>
                    </div>
                    <h5>Obchodní dotazy</h5>
                    <p>Ceny, balíčky a obchodní podmínky</p>
                    <a href="mailto:obchod@qrdoklad.cz" class="contact-link">
                        obchod@qrdoklad.cz
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5>Právní záležitosti</h5>
                    <p>GDPR, ochrana dat a právní dotazy</p>
                    <a href="mailto:pravni@qrdoklad.cz" class="contact-link">
                        pravni@qrdoklad.cz
                    </a>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-telephone"></i>
                    </div>
                    <h5>Telefon</h5>
                    <p>Přímá telefonní podpora v pracovní dny</p>
                    <a href="tel:+420703985390" class="contact-link">
                        +420 703 985 390
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

';
		$this->createTemplate('../@global/cta-section.latte', $this->params, 'include')->renderToContentType('html') /* line 237 */;
		echo "\n";
	}
}
