<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/@layout.latte */
final class Template_7c09b9fe68 extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/@layout.latte';


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
    <title>';
		echo LR\Filters::escapeHtmlText($pageTitle ?? 'QRdoklad - Moderní fakturační systém') /* line 6 */;
		echo '</title>
    <meta name="description" content="';
		echo LR\Filters::escapeHtmlAttr($metaDescription ?? 'QRdoklad - Moderní fakturační systém pro vaše podnikání') /* line 7 */;
		echo '">
    
    <!-- SEO meta tagy -->
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="QRdoklad s.r.o.">
    <meta name="keywords" content="';
		echo LR\Filters::escapeHtmlAttr($metaKeywords ?? 'fakturační systém, QR platby, ARES, fakturace, účetnictví, podnikání, ČR') /* line 12 */;
		echo '">
    <link rel="canonical" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($currentUrl)) /* line 13 */;
		echo '">
    
    <!-- Open Graph -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="';
		echo LR\Filters::escapeHtmlAttr($pageTitle ?? 'QRdoklad - Moderní fakturační systém') /* line 17 */;
		echo '">
    <meta property="og:description" content="';
		echo LR\Filters::escapeHtmlAttr($metaDescription ?? 'Profesionální fakturační systém s QR platbami pro české firmy') /* line 18 */;
		echo '">
    <meta property="og:url" content="';
		echo LR\Filters::escapeHtmlAttr($currentUrl) /* line 19 */;
		echo '">
    <meta property="og:site_name" content="QRdoklad">
    <meta property="og:image" content="';
		echo LR\Filters::escapeHtmlAttr($baseUrl) /* line 21 */;
		echo 'images/og-image.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="QRdoklad - Moderní fakturační systém">
    <meta property="og:locale" content="cs_CZ">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="';
		echo LR\Filters::escapeHtmlAttr($pageTitle ?? 'QRdoklad - Moderní fakturační systém') /* line 29 */;
		echo '">
    <meta name="twitter:description" content="';
		echo LR\Filters::escapeHtmlAttr($metaDescription ?? 'Profesionální fakturační systém s QR platbami pro české firmy') /* line 30 */;
		echo '">
    <meta name="twitter:image" content="';
		echo LR\Filters::escapeHtmlAttr($baseUrl) /* line 31 */;
		echo 'images/og-image.jpg">
    <meta name="twitter:image:alt" content="QRdoklad - Moderní fakturační systém">
    
    <!-- Additional SEO Meta Tags -->
    <meta name="theme-color" content="#B1D235">
    <meta name="msapplication-TileColor" content="#B1D235">
    <meta name="application-name" content="QRdoklad">
    <meta name="apple-mobile-web-app-title" content="QRdoklad">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    
    <!-- Preconnect to external domains -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    
    <!-- DNS Prefetch -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//cdn.jsdelivr.net">
    
    <!-- Structured Data - Organization -->
    <script type="application/ld+json">';
		echo LR\Filters::convertJSToHtmlRawText($organizationSchema) /* line 52 */;
		echo '</script>
    
    <!-- Structured Data - Breadcrumbs -->
    <script type="application/ld+json">';
		echo LR\Filters::convertJSToHtmlRawText($structuredData) /* line 55 */;
		echo '</script>
    
    <!-- Structured Data - Page Specific -->
';
		if (isset($pageSchema)) /* line 58 */ {
			echo '    <script type="application/ld+json">';
			echo LR\Filters::convertJSToHtmlRawText($pageSchema) /* line 59 */;
			echo '</script>
';
		}
		echo '    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vlastní CSS -->
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 70 */;
		echo '/css/landing.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 73 */;
		echo '/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 74 */;
		echo '/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 75 */;
		echo '/favicon-16x16.png">
    <link rel="apple-touch-icon" sizes="180x180" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 76 */;
		echo '/apple-touch-icon.png">
    <link rel="manifest" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 77 */;
		echo '/site.webmanifest">
    
    <!-- Security Headers (můžeš přidat do .htaccess později) -->
    <meta http-equiv="X-Content-Type-Options" content="nosniff">
    <meta http-equiv="X-Frame-Options" content="DENY">
    <meta http-equiv="X-XSS-Protection" content="1; mode=block">
    <meta http-equiv="Referrer-Policy" content="strict-origin-when-cross-origin">
</head>

