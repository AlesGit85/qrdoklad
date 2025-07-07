<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation/@layout.latte */
final class Template_ab4446634a extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation/@layout.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		echo '<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- SEO Meta tagy -->
    <title>';
		if ($this->hasBlock('pageTitle')) /* line 8 */ {
			echo LR\Filters::escapeHtmlText($pageTitle) /* line 8 */;
		} else /* line 8 */ {
			echo 'QRdoklad - Moderní fakturační systém s QR platbami';
		}
		echo '</title>
    <meta name="description" content="';
		if ($this->hasBlock('metaDescription')) /* line 9 */ {
			echo LR\Filters::escapeHtmlAttr($metaDescription) /* line 9 */;
		} else /* line 9 */ {
			echo 'Profesionální fakturační systém s QR platbami, automatickým ARES vyhledáváním a pokročilými funkcemi pro české firmy. Registrace zdarma!';
		}
		echo '">
    <meta name="keywords" content="';
		if ($this->hasBlock('metaKeywords')) /* line 10 */ {
			echo LR\Filters::escapeHtmlAttr($metaKeywords) /* line 10 */;
		} else /* line 10 */ {
			echo 'fakturační systém, QR platby, ARES, fakturace, účetnictví, podnikání, Česká republika';
		}
		echo '">
    <meta name="robots" content="index, follow">
    <meta name="author" content="QRdoklad - Aleš Zita">
    
    <!-- Open Graph -->
    <meta property="og:title" content="';
		if ($this->hasBlock('pageTitle')) /* line 15 */ {
			echo LR\Filters::escapeHtmlAttr($pageTitle) /* line 15 */;
		} else /* line 15 */ {
			echo 'QRdoklad - Moderní fakturační systém';
		}
		echo '">
    <meta property="og:description" content="';
		if ($this->hasBlock('metaDescription')) /* line 16 */ {
			echo LR\Filters::escapeHtmlAttr($metaDescription) /* line 16 */;
		} else /* line 16 */ {
			echo 'Profesionální fakturační systém s QR platbami pro české firmy';
		}
		echo '">
    <meta property="og:type" content="website">
    <meta property="og:url" content="';
		echo LR\Filters::escapeHtmlAttr($currentUrl) /* line 18 */;
		echo '">
    <meta property="og:image" content="';
		echo LR\Filters::escapeHtmlAttr($baseUrl) /* line 19 */;
		echo '/images/og-image.jpg">
    <meta property="og:locale" content="cs_CZ">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="';
		if ($this->hasBlock('pageTitle')) /* line 24 */ {
			echo LR\Filters::escapeHtmlAttr($pageTitle) /* line 24 */;
		} else /* line 24 */ {
			echo 'QRdoklad - Moderní fakturační systém';
		}
		echo '">
    <meta name="twitter:description" content="';
		if ($this->hasBlock('metaDescription')) /* line 25 */ {
			echo LR\Filters::escapeHtmlAttr($metaDescription) /* line 25 */;
		} else /* line 25 */ {
			echo 'Profesionální fakturační systém s QR platbami';
		}
		echo '">
    <meta name="twitter:image" content="';
		echo LR\Filters::escapeHtmlAttr($baseUrl) /* line 26 */;
		echo '/images/og-image.jpg">
    
    <!-- Favicon -->
    <link rel="icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 29 */;
		echo '/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 30 */;
		echo '/images/apple-touch-icon.png">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($currentUrl)) /* line 33 */;
		echo '">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Vlastní CSS -->
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 42 */;
		echo '/css/landing.css">
    
    <!-- Structured Data -->
';
		if ($this->hasBlock('structuredData')) /* line 45 */ {
			echo '        <script type="application/ld+json">';
			echo LR\Filters::convertJSToHtmlRawText($structuredData) /* line 46 */;
			echo '</script>
';
		}
		echo '    
';
		if ($this->hasBlock('organizationSchema')) /* line 49 */ {
			echo '        <script type="application/ld+json">';
			echo LR\Filters::convertJSToHtmlRawText($organizationSchema) /* line 50 */;
			echo '</script>
';
		}
		echo '    
';
		if ($this->hasBlock('pageSchema')) /* line 53 */ {
			echo '        <script type="application/ld+json">';
			echo LR\Filters::convertJSToHtmlRawText($pageSchema) /* line 54 */;
			echo '</script>
';
		}
		echo '</head>

