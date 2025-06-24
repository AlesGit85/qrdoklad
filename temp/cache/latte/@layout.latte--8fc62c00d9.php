<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/../@layout.latte */
final class Template_8fc62c00d9 extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/../@layout.latte';


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
    
    <!-- SEO Meta -->
    <title>';
		if (isset($pageTitle)) /* line 8 */ {
			echo LR\Filters::escapeHtmlText($pageTitle) /* line 8 */;
		} else /* line 8 */ {
			echo 'QRdoklad - Moderní fakturační systém';
		}
		echo '</title>
    <meta name="description" content="';
		if (isset($metaDescription)) /* line 9 */ {
			echo LR\Filters::escapeHtmlAttr($metaDescription) /* line 9 */;
		} else /* line 9 */ {
			echo 'Profesionální fakturační systém s QR platbami pro české firmy. Zkuste 30 dní zdarma!';
		}
		echo '">
    <meta name="keywords" content="';
		if (isset($metaKeywords)) /* line 10 */ {
			echo LR\Filters::escapeHtmlAttr($metaKeywords) /* line 10 */;
		} else /* line 10 */ {
			echo 'fakturační systém, QR platby, ARES, fakturace, účetnictví';
		}
		echo '">
    <meta name="robots" content="index, follow">
    <meta name="author" content="QRdoklad">
    
    <!-- Open Graph Meta -->
    <meta property="og:title" content="';
		if (isset($pageTitle)) /* line 15 */ {
			echo LR\Filters::escapeHtmlAttr($pageTitle) /* line 15 */;
		} else /* line 15 */ {
			echo 'QRdoklad - Moderní fakturační systém';
		}
		echo '">
    <meta property="og:description" content="';
		if (isset($metaDescription)) /* line 16 */ {
			echo LR\Filters::escapeHtmlAttr($metaDescription) /* line 16 */;
		} else /* line 16 */ {
			echo 'Profesionální fakturační systém s QR platbami pro české firmy. Zkuste 30 dní zdarma!';
		}
		echo '">
    <meta property="og:type" content="website">
    <meta property="og:url" content="';
		echo LR\Filters::escapeHtmlAttr($currentUrl) /* line 18 */;
		echo '">
    <meta property="og:image" content="';
		echo LR\Filters::escapeHtmlAttr($baseUrl) /* line 19 */;
		echo 'images/og-image.jpg">
    <meta property="og:locale" content="cs_CZ">
    <meta property="og:site_name" content="QRdoklad">
    
    <!-- Twitter Meta -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="';
		if (isset($pageTitle)) /* line 25 */ {
			echo LR\Filters::escapeHtmlAttr($pageTitle) /* line 25 */;
		} else /* line 25 */ {
			echo 'QRdoklad - Moderní fakturační systém';
		}
		echo '">
    <meta name="twitter:description" content="';
		if (isset($metaDescription)) /* line 26 */ {
			echo LR\Filters::escapeHtmlAttr($metaDescription) /* line 26 */;
		} else /* line 26 */ {
			echo 'Profesionální fakturační systém s QR platbami pro české firmy. Zkuste 30 dní zdarma!';
		}
		echo '">
    <meta name="twitter:image" content="';
		echo LR\Filters::escapeHtmlAttr($baseUrl) /* line 27 */;
		echo 'images/og-image.jpg">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($currentUrl)) /* line 30 */;
		echo '">
    
    <!-- Strukturovaná data - Organization -->
';
		if (isset($organizationSchema)) /* line 33 */ {
			echo '    <script type="application/ld+json">';
			echo LR\Filters::convertJSToHtmlRawText($organizationSchema) /* line 34 */;
			echo '</script>
';
		}
		echo '    
    <!-- Strukturovaná data - Breadcrumbs -->
';
		if (isset($structuredData)) /* line 38 */ {
			echo '    <script type="application/ld+json">';
			echo LR\Filters::convertJSToHtmlRawText($structuredData) /* line 39 */;
			echo '</script>
';
		}
		echo '    
    <!-- Strukturovaná data - Page Specific -->