<body>
    <!-- Skip to main content pro accessibility -->
    <a href="#main-content" class="visually-hidden-focusable">Přeskočit na hlavní obsah</a>
    
    <!-- Navigace -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" role="navigation" aria-label="Hlavní navigace">
        <div class="container">
            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:default')) /* line 93 */;
		echo '" class="navbar-brand" aria-label="QRdoklad - Domovská stránka">
                <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 94 */;
		echo '/images/logo.svg" alt="QRdoklad logo" height="40" width="auto" class="d-inline-block align-text-top">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Otevřít navigační menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:default')) /* line 105 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'default' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 105 */;
		echo ' 
                           ';
		if ($presenter->action === 'default') /* line 106 */ {
			echo 'aria-current="page"';
		}
		echo '>
                            <i class="bi bi-house-fill" aria-hidden="true"></i> Domů
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 111 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'funkce' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 111 */;
		echo '
                           ';
		if ($presenter->action === 'funkce') /* line 112 */ {
			echo 'aria-current="page"';
		}
		echo '>
                            <i class="bi bi-gear-fill" aria-hidden="true"></i> Funkce
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:cenik')) /* line 117 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'cenik' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 117 */;
		echo '
                           ';
		if ($presenter->action === 'cenik') /* line 118 */ {
			echo 'aria-current="page"';
		}
		echo '>
                            <i class="bi bi-currency-euro" aria-hidden="true"></i> Ceník
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 123 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'kontakt' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 123 */;
		echo '
                           ';
		if ($presenter->action === 'kontakt') /* line 124 */ {
			echo 'aria-current="page"';
		}
		echo '>
                            <i class="bi bi-envelope-fill" aria-hidden="true"></i> Kontakt
                        </a>
                    </li>
                </ul>
                
                <div class="navbar-nav">
                    <a href="https://app.qrdoklad.cz" class="btn btn-outline-primary me-2" rel="noopener" target="_blank">
                        Přihlášení
                    </a>
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-primary" rel="noopener" target="_blank">
                        Vyzkoušet zdarma
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hlavní obsah -->
    <main id="main-content" role="main">
';
		$this->renderBlock('content', [], 'html') /* line 144 */;
		echo '    </main>

    <!-- Patička -->
    <footer class="footer bg-dark text-light py-5" role="contentinfo">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="text-primary mb-3">QRdoklad</h5>
                    <p class="mb-3">Moderní fakturační systém pro vaše podnikání. Jednoduché, rychlé a spolehlivé řešení pro všechny velikosti firem.</p>
                    <div class="social-links" role="list" aria-label="Sociální sítě">
                        <a href="#" class="text-light me-3" aria-label="Facebook" rel="noopener" target="_blank">
                            <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="text-light me-3" aria-label="Twitter" rel="noopener" target="_blank">
                            <i class="bi bi-twitter-x" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="text-light me-3" aria-label="LinkedIn" rel="noopener" target="_blank">
                            <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="text-light" aria-label="YouTube" rel="noopener" target="_blank">
                            <i class="bi bi-youtube" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Produkt</h6>
                    <ul class="list-unstyled">
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 173 */;
		echo '" class="text-light-50">Funkce</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:cenik')) /* line 174 */;
		echo '" class="text-light-50">Ceník</a></li>
                        <li><a href="#" class="text-light-50">API dokumentace</a></li>
                        <li><a href="#" class="text-light-50">Changelog</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Podpora</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light-50">Nápověda</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 184 */;
		echo '" class="text-light-50">Kontakt</a></li>
                        <li><a href="#" class="text-light-50">FAQ</a></li>
                        <li><a href="#" class="text-light-50">Status</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Právní</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light-50">Podmínky použití</a></li>
                        <li><a href="#" class="text-light-50">Ochrana soukromí</a></li>
                        <li><a href="#" class="text-light-50">GDPR</a></li>
                    </ul>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Společnost</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light-50">O nás</a></li>
                        <li><a href="#" class="text-light-50">Tým</a></li>
                        <li><a href="#" class="text-light-50">Kariéra</a></li>
                        <li><a href="#" class="text-light-50">Blog</a></li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4 border-secondary">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-light-50">&copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 214 */;
		echo ' QRdoklad. Všechna práva vyhrazena.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 text-light-50">
                        Vyvinuto s <i class="bi bi-heart-fill text-danger" aria-hidden="true"></i> v České republice
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- QRdoklad JS - vše v jednom souboru -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 229 */;
		echo '/js/landing.js"></script>
</body>
</html>';
	}
}
