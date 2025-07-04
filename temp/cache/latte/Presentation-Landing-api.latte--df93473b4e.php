<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/api.latte */
final class Template_df93473b4e extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/api.latte';

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
<!-- Hero sekce pro API dokumentaci -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    QRdoklad <span class="text-primary">API</span>
                </h1>
                <p class="hero-subtitle">
                    Propojte QRdoklad se svými aplikacemi pomocí našeho REST API. 
                    Automatizujte fakturaci, synchronizujte data a vytvářejte vlastní integrace.
                </p>
                
                <!-- API Stats -->
                <div class="api-stats mt-4">
                    <div class="row g-3 justify-content-center">
                        <div class="col-auto">
                            <div class="stat-badge rounded-pill px-3 py-2">
                                <i class="bi bi-code-slash me-1" style="color: var(--primary-color);"></i>
                                <span class="fw-semibold" style="color: var(--primary-color);">REST API</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-badge rounded-pill px-3 py-2">
                                <i class="bi bi-shield-check me-1" style="color: var(--secondary-color);"></i>
                                <span class="fw-semibold" style="color: var(--secondary-color);">OAuth 2.0</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-badge rounded-pill px-3 py-2">
                                <i class="bi bi-graph-up me-1" style="color: var(--gray-color);"></i>
                                <span class="fw-semibold" style="color: var(--gray-color);">99.9% Uptime</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Start -->
                <div class="mt-4">
                    <a href="#getting-started" class="btn btn-primary btn-lg me-3">
                        <i class="bi bi-play-circle me-2"></i>Začít s API
                    </a>
                    <a href="#endpoints" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-list-ul me-2"></i>Prozkoumat Endpoints
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Navigace v dokumentaci -->
<section class="api-nav py-4 bg-light sticky-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="api-navigation">
                    <ul class="nav nav-pills justify-content-center flex-wrap">
                        <li class="nav-item">
                            <a class="nav-link" href="#getting-started">Začínáme</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#authentication">Autentifikace</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#endpoints">Endpoints</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#webhooks">Webhooks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#errors">Chyby</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#sdks">SDK</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- API Modul upozornění -->
<section class="api-notice py-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="alert alert-warning border-0 shadow-sm p-4" style="background: linear-gradient(135deg, rgba(177, 210, 53, 0.1), rgba(149, 177, 31, 0.1)); border-left: 4px solid var(--primary-color) !important;">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5 class="alert-heading mb-2" style="color: var(--dark-color);">
                                <i class="bi bi-lock-fill me-2" style="color: var(--primary-color);"></i>
                                API vyžaduje API modul
                            </h5>
                            <p class="mb-0 text-muted">
                                Pro používání QRdoklad API potřebujete <strong>API modul za 3 990 Kč</strong> (jednorázová platba). 
                                Získáte kompletní přístup k REST API, webhookům a oficiálním SDK.
                            </p>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:cenik')) /* line 104 */;
		echo '" class="btn btn-primary btn-lg">
                                <i class="bi bi-cart-plus me-2"></i>Koupit API modul
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Začínáme -->
<section class="getting-started-section py-5" id="getting-started">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-primary mb-4">
                    <i class="bi bi-rocket me-2"></i>Začínáme s API
                </h2>
                
                <div class="quick-start-card bg-white rounded-3 shadow-sm p-4 mb-5">
                    <h4 class="text-primary mb-3">Base URL</h4>
                    <div class="code-block bg-dark text-white p-3 rounded">
                        <code>https://api.qrdoklad.cz/v1/</code>
                    </div>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="feature-card bg-white rounded-3 shadow-sm p-4 h-100">
                            <div class="feature-icon mb-3 rounded-circle d-flex align-items-center justify-content-center" style="background-color: var(--primary-color); color: white; width: 80px; height: 80px;">
                                <i class="bi bi-lightning-charge fs-2"></i>
                            </div>
                            <h5>Rychlé připojení</h5>
                            <p class="text-muted">
                                Jednoduchá REST API s intuitivními endpoints. 
                                Začněte během několika minut.
                            </p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="feature-card bg-white rounded-3 shadow-sm p-4 h-100">
                            <div class="feature-icon mb-3 rounded-circle d-flex align-items-center justify-content-center" style="background-color: var(--secondary-color); color: white; width: 80px; height: 80px;">
                                <i class="bi bi-shield-lock fs-2"></i>
                            </div>
                            <h5>Bezpečné připojení</h5>
                            <p class="text-muted">
                                OAuth 2.0 autentifikace a HTTPS šifrování 
                                pro maximální bezpečnost.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Autentifikace -->
