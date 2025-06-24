<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/faq.latte */
final class Template_8ee902cb3d extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/faq.latte';

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

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['categoryKey' => '92', 'category' => '92', 'questionKey' => '100', 'question' => '100'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		$this->parentName = '../@layout.latte';
		return get_defined_vars();
	}


	/** {block title} on line 3 */
	public function blockTitle(array $ʟ_args): void
	{
		echo 'FAQ - Často kladené otázky | QRdoklad';
	}


	/** {block content} on line 5 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!-- Hero sekce -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Často kladené <span class="text-primary">otázky</span>
                </h1>
                <p class="hero-subtitle">
                    Najděte rychlé odpovědi na nejčastější dotazy o QRdokladu. 
                    Pokud nenajdete odpověď na svou otázku, neváhejte nás kontaktovat.
                </p>
                
                <!-- Rychlé kontakty -->
                <div class="row g-3 justify-content-center mt-4">
                    <div class="col-auto">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 22 */;
		echo '" class="btn btn-primary btn-lg">
                            <i class="bi bi-envelope me-2"></i>
                            Kontaktovat podporu
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:help')) /* line 28 */;
		echo '" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-book me-2"></i>
                            Nápověda
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- FAQ kategorie přehled -->
        <div class="row mt-5 g-4">
            <div class="col-lg-4 col-md-6">
                <div class="faq-category-card">
                    <div class="category-icon">
                        <i class="bi bi-question-circle"></i>
                    </div>
                    <h5>Obecné otázky</h5>
                    <p>Základní informace o QRdokladu a jeho funkcích</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="faq-category-card">
                    <div class="category-icon">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <h5>Platby a účetnictví</h5>
                    <p>Vše o fakturaci, platbách a účetních postupech</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="faq-category-card">
                    <div class="category-icon">
                        <i class="bi bi-gear"></i>
                    </div>
                    <h5>Technická podpora</h5>
                    <p>Řešení technických problémů a nastavení</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ obsah -->
<section class="faq-content-section py-5">
    <div class="container">
        <!-- Úvod k FAQ -->
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title">Máte otázky? Máme odpovědi!</h2>
                <p class="section-subtitle">
                    Naše FAQ pokrývá nejčastější dotazy zákazníků. 
                    Odpovídáme během 24 hodin.
                </p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 85 */;
		echo '" class="btn btn-primary btn-lg">
                    <i class="bi bi-envelope me-2"></i>
                    Kontaktovat podporu
                </a>
            </div>
        </div>