';
		if (isset($pageSchema)) /* line 43 */ {
			echo '    <script type="application/ld+json">';
			echo LR\Filters::convertJSToHtmlRawText($pageSchema) /* line 44 */;
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
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 55 */;
		echo '/css/landing.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 58 */;
		echo '/favicon.ico">
</head>

<body>
    <!-- Navigace -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:default')) /* line 65 */;
		echo '" class="navbar-brand">
                <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 66 */;
		echo '/images/logo.svg" alt="QRdoklad" height="40" class="d-inline-block align-text-top">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:default')) /* line 76 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'default' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 76 */;
		echo '>
                            <i class="bi bi-house-fill"></i> Domů
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 81 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'funkce' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 81 */;
		echo '>
                            <i class="bi bi-gear-fill"></i> Funkce
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:cenik')) /* line 86 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'cenik' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 86 */;
		echo '>
                            <i class="bi bi-currency-euro"></i> Ceník
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 91 */;
		echo '"';
		echo ($ʟ_tmp = array_filter(['nav-link', $presenter->action === 'kontakt' ? 'active' : null])) ? ' class="' . LR\Filters::escapeHtmlAttr(implode(" ", array_unique($ʟ_tmp))) . '"' : "" /* line 91 */;
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
		$this->renderBlock('content', [], 'html') /* line 107 */;
		echo '    </main>

    <!-- Patička -->
    <footer class="footer bg-dark text-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5 class="text-primary mb-3">QRdoklad</h5>
                    <p class="mb-3">
                        Moderní fakturační systém pro vaše podnikání.
                        Jednoduché, rychlé a spolehlivé řešení pro všechny velikosti firem.
                    </p>
                    <div class="social-links" role="list" aria-label="Sociální sítě">
                        <a href="#" class="text-light me-3" aria-label="Facebook" rel="noopener" target="_blank" title="Připravujeme">
                            <i class="bi bi-facebook" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="text-light me-3" aria-label="Twitter" rel="noopener" target="_blank" title="Připravujeme">
                            <i class="bi bi-twitter-x" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="text-light me-3" aria-label="LinkedIn" rel="noopener" target="_blank" title="Připravujeme">
                            <i class="bi bi-linkedin" aria-hidden="true"></i>
                        </a>
                        <a href="#" class="text-light" aria-label="YouTube" rel="noopener" target="_blank" title="Připravujeme">
                            <i class="bi bi-youtube" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Produkt -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Produkt</h6>
                    <ul class="list-unstyled">
                        <!-- ✅ HOTOVÉ STRÁNKY -->
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:funkce')) /* line 141 */;
		echo '" class="text-light-50" title="✅ Hotové">Funkce</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:cenik')) /* line 142 */;
		echo '" class="text-light-50" title="✅ Hotové">Ceník</a></li>
                        
                        <!-- 🚧 PŘIPRAVUJEME -->
                        <li><a href="#" class="text-light-50 opacity-50" title="🚧 V přípravě">API dokumentace</a></li>
                        <li><a href="#" class="text-light-50 opacity-50" title="🚧 V přípravě">Changelog</a></li>
                    </ul>
                </div>
                
                <!-- Podpora -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Podpora</h6>
                    <ul class="list-unstyled">
                        <!-- ✅ HOTOVÉ STRÁNKY -->
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:help')) /* line 155 */;
		echo '" class="text-light-50" title="✅ Hotové">Nápověda</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 156 */;
		echo '" class="text-light-50" title="✅ Hotové">Kontakt</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:faq')) /* line 157 */;
		echo '" class="text-light-50" title="✅ Hotové">FAQ</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:status')) /* line 158 */;
		echo '" class="text-light-50" title="✅ Hotové">Status</a></li>
                    </ul>
                </div>
                
                <!-- Právní -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Právní</h6>
                    <ul class="list-unstyled">
                        <!-- 🔄 PŘIPRAVENÉ V ROUTERU -->
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:terms')) /* line 167 */;
		echo '" class="text-light-50" title="🔄 Připraveno v routeru">Obchodní podmínky</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:privacy')) /* line 168 */;
		echo '" class="text-light-50" title="🔄 Připraveno v routeru">Ochrana osobních údajů</a></li>
                        
                        <!-- 🚧 PŘIPRAVUJEME -->
                        <li><a href="#" class="text-light-50 opacity-50" title="🚧 V přípravě">GDPR</a></li>
                    </ul>
                </div>
                
                <!-- Společnost -->
                <div class="col-lg-2 col-md-6 mb-4">
                    <h6 class="text-primary mb-3">Společnost</h6>
                    <ul class="list-unstyled">
                        <!-- ✅ HOTOVÉ STRÁNKY -->
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:about')) /* line 180 */;
		echo '" class="text-light-50" title="✅ Hotové">O nás</a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:blog')) /* line 181 */;
		echo '" class="text-light-50" title="✅ Hotové">Blog</a></li>
                        
                        <!-- 🚧 PŘIPRAVUJEME -->
                        <li><a href="#" class="text-light-50 opacity-50" title="🚧 V přípravě">Tým</a></li>
                        <li><a href="#" class="text-light-50 opacity-50" title="🚧 V přípravě">Kariéra</a></li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4 border-secondary">
            
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p class="mb-0 text-light-50">&copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 194 */;
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
    
    <!-- QRdoklad JS - vše v jednom souboru -->
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 209 */;
		echo '/js/landing.js"></script>
</body>
</html>';
	}
}