<section class="authentication-section py-5 bg-light" id="authentication">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-primary mb-4">
                    <i class="bi bi-key me-2"></i>Autentifikace
                </h2>
                
                <div class="auth-method bg-white rounded-3 shadow-sm p-4 mb-4">
                    <h4 class="mb-3">API Token</h4>
                    <p class="text-muted mb-3">
                        Použijte API token v Authorization hlavičce pro autentifikaci všech požadavků.
                    </p>
                    
                    <div class="code-example">
                        <div class="code-header text-white p-2 rounded-top" style="background-color: var(--primary-color);">
                            <small><i class="bi bi-terminal me-1"></i>HTTP Header</small>
                        </div>
                        <div class="code-block bg-dark text-white p-3 rounded-bottom">
                            <code>Authorization: Bearer your_api_token_here</code>
                        </div>
                    </div>
                </div>
                
                <div class="auth-steps bg-white rounded-3 shadow-sm p-4">
                    <h5 class="text-primary mb-3">Jak získat API token:</h5>
                    <ol class="steps-list">
                        <li class="mb-2">Přihlaste se do QRdoklad účtu</li>
                        <li class="mb-2">Jděte do Nastavení → API přístup</li>
                        <li class="mb-2">Klikněte na "Vytvořit nový token"</li>
                        <li class="mb-2">Nastavte oprávnění pro token</li>
                        <li>Zkopírujte vygenerovaný token</li>
                    </ol>
                    
                    <div class="alert alert-warning mt-3">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <strong>Bezpečnost:</strong> Token je zobrazen pouze jednou. 
                        Uložte si ho na bezpečné místo.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Endpoints -->