';
		foreach ($faqData as $categoryKey => $category) /* line 92 */ {
			echo '        <!-- Kategorie FAQ -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="faq-category">
                    <h2 class="section-title text-center mb-5">';
			echo LR\Filters::escapeHtmlText($category['title']) /* line 97 */;
			echo '</h2>
                    
                    <div class="accordion faq-accordion" id="accordion-';
			echo LR\Filters::escapeHtmlAttr($categoryKey) /* line 99 */;
			echo '">
';
			foreach ($category['questions'] as $questionKey => $question) /* line 100 */ {
				echo '                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button ';
				if ($questionKey != 0) /* line 103 */ {
					echo 'collapsed';
				}
				echo '" 
                                        type="button" 
                                        data-bs-toggle="collapse" 
                                        data-bs-target="#collapse-';
				echo LR\Filters::escapeHtmlAttr($categoryKey) /* line 106 */;
				echo '-';
				echo LR\Filters::escapeHtmlAttr($questionKey) /* line 106 */;
				echo '"
                                        aria-expanded="';
				if ($questionKey == 0) /* line 107 */ {
					echo 'true';
				} else /* line 107 */ {
					echo 'false';
				}
				echo '" 
                                        aria-controls="collapse-';
				echo LR\Filters::escapeHtmlAttr($categoryKey) /* line 108 */;
				echo '-';
				echo LR\Filters::escapeHtmlAttr($questionKey) /* line 108 */;
				echo '">
                                    <i class="bi bi-question-circle me-3 text-primary"></i>
                                    ';
				echo LR\Filters::escapeHtmlText($question['question']) /* line 110 */;
				echo '
                                </button>
                            </h3>
                            <div id="collapse-';
				echo LR\Filters::escapeHtmlAttr($categoryKey) /* line 113 */;
				echo '-';
				echo LR\Filters::escapeHtmlAttr($questionKey) /* line 113 */;
				echo '" 
                                 class="accordion-collapse collapse ';
				if ($questionKey == 0) /* line 114 */ {
					echo 'show';
				}
				echo '" 
                                 data-bs-parent="#accordion-';
				echo LR\Filters::escapeHtmlAttr($categoryKey) /* line 115 */;
				echo '">
                                <div class="accordion-body">
                                    <div class="faq-answer">
                                        <p>';
				echo LR\Filters::escapeHtmlText($question['answer']) /* line 118 */;
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
                                <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:help')) /* line 142 */;
		echo '" class="btn btn-outline-primary">
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
                    <p>Pomoc s technickými problémy a nastavením systému.</p>
                    <div class="contact-method">
                        <i class="bi bi-envelope"></i>
                        <h6>E-mail</h6>
                        <a href="mailto:podpora@qrdoklad.cz">podpora@qrdoklad.cz</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-credit-card"></i>
                    </div>
                    <h5>Účetnictví</h5>
                    <p>Dotazy ohledně fakturace a účetních postupů.</p>
                    <div class="contact-method">
                        <i class="bi bi-telephone"></i>
                        <h6>Telefon</h6>
                        <a href="tel:+420703985390">+420 703 985 390</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-cart"></i>
                    </div>
                    <h5>Obchod</h5>
                    <p>Informace o cenách, balíčcích a fakturaci.</p>
                    <div class="contact-method">
                        <i class="bi bi-envelope"></i>
                        <h6>E-mail</h6>
                        <a href="mailto:obchod@qrdoklad.cz">obchod@qrdoklad.cz</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <h5>Obecné dotazy</h5>
                    <p>Ostatní dotazy a informace o QRdokladu.</p>
                    <div class="contact-method">
                        <i class="bi bi-envelope"></i>
                        <h6>E-mail</h6>
                        <a href="mailto:info@qrdoklad.cz">info@qrdoklad.cz</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- FAQ rychlé otázky -->
        <div class="row mt-5">
            <div class="col-lg-10 mx-auto">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="faq-item">
                            <div class="faq-icon">
                                <i class="bi bi-clock"></i>
                            </div>
                            <h5>Jak rychle dostanu odpověď?</h5>
                            <p>Na e-maily odpovídáme do 24 hodin, telefonicky jsme k dispozici okamžitě v pracovní době.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="faq-item">
                            <div class="faq-icon">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <h5>Můžu si domluvit osobní schůzku?</h5>
                            <p>Ano, osobní schůzky jsou možné po předchozí domluvě v našich pražských kancelářích.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="faq-item">
                            <div class="faq-icon">
                                <i class="bi bi-headset"></i>
                            </div>
                            <h5>Jaká je dostupnost podpory?</h5>
                            <p>Základní podpora je dostupná Po-Pá 8:00-17:00. Business zákazníci mají prioritní podporu.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="faq-item">
                            <div class="faq-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h5>Jsou moje údaje v bezpečí?</h5>
                            <p>Ano, všechny údaje jsou chráněny SSL šifrováním a zpracovávány v souladu s GDPR.</p>
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
                <h2 class="cta-title">Neváhejte nás kontaktovat</h2>
                <p class="cta-subtitle">
                    Jsme tu pro vás a rádi odpovíme na všechny vaše otázky. 
                    Nebo si rovnou vyzkoušejte QRdoklad zdarma.
                </p>
                <div class="cta-buttons">
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 314 */;
		echo '" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-envelope me-2"></i>
                        Kontaktovat nás
                    </a>
                    <a href="#" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-play-circle me-2"></i>
                        Vyzkoušet zdarma
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
';
	}
}