<body>
    <!-- Navigace -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:default')) /* line 62 */;
		echo '" class="navbar-brand">
                <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 63 */;
		echo '/images/logo.svg" alt="QRdoklad" height="30">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:default')) /* line 73 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'default' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 73 */;
		echo '>
                            <i class="bi bi-house-fill"></i> Domů
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 78 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'funkce' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 78 */;
		echo '>
                            <i class="bi bi-gear-fill"></i> Funkce
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:cenik')) /* line 83 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'cenik' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 83 */;
		echo '>
                            <i class="bi bi-currency-dollar"></i> Ceník
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 88 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'kontakt' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 88 */;
		echo '>
                            <i class="bi bi-envelope-fill"></i> Kontakt
                        </a>
                    </li>
                </ul>
                
                <div class="navbar-nav">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-primary me-2">
                        <i class="bi bi-rocket"></i> Registrace
                    </a>
                    <a href="https://app.qrdoklad.cz/sign/in" class="btn btn-outline-light">
                        <i class="bi bi-box-arrow-in-right"></i> Přihlášení
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hlavní obsah -->
    <main>
';
		$this->renderBlock('content', [], 'html') /* line 108 */;
		echo '    </main>

    <!-- Footer -->
    <footer class="footer bg-dark text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="footer-brand mb-4">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 117 */;
		echo '/images/logo.svg" alt="QRdoklad" height="40" class="mb-3">
                        <p class="text-light-50">
                            Moderní fakturační systém s QR platbami pro české podnikatele. 
                            Základní funkce navždy zdarma.
                        </p>
                    </div>
                    
                    <div class="footer-social">
                        <a href="#" class="social-link me-3" title="Facebook">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="social-link me-3" title="Twitter">
                            <i class="bi bi-twitter"></i>
                        </a>
                        <a href="#" class="social-link me-3" title="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="#" class="social-link" title="YouTube">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Produkt -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Produkt</h6>
                    <ul class="list-unstyled">
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 144 */;
		echo '" class="text-light-50">Funkce</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:cenik')) /* line 145 */;
		echo '" class="text-light-50">Ceník</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:changelog')) /* line 146 */;
		echo '" class="text-light-50">Changelog</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:api')) /* line 147 */;
		echo '" class="text-light-50">API dokumentace</a></li>
                    </ul>
                </div>
                
                <!-- Podpora -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Podpora</h6>
                    <ul class="list-unstyled">
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:docs')) /* line 155 */;
		echo '" class="text-light-50">Dokumentace</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:help')) /* line 156 */;
		echo '" class="text-light-50">Nápověda</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:faq')) /* line 157 */;
		echo '" class="text-light-50">FAQ</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:status')) /* line 158 */;
		echo '" class="text-light-50">Status</a></li>
                    </ul>
                </div>
                
                <!-- Právní -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Právní</h6>
                    <ul class="list-unstyled">
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:terms')) /* line 166 */;
		echo '" class="text-light-50">Obchodní podmínky</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:privacy')) /* line 167 */;
		echo '" class="text-light-50">Ochrana osobních údajů</a></li>
                    </ul>
                </div>
                
                <!-- Společnost -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Společnost</h6>
                    <ul class="list-unstyled">
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:about')) /* line 175 */;
		echo '" class="text-light-50">O QRdokladu</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:blog')) /* line 176 */;
		echo '" class="text-light-50">Blog</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 177 */;
		echo '" class="text-light-50">Kontakt</a></li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4 border-secondary">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-light-50">&copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 186 */;
		echo ' QRdoklad. Všechna práva vyhrazena.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 text-light-50">
                        Vyvinuto s <i class="bi bi-heart-fill text-danger"></i> v České republice od <a href="https://allimedia.cz" target="_blank" class="text-light-50">Allimedia.cz</a>.
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- QRdoklad JS - vyčištěná modulární struktura -->
    <!-- 📝 POZNÁMKA: Načítáme pouze existující soubory v správném pořadí -->
    
    <!-- 1. UI efekty (scroll animace, navbar, smooth scrolling, lightbox) -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 204 */;
		echo '/js/ui-effects.js"></script>
    
    <!-- 2. Pricing funkce (toggle, kalkulačka) -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 207 */;
		echo '/js/pricing.js"></script>
    
    <!-- 3. Formulářové funkce (kontakt, validace) -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 210 */;
		echo '/js/form-handler.js"></script>
    
    <!-- 4. Nakonec hlavní inicializační soubor -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 213 */;
		echo '/js/landing.js"></script>
    
    <!-- 5. Dokumentace JS (jen pro docs stránky) -->
';
		if ($presenter->action === 'docs') /* line 216 */ {
			echo '        <script src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 217 */;
			echo '/js/docs.js"></script>
';
		}
		echo '
    <!-- Scroll to Top tlačítko -->
    <button id="scrollToTop" class="scroll-to-top" aria-label="Scroll to top" title="Zpět nahoru">
        <i class="bi bi-arrow-up"></i>
    </button>
    
</body>
</html>';
	}
}
