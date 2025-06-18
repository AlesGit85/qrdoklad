<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/blog.latte */
final class Template_df0c1384cf extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/blog.latte';

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
                    QRdoklad Blog
                </h1>
                <p class="hero-subtitle text-light mb-4">
                    Novinky ze světa fakturace, podnikání a digitalizace. 
                    Tipy, triky a nejlepší praktiky pro vaše podnikání.
                </p>
                <div class="hero-badges">
                    <span class="badge bg-primary me-2">
                        <i class="bi bi-calendar-week me-1"></i>
                        Nové články každý týden
                    </span>
                    <span class="badge bg-primary me-2">
                        <i class="bi bi-bookmark me-1"></i>
                        Praktické rady
                    </span>
                    <span class="badge bg-primary">
                        <i class="bi bi-graph-up me-1"></i>
                        Trendy v podnikání
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Připravujeme obsah -->
<section class="coming-soon-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <div class="coming-soon-content">
                    <div class="coming-soon-icon mb-4">
                        <i class="bi bi-journal-text text-primary" style="font-size: 5rem; opacity: 0.3;"></i>
                    </div>
                    
                    <h2 class="text-primary mb-4">Blog se připravuje</h2>
                    <p class="text-muted mb-4 fs-5">
                        Pracujeme na užitečných článcích a praktických radách pro vaše podnikání. 
                        Blog bude brzy spuštěn s obsahem, který vám skutečně pomůže.
                    </p>
                    
                    <div class="planned-content mb-5">
                        <h4 class="mb-4">Co pro vás připravujeme:</h4>
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="content-preview p-4 border rounded bg-light">
                                    <i class="bi bi-lightbulb text-primary mb-3" style="font-size: 2rem;"></i>
                                    <h6>Tipy pro efektivní fakturaci</h6>
                                    <p class="small text-muted mb-0">
                                        Jak optimalizovat proces fakturace a urychlit příjem plateb
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="content-preview p-4 border rounded bg-light">
                                    <i class="bi bi-graph-up text-primary mb-3" style="font-size: 2rem;"></i>
                                    <h6>Trendy v podnikání</h6>
                                    <p class="small text-muted mb-0">
                                        Aktuální trendy a novinky ze světa podnikání a technologií
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="content-preview p-4 border rounded bg-light">
                                    <i class="bi bi-shield-check text-primary mb-3" style="font-size: 2rem;"></i>
                                    <h6>Právní rady</h6>
                                    <p class="small text-muted mb-0">
                                        GDPR, účetnictví a další právní aspekty podnikání
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="content-preview p-4 border rounded bg-light">
                                    <i class="bi bi-cpu text-primary mb-3" style="font-size: 2rem;"></i>
                                    <h6>Digitalizace firmy</h6>
                                    <p class="small text-muted mb-0">
                                        Jak využít technologie pro růst vašeho podnikání
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Newsletter signup -->
                    <div class="newsletter-signup p-4 bg-primary bg-opacity-10 rounded">
                        <h5 class="text-primary mb-3">Buďte první, kdo se dozví o novém obsahu</h5>
                        <p class="text-muted mb-4">
                            Přihlaste se k odběru newsletteru a dostávejte novinky přímo do e-mailu
                        </p>
                        
                        <div class="newsletter-form">
                            <div class="row g-3 justify-content-center">
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Váš e-mail">
                                </div>
                                <div class="col-auto">
                                    <button class="btn btn-primary">
                                        <i class="bi bi-envelope me-2"></i>
                                        Přihlásit se
                                    </button>
                                </div>
                            </div>
                            <p class="small text-muted mt-3 mb-0">
                                Žádný spam, pouze užitečný obsah. Odhlásit se můžete kdykoli.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mezitím se můžete podívat -->
<section class="alternative-content-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h3 class="mb-4">Mezitím se můžete podívat na:</h3>
                
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="alternative-card text-center p-4 bg-white rounded h-100">
                            <i class="bi bi-question-circle text-primary mb-3" style="font-size: 2.5rem;"></i>
                            <h6>FAQ</h6>
                            <p class="text-muted mb-3">Odpovědi na nejčastější otázky o QRdokladu</p>
                            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:faq')) /* line 138 */;
		echo '" class="btn btn-outline-primary">
                                Procházet FAQ
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="alternative-card text-center p-4 bg-white rounded h-100">
                            <i class="bi bi-book text-primary mb-3" style="font-size: 2.5rem;"></i>
                            <h6>Nápověda</h6>
                            <p class="text-muted mb-3">Kompletní dokumentace a návody</p>
                            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:help')) /* line 149 */;
		echo '" class="btn btn-outline-primary">
                                Otevřít nápovědu
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="alternative-card text-center p-4 bg-white rounded h-100">
                            <i class="bi bi-chat-dots text-primary mb-3" style="font-size: 2.5rem;"></i>
                            <h6>Kontakt</h6>
                            <p class="text-muted mb-3">Máte otázky? Napište nám</p>
                            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 160 */;
		echo '" class="btn btn-outline-primary">
                                Kontaktovat nás
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sociální sítě -->
<section class="social-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto text-center">
                <h4 class="mb-4">Sledujte nás na sociálních sítích</h4>
                <p class="text-muted mb-4">
                    Pro rychlé tipy a aktualizace sledujte naše sociální sítě
                </p>
                
                <div class="social-buttons d-flex justify-content-center gap-3">
                    <a href="#" class="btn btn-outline-primary" title="Připravujeme">
                        <i class="bi bi-facebook me-2"></i>
                        Facebook
                    </a>
                    <a href="#" class="btn btn-outline-primary" title="Připravujeme">
                        <i class="bi bi-twitter-x me-2"></i>
                        Twitter
                    </a>
                    <a href="#" class="btn btn-outline-primary" title="Připravujeme">
                        <i class="bi bi-linkedin me-2"></i>
                        LinkedIn
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

';
		$this->createTemplate('../@global/cta-section.latte', $this->params, 'include')->renderToContentType('html') /* line 200 */;
		echo "\n";
	}
}
