<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/terms.latte */
final class Template_32085c88cf extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/terms.latte';

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
<!-- Hero sekce pro obchodní podmínky -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Obchodní <span class="text-primary">podmínky</span>
                </h1>
                <p class="hero-subtitle">
                    Podmínky používání fakturačního systému QRdoklad. 
                    Přečtěte si pravidla a podmínky pro používání našich služeb.
                </p>
                <p class="text-muted">
                    <i class="bi bi-calendar-check me-2"></i>
                    Poslední aktualizace: ';
		echo LR\Filters::escapeHtmlText(date('j. n. Y')) /* line 17 */;
		echo '
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Obsah obchodních podmínek -->
<section class="content-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="content-card bg-white p-4 p-md-5 rounded-3 shadow">
                    
                    <h2 class="text-primary mb-4">1. Základní ustanovení</h2>
                    <p class="lead">
                        Tyto obchodní podmínky upravují vztahy mezi provozovatelem služby QRdoklad 
                        a uživateli při používání fakturačního systému.
                    </p>
                    
                    <div class="alert alert-info">
                        <h5 class="alert-heading"><i class="bi bi-info-circle me-2"></i>Informace o provozovateli:</h5>
                        <ul class="mb-0">
                            <li><strong>Název:</strong> QRdoklad.cz</li>
                            <li><strong>Adresa:</strong> Librantice 167, 503 46 Librantice</li>
                            <li><strong>E-mail:</strong> <a href="mailto:info@qrdoklad.cz">info@qrdoklad.cz</a></li>
                            <li><strong>Telefon:</strong> +420 703 985 390</li>
                        </ul>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">2. Předmět smlouvy</h2>
                    <p>
                        Předmětem těchto obchodních podmínek je poskytování služeb 
                        cloudového fakturačního systému QRdoklad prostřednictvím internetové aplikace.
                    </p>
                    
                    <h3 class="h5 mb-3">2.1 Poskytované služby</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title text-primary">Základní funkcionalita</h6>
                                    <ul class="list-unstyled">
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Vystavování faktur</li>
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Správa klientů</li>
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>QR platby</li>
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>ARES integrace</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title text-secondary">Pokročilé funkce</h6>
                                    <ul class="list-unstyled">
                                        <li><i class="bi bi-circle text-muted me-2"></i>Vlastní šablony</li>
                                        <li><i class="bi bi-circle text-muted me-2"></i>Automatické připomínky</li>
                                        <li><i class="bi bi-circle text-muted me-2"></i>API přístup</li>
                                        <li><i class="bi bi-circle text-muted me-2"></i>Prioritní podpora</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">3. Registrace a přístup</h2>
                    <p>
                        Pro používání služby je nutná registrace a vytvoření uživatelského účtu. 
                        Uživatel je povinen uvést pravdivé a aktuální údaje.
                    </p>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Povinnost</th>
                                    <th scope="col">Uživatel</th>
                                    <th scope="col">Provozovatel</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pravdivé údaje při registraci</td>
                                    <td><span class="badge bg-success">Ano</span></td>
                                    <td><span class="badge bg-secondary">Ne</span></td>
                                </tr>
                                <tr>
                                    <td>Ochrana přístupových údajů</td>
                                    <td><span class="badge bg-success">Ano</span></td>
                                    <td><span class="badge bg-warning">Částečně</span></td>
                                </tr>
                                <tr>
                                    <td>Dostupnost služby 24/7</td>
                                    <td><span class="badge bg-secondary">Ne</span></td>
                                    <td><span class="badge bg-warning">Snažíme se</span></td>
                                </tr>
                                <tr>
                                    <td>Záloha dat</td>
                                    <td><span class="badge bg-warning">Doporučeno</span></td>
                                    <td><span class="badge bg-success">Ano</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">4. Ceny a platby</h2>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="card border-primary text-center">
                                <div class="card-header bg-primary text-white">
                                    <h6 class="mb-0">Starter</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-primary">299 Kč</h4>
                                    <p class="card-text small">měsíčně</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-success text-center">
                                <div class="card-header bg-success text-white">
                                    <h6 class="mb-0">Business</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-success">599 Kč</h4>
                                    <p class="card-text small">měsíčně</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-warning text-center">
                                <div class="card-header bg-warning text-dark">
                                    <h6 class="mb-0">Enterprise</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-warning">Na míru</h4>
                                    <p class="card-text small">individuálně</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="h5 mb-3">4.1 Platební podmínky</h3>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item"><i class="bi bi-calendar text-primary me-2"></i>Platba je splatná předem za celé fakturační období</li>
                        <li class="list-group-item"><i class="bi bi-credit-card text-primary me-2"></i>Přijímáme platby kartou, převodem a QR platbami</li>
                        <li class="list-group-item"><i class="bi bi-arrow-clockwise text-primary me-2"></i>Služba se automaticky obnovuje každý měsíc</li>
                        <li class="list-group-item"><i class="bi bi-x-circle text-danger me-2"></i>Při neplacení může být služba pozastavena</li>
                    </ul>

                    <h2 class="text-primary mb-4 mt-5">5. Práva a povinnosti</h2>
                    
                    <div class="accordion" id="rightsAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="userRights">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseUser">
                                    <i class="bi bi-person-check text-primary me-2"></i>Práva a povinnosti uživatele
                                </button>
                            </h2>
                            <div id="collapseUser" class="accordion-collapse collapse show" data-bs-parent="#rightsAccordion">
                                <div class="accordion-body">
                                    <strong>Práva:</strong>
                                    <ul>
                                        <li>Používání služby v souladu s těmito podmínkami</li>
                                        <li>Technická podpora podle zvoleného tarifu</li>
                                        <li>Export vlastních dat kdykoliv</li>
                                        <li>Ukončení služby bez udání důvodu</li>
                                    </ul>
                                    <strong>Povinnosti:</strong>
                                    <ul>
                                        <li>Platba za službu podle ceníku</li>
                                        <li>Dodržování těchto obchodních podmínek</li>
                                        <li>Nezneužívání služby k nezákonným účelům</li>
                                        <li>Ochrana přístupových údajů</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="providerRights">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProvider">
                                    <i class="bi bi-building text-primary me-2"></i>Práva a povinnosti provozovatele
                                </button>
                            </h2>
                            <div id="collapseProvider" class="accordion-collapse collapse" data-bs-parent="#rightsAccordion">
                                <div class="accordion-body">
                                    <strong>Práva:</strong>
                                    <ul>
                                        <li>Změna ceníku s 30denním předstihem</li>
                                        <li>Ukončení služby při porušení podmínek</li>
                                        <li>Dočasné pozastavení při technických problémech</li>
                                        <li>Úprava funkcí a služeb</li>
                                    </ul>
                                    <strong>Povinnosti:</strong>
                                    <ul>
                                        <li>Poskytování služby podle smlouvy</li>
                                        <li>Ochrana osobních údajů podle GDPR</li>
                                        <li>Pravidelné zálohy dat</li>
                                        <li>Technická podpora podle tarifu</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">6. Ukončení smlouvy</h2>
                    <div class="alert alert-warning">
                        <h5 class="alert-heading"><i class="bi bi-exclamation-triangle me-2"></i>Možnosti ukončení</h5>
                        <p>Smlouvu můžete ukončit kdykoli z vašeho uživatelského účtu nebo písemně na náš e-mail.</p>
                        <ul class="mb-0">
                            <li><strong>Výpovědní lhůta:</strong> Žádná</li>
                            <li><strong>Sankce:</strong> Žádné</li>
                            <li><strong>Data:</strong> Dostupná 30 dní po ukončení</li>
                            <li><strong>Refundace:</strong> Poměrná část za nevyčerpaný měsíc</li>
                        </ul>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">7. Odpovědnost a záruky</h2>
                    <p>
                        Provozovatel se snaží udržovat službu dostupnou 24/7, ale nezaručuje 
                        100% dostupnost. Odpovědnost je omezena na výši zaplacených poplatků.
                    </p>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-title text-success"><i class="bi bi-shield-check me-2"></i>Zaručujeme</h6>
                                    <ul class="list-unstyled mb-0">
                                        <li>• Bezpečnost vašich dat</li>
                                        <li>• Pravidelné zálohy</li>
                                        <li>• Dodržování GDPR</li>
                                        <li>• Technickou podporu</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h6 class="card-title text-warning"><i class="bi bi-exclamation-triangle me-2"></i>Nezaručujeme</h6>
                                    <ul class="list-unstyled mb-0">
                                        <li>• 100% dostupnost služby</li>
                                        <li>• Chybovost třetích stran</li>
                                        <li>• Ztráty z výpadků</li>
                                        <li>• Kompatibilitu se všemi systémy</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">8. Změny podmínek</h2>
                    <p>
                        Tyto obchodní podmínky můžeme změnit. O významných změnách vás budeme 
                        informovat e-mailem nejméně 30 dní předem.
                    </p>

                    <h2 class="text-primary mb-4 mt-5">9. Závěrečná ustanovení</h2>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item"><strong>Právo:</strong> Česká republika</li>
                        <li class="list-group-item"><strong>Spory:</strong> Věcně příslušný soud v ČR</li>
                        <li class="list-group-item"><strong>Oddělitelnost:</strong> Neplatnost části neovlivní celé podmínky</li>
                        <li class="list-group-item"><strong>Účinnost:</strong> Od ';
		echo LR\Filters::escapeHtmlText(date('j. n. Y')) /* line 282 */;
		echo '</li>
                    </ul>

                    <div class="contact-section mt-5 p-4 bg-primary bg-opacity-10 rounded">
                        <div class="text-center">
                            <h3 class="text-primary">Máte dotazy k podmínkám?</h3>
                            <p class="mb-3">
                                Pokud máte jakékoliv dotazy k těmto obchodním podmínkám, 
                                neváhejte nás kontaktovat.
                            </p>
                            <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 292 */;
		echo '" class="btn btn-primary">
                                <i class="bi bi-chat-dots me-2"></i>
                                Kontaktovat nás
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
