<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/privacy.latte */
final class Template_985d5a5c20 extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/privacy.latte';

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
		echo '
<!-- Hero sekce pro privacy policy -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Ochrana <span class="text-primary">osobních údajů</span>
                </h1>
                <p class="hero-subtitle">
                    Vaše soukromí je pro nás důležité. Zde se dozvíte, jak zpracováváme 
                    vaše osobní údaje v souladu s GDPR a českými zákony.
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

<!-- Obsah privacy policy -->
<section class="content-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="content-card bg-white p-4 p-md-5 rounded-3 shadow">
                    
                    <h2 class="text-primary mb-4">1. Základní informace o správci</h2>
                    <p class="lead">
                        Správcem vašich osobních údajů je <strong>Aleš Zita</strong>, 
                        provozovatel webové stránky a fakturačního systému QRdoklad.
                    </p>
                    
                    <div class="alert alert-info">
                        <h5 class="alert-heading"><i class="bi bi-info-circle me-2"></i>Kontaktní údaje správce:</h5>
                        <ul class="mb-0">
                            <li><strong>Jméno:</strong> Aleš Zita</li>
                            <li><strong>IČ:</strong> 87894912</li>
                            <li><strong>Adresa:</strong> Librantice 167, 503 46 Librantice, Česká republika</li>
                            <li><strong>E-mail pro GDPR:</strong> <a href="mailto:gdpr@qrdoklad.cz">gdpr@qrdoklad.cz</a></li>
                            <li><strong>Telefon:</strong> <a href="tel:+420703985390">+420 703 985 390</a></li>
                        </ul>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">2. Jaké údaje zpracováváme a proč</h2>
                    
                    <h3 class="h5 mb-3">2.1 Údaje při registraci a používání služby</h3>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title text-primary">Povinné údaje</h6>
                                    <ul class="list-unstyled">
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Jméno a příjmení</li>
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>E-mailová adresa</li>
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i>Heslo (šifrované)</li>
                                    </ul>
                                    <p class="small text-muted mb-0">Účel: Vytvoření a správa uživatelského účtu</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="card-title text-secondary">Nepovinné údaje</h6>
                                    <ul class="list-unstyled">
                                        <li><i class="bi bi-circle text-muted me-2"></i>Telefon</li>
                                        <li><i class="bi bi-circle text-muted me-2"></i>Fakturační adresa</li>
                                        <li><i class="bi bi-circle text-muted me-2"></i>IČ, DIČ firmy</li>
                                    </ul>
                                    <p class="small text-muted mb-0">Účel: Vystavování faktur a komunikace</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="h5 mb-3">2.2 Automaticky sbírané údaje</h3>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item"><i class="bi bi-globe text-primary me-2"></i><strong>IP adresa a informace o prohlížeči:</strong> Pro zabezpečení a technické fungování</li>
                        <li class="list-group-item"><i class="bi bi-cookie text-primary me-2"></i><strong>Cookies:</strong> Pro zlepšení uživatelského zážitku</li>
                        <li class="list-group-item"><i class="bi bi-graph-up text-primary me-2"></i><strong>Logy o používání:</strong> Pro technickou podporu a zlepšování služby</li>
                        <li class="list-group-item"><i class="bi bi-shield-check text-primary me-2"></i><strong>Bezpečnostní logy:</strong> Pro ochranu před zneužitím</li>
                    </ul>

                    <h3 class="h5 mb-3">2.3 Vaše obchodní data</h3>
                    <div class="alert alert-warning">
                        <h6 class="alert-heading"><i class="bi bi-info-triangle me-2"></i>Důležité upozornění:</h6>
                        <p class="mb-0">Data o vašich klientech a faktury, které si sami vytvoříte v systému, zpracováváme pouze na základě vašich pokynů. V těchto případech vystupujete jako správce a my jako zpracovatel.</p>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">3. Právní základ zpracování</h2>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card border-primary">
                                <div class="card-body">
                                    <h6 class="card-title"><i class="bi bi-file-earmark-check text-primary me-2"></i>Smlouva</h6>
                                    <p class="card-text small">Zpracování nutné pro plnění smlouvy o poskytování služeb fakturačního systému.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-secondary">
                                <div class="card-body">
                                    <h6 class="card-title"><i class="bi bi-balance text-secondary me-2"></i>Oprávněný zájem</h6>
                                    <p class="card-text small">Zajištění bezpečnosti, technické podpory a zlepšování služeb.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">4. Jak dlouho uchováváme vaše data</h2>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>Typ dat</th>
                                    <th>Doba uchovávání</th>
                                    <th>Důvod</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Registrační údaje</td>
                                    <td>Po dobu trvání účtu + 3 roky</td>
                                    <td>Účetní a právní povinnosti</td>
                                </tr>
                                <tr>
                                    <td>Logy a bezpečnostní data</td>
                                    <td>12 měsíců</td>
                                    <td>Bezpečnost a technická podpora</td>
                                </tr>
                                <tr>
                                    <td>Cookies a podobné technologie</td>
                                    <td>Podle typu (viz sekce Cookies)</td>
                                    <td>Technické fungování</td>
                                </tr>
                                <tr>
                                    <td>Vaše obchodní data</td>
                                    <td>Podle vašich pokynů</td>
                                    <td>Poskytování služby</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">5. Komu předáváme vaše údaje</h2>
                    <div class="alert alert-success">
                        <h6 class="alert-heading"><i class="bi bi-shield-check me-2"></i>Základní zásada:</h6>
                        <p class="mb-0">Vaše osobní údaje neprodáváme ani nepronajímáme třetím stranám pro komerční účely.</p>
                    </div>

                    <h3 class="h5 mb-3">Údaje můžeme předat pouze:</h3>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">
                            <i class="bi bi-server text-primary me-2"></i>
                            <strong>Poskytovateli hostingu:</strong> Hosting je zajištěn v České republice u důvěryhodného partnera
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-graph-up text-primary me-2"></i>
                            <strong>Google Analytics:</strong> Anonymizované statistiky návštěvnosti (plánujeme implementovat)
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-search text-primary me-2"></i>
                            <strong>Google Search Console:</strong> Pro optimalizaci vyhledávání (plánujeme implementovat)
                        </li>
                        <li class="list-group-item">
                            <i class="bi bi-shield-exclamation text-warning me-2"></i>
                            <strong>Orgánům veřejné moci:</strong> Pouze na základě právní povinnosti nebo soudu
                        </li>
                    </ul>

                    <h2 class="text-primary mb-4 mt-5">6. Vaše práva podle GDPR</h2>
                    <p>Podle GDPR máte následující práva:</p>
                    
                    <div class="row g-4 my-4">
                        <div class="col-md-6">
                            <div class="rights-card p-3 border rounded">
                                <h5 class="h6"><i class="bi bi-eye text-primary me-2"></i>Právo na přístup</h5>
                                <p class="small mb-0">Můžete požádat o informace o zpracování vašich údajů</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="rights-card p-3 border rounded">
                                <h5 class="h6"><i class="bi bi-pencil text-primary me-2"></i>Právo na opravu</h5>
                                <p class="small mb-0">Můžete požádat o opravu nepřesných údajů</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="rights-card p-3 border rounded">
                                <h5 class="h6"><i class="bi bi-trash text-primary me-2"></i>Právo na výmaz</h5>
                                <p class="small mb-0">Můžete požádat o smazání vašich údajů</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="rights-card p-3 border rounded">
                                <h5 class="h6"><i class="bi bi-download text-primary me-2"></i>Právo na přenositelnost</h5>
                                <p class="small mb-0">Můžete získat vaše data v elektronické podobě</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="rights-card p-3 border rounded">
                                <h5 class="h6"><i class="bi bi-pause-circle text-primary me-2"></i>Právo na omezení</h5>
                                <p class="small mb-0">Můžete požádat o omezení zpracování</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="rights-card p-3 border rounded">
                                <h5 class="h6"><i class="bi bi-x-circle text-primary me-2"></i>Právo vznést námitku</h5>
                                <p class="small mb-0">Můžete vznést námitku proti zpracování</p>
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-info">
                        <h6 class="alert-heading">Jak uplatnit svá práva:</h6>
                        <p class="mb-0">Pošlete nám e-mail na adresu <a href="mailto:gdpr@qrdoklad.cz">gdpr@qrdoklad.cz</a> nebo nás kontaktujte telefonicky na <a href="tel:+420703985390">+420 703 985 390</a>. Odpovíme vám do 30 dnů.</p>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">7. Bezpečnost vašich dat</h2>
                    <p>Vaše osobní údaje chráníme pomocí moderních bezpečnostních opatření:</p>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="text-center p-3">
                                <i class="bi bi-shield-lock-fill text-primary fs-1"></i>
                                <h6 class="mt-2">HTTPS šifrování</h6>
                                <p class="small text-muted">Všechna data jsou přenášena šifrovaně</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3">
                                <i class="bi bi-key-fill text-primary fs-1"></i>
                                <h6 class="mt-2">Šifrování hesel</h6>
                                <p class="small text-muted">Hesla jsou bezpečně zahashována</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3">
                                <i class="bi bi-server text-primary fs-1"></i>
                                <h6 class="mt-2">Bezpečný hosting</h6>
                                <p class="small text-muted">Data jsou uložena v České republice</p>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">8. Cookies a podobné technologie</h2>
                    
                    <h3 class="h5 mb-3">8.1 Co jsou cookies</h3>
                    <p>Cookies jsou malé textové soubory, které si webové stránky ukládají do vašeho prohlížeče. Umožňují nám rozpoznat váš prohlížeč a zapamatovat si některé informace.</p>

                    <h3 class="h5 mb-3">8.2 Jaké cookies používáme</h3>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>Typ cookies</th>
                                    <th>Účel</th>
                                    <th>Doba platnosti</th>
                                    <th>Nutné</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Technické cookies</td>
                                    <td>Přihlášení, bezpečnost, fungování stránky</td>
                                    <td>Relace / 1 rok</td>
                                    <td><span class="badge bg-success">Ano</span></td>
                                </tr>
                                <tr>
                                    <td>Google Analytics*</td>
                                    <td>Anonymní statistiky návštěvnosti</td>
                                    <td>2 roky</td>
                                    <td><span class="badge bg-warning">Ne</span></td>
                                </tr>
                                <tr>
                                    <td>Google Search Console*</td>
                                    <td>Optimalizace pro vyhledávače</td>
                                    <td>1 rok</td>
                                    <td><span class="badge bg-warning">Ne</span></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="small text-muted">* Plánujeme implementovat v budoucnu</p>
                    </div>

                    <h3 class="h5 mb-3">8.3 Správa cookies</h3>
                    <p>Cookies můžete kdykoliv spravovat v nastavení vašeho prohlížeče. Upozorňujeme však, že zakázání technických cookies může omezit funkcionalitu webu.</p>

                    <h2 class="text-primary mb-4 mt-5">9. Stížnosti a dohled</h2>
                    <p>Pokud se domníváte, že zpracováváme vaše osobní údaje v rozporu se zákonem, máte právo podat stížnost:</p>
                    
                    <div class="alert alert-info">
                        <h6 class="alert-heading"><i class="bi bi-building me-2"></i>Úřad pro ochranu osobních údajů</h6>
                        <ul class="mb-0">
                            <li><strong>Adresa:</strong> Pplk. Sochora 27, 170 00 Praha 7</li>
                            <li><strong>Web:</strong> <a href="https://www.uoou.cz" target="_blank" rel="noopener">www.uoou.cz</a></li>
                            <li><strong>E-mail:</strong> posta@uoou.cz</li>
                            <li><strong>Telefon:</strong> +420 234 665 111</li>
                        </ul>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">10. Změny těchto zásad</h2>
                    <p>Tyto zásady ochrany osobních údajů můžeme aktualizovat v případě změn našich služeb nebo právních požadavků. O významných změnách vás budeme informovat prostřednictvím e-mailu nebo oznámení na webu.</p>

                    <div class="alert alert-primary">
                        <h6 class="alert-heading"><i class="bi bi-info-circle me-2"></i>Máte dotaz?</h6>
                        <p class="mb-0">Pokud máte jakékoliv dotazy ohledně zpracování osobních údajů, neváhejte nás kontaktovat na <a href="mailto:gdpr@qrdoklad.cz">gdpr@qrdoklad.cz</a> nebo telefonicky na <a href="tel:+420703985390">+420 703 985 390</a>.</p>
                    </div>

                    <hr class="my-5">

                    <div class="text-center">
                        <p class="text-muted small mb-0">
                            <i class="bi bi-calendar-check me-2"></i>
                            Tyto zásady jsou platné od ';
		echo LR\Filters::escapeHtmlText(date('j. n. Y')) /* line 318 */;
		echo ' a jsou v souladu s GDPR a českými zákony.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