<section class="endpoints-section py-5" id="endpoints">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="section-title text-primary mb-5">
                    <i class="bi bi-list-ul me-2"></i>API Endpoints
                </h2>
                
                <!-- Faktury -->
                <div class="endpoint-group mb-5">
                    <h3 style="color: var(--primary-color);" class="mb-4">📄 Faktury</h3>
                    
                    <div class="endpoint-card bg-white rounded-3 shadow-sm mb-3">
                        <div class="endpoint-header p-3 border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="endpoint-method">
                                    <span class="badge me-2" style="background-color: var(--primary-color); color: var(--white);">GET</span>
                                    <span class="endpoint-path">/invoices</span>
                                </div>
                                <small class="text-muted">Seznam faktur</small>
                            </div>
                        </div>
                        <div class="endpoint-details p-3">
                            <p class="text-muted mb-3">Získá seznam všech faktur s možností filtrování a stránkování.</p>
                            
                            <h6 class="text-primary">Parametry:</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Parametr</th>
                                            <th>Typ</th>
                                            <th>Popis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><code>page</code></td>
                                            <td>integer</td>
                                            <td>Číslo stránky (výchozí: 1)</td>
                                        </tr>
                                        <tr>
                                            <td><code>status</code></td>
                                            <td>string</td>
                                            <td>Stav faktury (draft, sent, paid, overdue)</td>
                                        </tr>
                                        <tr>
                                            <td><code>client_id</code></td>
                                            <td>integer</td>
                                            <td>ID klienta pro filtrování</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <div class="code-example mt-3">
                                <div class="code-header text-white p-2 rounded-top" style="background-color: var(--primary-color);">
                                    <small><i class="bi bi-code me-1"></i>Příklad požadavku</small>
                                </div>
                                <div class="code-block bg-dark text-white p-3 rounded-bottom">
                                    <code>curl -H "Authorization: Bearer YOUR_TOKEN" \\<br>
     https://api.qrdoklad.cz/v1/invoices?status=paid</code>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="endpoint-card bg-white rounded-3 shadow-sm mb-3">
                        <div class="endpoint-header p-3 border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="endpoint-method">
                                    <span class="badge me-2" style="background-color: var(--secondary-color); color: var(--white);">POST</span>
                                    <span class="endpoint-path">/invoices</span>
                                </div>
                                <small class="text-muted">Vytvoření faktury</small>
                            </div>
                        </div>
                        <div class="endpoint-details p-3">
                            <p class="text-muted mb-3">Vytvoří novou fakturu s automatickým QR kódem.</p>
                            
                            <div class="code-example">
                                <div class="code-header text-white p-2 rounded-top" style="background-color: var(--secondary-color);">
                                    <small><i class="bi bi-braces me-1"></i>JSON Payload</small>
                                </div>
                                <div class="code-block bg-dark text-white p-3 rounded-bottom small">
                                    <pre><code>{
  "client_id": 123,
  "due_date": "2025-08-04",
  "items": [
    {
      "name": "Webová stránka",
      "quantity": 1,
      "price": 25000,
      "vat_rate": 21
    }
  ],
  "notes": "Děkujeme za zakázku"
}</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Klienti -->
                <div class="endpoint-group mb-5">
                    <h3 style="color: var(--secondary-color);" class="mb-4">👥 Klienti</h3>
                    
                    <div class="endpoint-card bg-white rounded-3 shadow-sm mb-3">
                        <div class="endpoint-header p-3 border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="endpoint-method">
                                    <span class="badge me-2" style="background-color: var(--primary-color); color: var(--white);">GET</span>
                                    <span class="endpoint-path">/clients</span>
                                </div>
                                <small class="text-muted">Seznam klientů</small>
                            </div>
                        </div>
                        <div class="endpoint-details p-3">
                            <p class="text-muted">Získá seznam všech klientů s jejich kontaktními údaji.</p>
                        </div>
                    </div>
                    
                    <div class="endpoint-card bg-white rounded-3 shadow-sm mb-3">
                        <div class="endpoint-header p-3 border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="endpoint-method">
                                    <span class="badge me-2" style="background-color: var(--secondary-color); color: var(--white);">POST</span>
                                    <span class="endpoint-path">/clients</span>
                                </div>
                                <small class="text-muted">Vytvoření klienta</small>
                            </div>
                        </div>
                        <div class="endpoint-details p-3">
                            <p class="text-muted mb-3">Vytvoří nového klienta s automatickým ARES vyhledáváním.</p>
                            
                            <div class="code-example">
                                <div class="code-header text-white p-2 rounded-top" style="background-color: var(--secondary-color);">
                                    <small><i class="bi bi-braces me-1"></i>JSON Payload</small>
                                </div>
                                <div class="code-block bg-dark text-white p-3 rounded-bottom small">
                                    <pre><code>{
  "name": "Testovací s.r.o.",
  "ico": "12345678",
  "email": "info@testovaci.cz",
  "phone": "+420123456789",
  "address": {
    "street": "Hlavní 123",
    "city": "Praha",
    "zip": "11000"
  }
}</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- ARES -->
                <div class="endpoint-group mb-5">
                    <h3 style="color: var(--gray-color);" class="mb-4">🔍 ARES</h3>
                    
                    <div class="endpoint-card bg-white rounded-3 shadow-sm">
                        <div class="endpoint-header p-3 border-bottom">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="endpoint-method">
                                    <span class="badge me-2" style="background-color: var(--primary-color); color: var(--white);">GET</span>
                                    <span class="endpoint-path">/ares/{ico}</span>
                                </div>
                                <small class="text-muted">ARES vyhledávání</small>
                            </div>
                        </div>
                        <div class="endpoint-details p-3">
                            <p class="text-muted mb-3">Vyhledá firemní údaje v ARES databázi podle IČO.</p>
                            
                            <div class="code-example">
                                <div class="code-header text-white p-2 rounded-top" style="background-color: var(--primary-color);">
                                    <small><i class="bi bi-arrow-return-right me-1"></i>Odpověď</small>
                                </div>
                                <div class="code-block bg-dark text-white p-3 rounded-bottom small">
                                    <pre><code>{
  "ico": "12345678",
  "name": "Testovací s.r.o.",
  "dic": "CZ12345678",
  "address": {
    "street": "Hlavní 123",
    "city": "Praha",
    "zip": "11000"
  },
  "active": true
}</code></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Webhooks -->
<section class="webhooks-section py-5 bg-light" id="webhooks">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-primary mb-4">
                    <i class="bi bi-webhook me-2"></i>Webhooks
                </h2>
                
                <div class="webhook-info bg-white rounded-3 shadow-sm p-4 mb-4">
                    <p class="text-muted mb-4">
                        Webhooks vám umožňují automaticky reagovat na události v QRdokladu. 
                        Když se stane určitá událost, pošleme HTTP POST požadavek na váš endpoint.
                    </p>
                    
                    <h5 class="text-primary mb-3">Dostupné události:</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="event-card p-3 border rounded">
                                <h6 style="color: var(--primary-color);" class="mb-1">invoice.created</h6>
                                <small class="text-muted">Faktura byla vytvořena</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="event-card p-3 border rounded">
                                <h6 style="color: var(--primary-color);" class="mb-1">invoice.paid</h6>
                                <small class="text-muted">Faktura byla zaplacena</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="event-card p-3 border rounded">
                                <h6 style="color: var(--secondary-color);" class="mb-1">invoice.overdue</h6>
                                <small class="text-muted">Faktura je po splatnosti</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="event-card p-3 border rounded">
                                <h6 style="color: var(--gray-color);" class="mb-1">client.created</h6>
                                <small class="text-muted">Nový klient byl přidán</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="webhook-example bg-white rounded-3 shadow-sm p-4">
                    <h5 class="text-primary mb-3">Příklad webhook payload:</h5>
                    
                    <div class="code-example">
                        <div class="code-header text-white p-2 rounded-top" style="background-color: var(--primary-color);">
                            <small><i class="bi bi-braces me-1"></i>JSON Payload</small>
                        </div>
                        <div class="code-block bg-dark text-white p-3 rounded-bottom small">
                            <pre><code>{
  "event": "invoice.paid",
  "timestamp": "2025-07-04T14:30:00Z",
  "data": {
    "invoice_id": 12345,
    "client_id": 678,
    "amount": 25000,
    "currency": "CZK",
    "paid_at": "2025-07-04T14:25:00Z"
  }
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Error handling -->
<section class="errors-section py-5" id="errors">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-primary mb-4">
                    <i class="bi bi-exclamation-triangle me-2"></i>Chybové kódy
                </h2>
                
                <div class="error-codes bg-white rounded-3 shadow-sm p-4">
                    <p class="text-muted mb-4">
                        API používá standardní HTTP status kódy pro označení úspěchu nebo selhání požadavku.
                    </p>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead style="background-color: var(--primary-color); color: var(--white);">
                                <tr>
                                    <th>Kód</th>
                                    <th>Název</th>
                                    <th>Popis</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="badge" style="background-color: var(--primary-color); color: var(--white);">200</span></td>
                                    <td>OK</td>
                                    <td>Požadavek byl úspěšný</td>
                                </tr>
                                <tr>
                                    <td><span class="badge" style="background-color: var(--primary-color); color: var(--white);">201</span></td>
                                    <td>Created</td>
                                    <td>Zdroj byl úspěšně vytvořen</td>
                                </tr>
                                <tr>
                                    <td><span class="badge" style="background-color: var(--secondary-color); color: var(--white);">400</span></td>
                                    <td>Bad Request</td>
                                    <td>Chybný formát požadavku</td>
                                </tr>
                                <tr>
                                    <td><span class="badge" style="background-color: var(--secondary-color); color: var(--white);">401</span></td>
                                    <td>Unauthorized</td>
                                    <td>Chybná nebo chybějící autentifikace</td>
                                </tr>
                                <tr>
                                    <td><span class="badge" style="background-color: var(--secondary-color); color: var(--white);">403</span></td>
                                    <td>Forbidden</td>
                                    <td>Nedostatečná oprávnění</td>
                                </tr>
                                <tr>
                                    <td><span class="badge" style="background-color: var(--gray-color); color: var(--white);">404</span></td>
                                    <td>Not Found</td>
                                    <td>Zdroj nebyl nalezen</td>
                                </tr>
                                <tr>
                                    <td><span class="badge" style="background-color: var(--dark-color); color: var(--white);">500</span></td>
                                    <td>Server Error</td>
                                    <td>Interní chyba serveru</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <h5 class="text-primary mt-4 mb-3">Formát chybové odpovědi:</h5>
                    <div class="code-example">
                        <div class="code-header text-white p-2 rounded-top" style="background-color: var(--gray-color);">
                            <small><i class="bi bi-x-circle me-1"></i>Error Response</small>
                        </div>
                        <div class="code-block bg-dark text-white p-3 rounded-bottom">
                            <pre><code>{
  "error": {
    "code": "VALIDATION_ERROR",
    "message": "Neplatný formát emailu",
    "field": "email"
  }
}</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SDK a knihovny -->
<section class="sdk-section py-5 bg-light" id="sdks">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-primary mb-4">
                    <i class="bi bi-code-square me-2"></i>SDK a knihovny
                </h2>
                
                <p class="text-muted mb-5">
                    Použijte naše oficiální SDK pro rychlejší integraci v oblíbených programovacích jazycích.
                </p>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="sdk-card bg-white rounded-3 shadow-sm p-4 h-100">
                            <div class="sdk-icon mb-3" style="color: var(--primary-color);">
                                <i class="bi bi-code-slash fs-1"></i>
                            </div>
                            <h5 style="color: var(--primary-color);">PHP SDK</h5>
                            <p class="text-muted mb-3">
                                Oficiální PHP knihovna pro snadnou integraci s PHP aplikacemi.
                            </p>
                            <div class="code-install">
                                <div class="code-block bg-dark text-white p-2 rounded mb-3">
                                    <code>composer require qrdoklad/php-sdk</code>
                                </div>
                            </div>
                            <a href="#" class="btn btn-outline-primary">
                                <i class="bi bi-github me-1"></i>GitHub
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="sdk-card bg-white rounded-3 shadow-sm p-4 h-100">
                            <div class="sdk-icon mb-3" style="color: var(--secondary-color);">
                                <i class="bi bi-braces fs-1"></i>
                            </div>
                            <h5 style="color: var(--secondary-color);">JavaScript SDK</h5>
                            <p class="text-muted mb-3">
                                Node.js a browser knihovna pro webové aplikace a SPA.
                            </p>
                            <div class="code-install">
                                <div class="code-block bg-dark text-white p-2 rounded mb-3">
                                    <code>npm install @qrdoklad/js-sdk</code>
                                </div>
                            </div>
                            <a href="#" class="btn" style="color: var(--secondary-color); border-color: var(--secondary-color);">
                                <i class="bi bi-npm me-1"></i>NPM
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="sdk-card bg-white rounded-3 shadow-sm p-4 h-100">
                            <div class="sdk-icon mb-3" style="color: var(--gray-color);">
                                <i class="bi bi-gem fs-1"></i>
                            </div>
                            <h5 style="color: var(--gray-color);">Ruby SDK</h5>
                            <p class="text-muted mb-3">
                                Gem pro Ruby on Rails a další Ruby aplikace.
                            </p>
                            <div class="code-install">
                                <div class="code-block bg-dark text-white p-2 rounded mb-3">
                                    <code>gem install qrdoklad</code>
                                </div>
                            </div>
                            <span class="badge" style="background-color: var(--gray-color); color: var(--white);">Připravujeme</span>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="sdk-card bg-white rounded-3 shadow-sm p-4 h-100">
                            <div class="sdk-icon mb-3" style="color: var(--dark-color);">
                                <i class="bi bi-python fs-1"></i>
                            </div>
                            <h5 style="color: var(--dark-color);">Python SDK</h5>
                            <p class="text-muted mb-3">
                                Package pro Django, Flask a další Python frameworky.
                            </p>
                            <div class="code-install">
                                <div class="code-block bg-dark text-white p-2 rounded mb-3">
                                    <code>pip install qrdoklad-python</code>
                                </div>
                            </div>
                            <span class="badge" style="background-color: var(--gray-color); color: var(--white);">Připravujemes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rate limiting -->
<section class="rate-limiting py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2 class="section-title text-primary mb-4">⚡ Rate Limiting</h2>
                
                <div class="rate-info bg-white rounded-3 shadow-sm p-4">
                    <p class="text-muted mb-4">
                        Pro zajištění stability API používáme rate limiting. 
                        Každý API token má přidělen limit požadavků.
                    </p>
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead style="background-color: var(--primary-color); color: var(--white);">
                                <tr>
                                    <th>Tarif</th>
                                    <th>Limit / hodinu</th>
                                    <th>Burst limit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Základní (zdarma)</td>
                                    <td>100 požadavků</td>
                                    <td>20/min</td>
                                </tr>
                                <tr>
                                    <td>API modul</td>
                                    <td>1,000 požadavků</td>
                                    <td>50/min</td>
                                </tr>
                                <tr>
                                    <td>Enterprise</td>
                                    <td>10,000 požadavků</td>
                                    <td>200/min</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="alert alert-info mt-3">
                        <i class="bi bi-info-circle me-2"></i>
                        <strong>Headers:</strong> Každá odpověď obsahuje hlavičky 
                        <code>X-RateLimit-Remaining</code> a <code>X-RateLimit-Reset</code>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Podpora -->
<section class="cta-section py-5 text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="mb-4">Připraveni začít s API?</h2>
                <p class="lead mb-4">
                    Získejte přístup k mocnému REST API pro automatizaci vaší fakturace. 
                    Jednorázová investice, dlouhodobý užitek.
                </p>
                
                <div class="row g-4 justify-content-center">
                    <div class="col-md-4">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:cenik')) /* line 727 */;
		echo '" class="btn btn-white btn-lg w-100">
                            <i class="bi bi-cart-plus me-2"></i>
                            Koupit API modul
                        </a>
                    </div>
                    <div class="col-md-4">
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 733 */;
		echo '" class="btn btn-outline-light btn-lg w-100">
                            <i class="bi bi-envelope me-2"></i>
                            Máte dotazy?
                        </a>
                    </div>
                </div>
                
                <div class="mt-4">
                    <div class="row justify-content-center text-center">
                        <div class="col-auto">
                            <small class="text-white-50">
                                <i class="bi bi-check-circle me-1"></i>
                                Jednorázová platba 3 990 Kč
                            </small>
                        </div>
                        <div class="col-auto">
                            <small class="text-white-50">
                                <i class="bi bi-check-circle me-1"></i>
                                Bez měsíčních poplatků
                            </small>
                        </div>
                        <div class="col-auto">
                            <small class="text-white-50">
                                <i class="bi bi-check-circle me-1"></i>
                                Kompletní dokumentace
                            </small>
                        </div>
                    </div>
                </div>
                
                <p class="mt-3 mb-0 text-white-50">
                    <i class="bi bi-clock me-1"></i>
                    Odpovídám na dotazy v pracovní dny do 24 hodin
                </p>
            </div>
        </div>
    </div>
</section>

';
	}
}
