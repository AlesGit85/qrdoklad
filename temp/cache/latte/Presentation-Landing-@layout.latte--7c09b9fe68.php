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
		if ($this->hasBlock('title')) /* line 6 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('striptags', $ʟ_fi, $s));
			}) /* line 6 */;
			echo ' | ';
		}
		echo 'QRdoklad - Moderní fakturační systém</title>
    <meta name="description" content="';
		echo LR\Filters::escapeHtmlAttr($metaDescription ?? 'QRdoklad - Moderní fakturační systém pro vaše podnikání') /* line 7 */;
		echo '">
    
    <!-- SEO meta tagy -->
    <meta name="robots" content="index, follow">
    <meta name="author" content="QRdoklad s.r.o.">
    <meta name="keywords" content="fakturační systém, QR platby, ARES, fakturace, účetnictví, podnikání, ČR">
    <link rel="canonical" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link('//this')) /* line 13 */;
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
		echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link('//this')) /* line 19 */;
		echo '">
    <meta property="og:site_name" content="QRdoklad">
    <meta property="og:image" content="';
		echo LR\Filters::escapeHtmlAttr($basePath) /* line 21 */;
		echo '/images/og-image.jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="cs_CZ">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="';
		echo LR\Filters::escapeHtmlAttr($pageTitle ?? 'QRdoklad - Moderní fakturační systém') /* line 28 */;
		echo '">
    <meta name="twitter:description" content="';
		echo LR\Filters::escapeHtmlAttr($metaDescription ?? 'Profesionální fakturační systém s QR platbami pro české firmy') /* line 29 */;
		echo '">
    <meta name="twitter:image" content="';
		echo LR\Filters::escapeHtmlAttr($basePath) /* line 30 */;
		echo '/images/og-image.jpg">
    
    <!-- Structured Data -->
    <script type="application/ld+json">';
		echo LR\Filters::convertJSToHtmlRawText($structuredData) /* line 33 */;
		echo '</script>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vlastní CSS -->
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 43 */;
		echo '/css/landing.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 46 */;
		echo '/favicon.ico">
    <link rel="apple-touch-icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 47 */;
		echo '/apple-touch-icon.png">
</head>

<body>
    <!-- Navigace -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:default')) /* line 54 */;
		echo '" class="navbar-brand">
                <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 55 */;
		echo '/images/logo.svg" alt="QRdoklad" height="40" class="d-inline-block align-text-top">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:default')) /* line 65 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'default' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 65 */;
		echo '>
                            <i class="bi bi-house-fill"></i> Domů
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 70 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'funkce' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 70 */;
		echo '>
                            <i class="bi bi-gear-fill"></i> Funkce
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:cenik')) /* line 75 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'cenik' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 75 */;
		echo '>
                            <i class="bi bi-currency-euro"></i> Ceník
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 80 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'kontakt' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 80 */;
		echo '>
                            <i class="bi bi-envelope-fill"></i> Kontakt
                        </a>
                    </li>
                </ul>
                
                <div class="navbar-nav">
                    <a href="https://app.qrdoklad.cz" class="btn btn-outline-primary me-2">Přihlášení</a>
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-primary">Vyzkoušet zdarma</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hlavní obsah -->
    <main>
';
		$this->renderBlock('content', [], 'html') /* line 96 */;
		echo '    </main>

    <!-- Patička -->
    <footer class="footer bg-dark text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="text-primary mb-3">QRdoklad</h5>
                    <p class="mb-3">Moderní fakturační systém pro vaše podnikání. Jednoduché, rychlé a spolehlivé řešení pro všechny velikosti firem.</p>
                    <div class="social-links">
                        <a href="#" class="text-light me-3"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-light me-3"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-light me-3"><i class="bi bi-linkedin"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Produkt</h6>
                    <ul class="list-unstyled">
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 117 */;
		echo '" class="text-light-50">Funkce</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:cenik')) /* line 118 */;
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
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 128 */;
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
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 158 */;
		echo ' QRdoklad. Všechna práva vyhrazena.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0 text-light-50">
                        Vyvinuto s <i class="bi bi-heart-fill text-danger"></i> v České republice
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- QRdoklad JS - vše v jednom souboru -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 173 */;
		echo '/js/landing.js"></script>
</body>
</html>';
	}
}
