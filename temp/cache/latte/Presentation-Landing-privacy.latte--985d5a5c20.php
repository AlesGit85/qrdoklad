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
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

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
                    
                    <h2 class="text-primary mb-4">1. Základní informace</h2>
                    <p class="lead">
                        Správcem vašich osobních údajů je <strong>QRdoklad.cz</strong>, 
                        provozovatel webové stránky a fakturačního systému QRdoklad.
                    </p>
                    
                    <div class="alert alert-info">
                        <h5 class="alert-heading"><i class="bi bi-info-circle me-2"></i>Kontaktní údaje správce:</h5>
                        <ul class="mb-0">
                            <li><strong>E-mail:</strong> <a href="mailto:gdpr@qrdoklad.cz">gdpr@qrdoklad.cz</a></li>
                            <li><strong>Telefon:</strong> +420 703 985 390</li>
                            <li><strong>Adresa:</strong> Librantice 167, 503 46 Librantice</li>
                        </ul>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">2. Jaké údaje zpracováváme</h2>
                    
                    <h3 class="h5 mb-3">2.1 Údaje při registraci</h3>
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
                                        <li><i class="bi bi-circle text-muted me-2"></i>IČ, DIČ</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="h5 mb-3">2.2 Údaje při používání služby</h3>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item"><i class="bi bi-database text-primary me-2"></i>Data o vašich klientech (pouze ta, která sami zadáte)</li>
                        <li class="list-group-item"><i class="bi bi-file-earmark-text text-primary me-2"></i>Faktury a související dokumenty</li>
                        <li class="list-group-item"><i class="bi bi-globe text-primary me-2"></i>IP adresa a informace o prohlížeči</li>
                        <li class="list-group-item"><i class="bi bi-cookie text-primary me-2"></i>Cookies a podobné technologie</li>
                        <li class="list-group-item"><i class="bi bi-graph-up text-primary me-2"></i>Logy o používání aplikace</li>
                    </ul>

                    <h2 class="text-primary mb-4 mt-5">3. Proč zpracováváme vaše údaje</h2>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">Účel zpracování</th>
                                    <th scope="col">Právní základ</th>
                                    <th scope="col">Doba uchovávání</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="bi bi-gear text-primary me-2"></i>Poskytování fakturačních služeb</td>
                                    <td><span class="badge bg-success">Smlouva</span></td>
                                    <td>Po dobu trvání smlouvy</td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-file-earmark-pdf text-primary me-2"></i>Vystavování faktur a účetnictví</td>
                                    <td><span class="badge bg-info">Právní povinnost</span></td>
                                    <td>10 let</td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-headset text-primary me-2"></i>Zákaznická podpora</td>
                                    <td><span class="badge bg-warning">Oprávněný zájem</span></td>
                                    <td>3 roky</td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-envelope text-primary me-2"></i>Marketing (s vaším souhlasem)</td>
                                    <td><span class="badge bg-primary">Souhlas</span></td>
                                    <td>Do odvolání</td>
                                </tr>
                                <tr>
                                    <td><i class="bi bi-graph-up-arrow text-primary me-2"></i>Zlepšování služeb</td>
                                    <td><span class="badge bg-warning">Oprávněný zájem</span></td>
                                    <td>1 rok</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">4. Komu předáváme údaje</h2>
                    <p>Vaše osobní údaje můžeme předat následujícím třetím stranám:</p>
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="card border-primary">
                                <div class="card-header bg-primary text-white">
                                    <h6 class="mb-0"><i class="bi bi-credit-card me-2"></i>Platební služby</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text small">Pro zpracování plateb (PayU, Stripe, banky)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-success">
                                <div class="card-header bg-success text-white">
                                    <h6 class="mb-0"><i class="bi bi-cloud me-2"></i>Hosting služby</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text small">Pro bezpečné uložení dat (EU servery)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-info">
                                <div class="card-header bg-info text-white">
                                    <h6 class="mb-0"><i class="bi bi-graph-up me-2"></i>Analytické služby</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text small">Pro zlepšování služeb (anonymizovaně)</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-warning">
                                <div class="card-header bg-warning text-dark">
                                    <h6 class="mb-0"><i class="bi bi-shield-check me-2"></i>Státní orgány</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text small">Na základě právních povinností</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">5. Vaše práva</h2>
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
                    </div>

                    <h2 class="text-primary mb-4 mt-5">6. Zabezpečení údajů</h2>
                    <p>Implementovali jsme odpovídající technická a organizační opatření pro ochranu vašich osobních údajů:</p>
                    
                    <div class="accordion" id="securityAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="securityTech">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTech">
                                    <i class="bi bi-shield-lock text-primary me-2"></i>Technická opatření
                                </button>
                            </h2>
                            <div id="collapseTech" class="accordion-collapse collapse show" data-bs-parent="#securityAccordion">
                                <div class="accordion-body">
                                    <ul>
                                        <li>SSL/TLS šifrování pro všechny přenosy dat</li>
                                        <li>Šifrování databází a citlivých údajů</li>
                                        <li>Pravidelné bezpečnostní audity</li>
                                        <li>Firewall a ochrana proti útokům</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="securityOrg">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOrg">
                                    <i class="bi bi-people text-primary me-2"></i>Organizační opatření
                                </button>
                            </h2>
                            <div id="collapseOrg" class="accordion-collapse collapse" data-bs-parent="#securityAccordion">
                                <div class="accordion-body">
                                    <ul>
                                        <li>Omezený přístup k osobním údajům</li>
                                        <li>Pravidelná školení o ochraně údajů</li>
                                        <li>Pravidelné zálohy a disaster recovery plány</li>
                                        <li>Monitoring a logování přístupů</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">7. Cookies</h2>
                    <div class="alert alert-warning">
                        <h5 class="alert-heading"><i class="bi bi-cookie me-2"></i>Používání cookies</h5>
                        <p>Používáme cookies pro správné fungování webu a služby. Cookies nám pomáhají:</p>
                        <ul class="mb-0">
                            <li>Zapamatovat si vaše přihlášení</li>
                            <li>Analyzovat návštěvnost webu</li>
                            <li>Zlepšovat uživatelskou zkušenost</li>
                        </ul>
                    </div>

                    <h2 class="text-primary mb-4 mt-5">8. Změny tohoto dokumentu</h2>
                    <p>
                        Tyto zásady můžeme aktualizovat. O významných změnách vás budeme 
                        informovat e-mailem nebo oznámením v aplikaci.
                    </p>

                    <h2 class="text-primary mb-4 mt-5">9. Kontakt a stížnosti</h2>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="bi bi-envelope text-primary me-2"></i>Máte dotazy?</h5>
                                    <p class="card-text">Kontaktujte nás ohledně zpracování osobních údajů</p>
                                    <a href="mailto:gdpr@qrdoklad.cz" class="btn btn-primary">
                                        <i class="bi bi-envelope me-2"></i>gdpr@qrdoklad.cz
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h5 class="card-title"><i class="bi bi-exclamation-triangle text-warning me-2"></i>Stížnost</h5>
                                    <p class="card-text">Můžete podat stížnost u dozorového orgánu</p>
                                    <a href="https://www.uoou.cz" target="_blank" rel="noopener" class="btn btn-outline-warning">
                                        <i class="bi bi-link-45deg me-2"></i>www.uoou.cz
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-section mt-5 p-4 bg-primary bg-opacity-10 rounded">
                        <div class="text-center">
                            <h3 class="text-primary">Máte další dotazy?</h3>
                            <p class="mb-3">
                                Pokud máte jakékoliv dotazy k ochraně osobních údajů, 
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
