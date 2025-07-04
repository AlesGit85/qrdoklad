<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/kontakt.latte */
final class Template_4b4c77b837 extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/kontakt.latte';

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


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['flash' => '58'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '
<!-- Hero sekce pro kontakt -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Kontaktujte <span class="text-primary">nás</span>
                </h1>
                <p class="hero-subtitle">
                    Máte otázky nebo potřebujete pomoc s výběrem správného balíčku? 
                    Jsme tu pro vás a rádi vám poradíme.
                </p>
                <div class="contact-quick-info">
                    <div class="row g-3 justify-content-center">
                        <div class="col-auto">
                            <div class="quick-contact-item">
                                <i class="bi bi-telephone-fill"></i>
                                <span>+420 703 985 390</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="quick-contact-item">
                                <i class="bi bi-envelope-fill"></i>
                                <span>info@qrdoklad.cz</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="quick-contact-item">
                                <i class="bi bi-clock-fill"></i>
                                <span>Po-Pá: 8:00-17:00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hlavní kontaktní sekce -->
<section class="contact-section py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Kontaktní formulář -->
            <div class="col-lg-8">
                <div class="contact-form-card">
                    <h2 class="form-title">Napište nám zprávu</h2>
                    <p class="form-subtitle">
                        Vyplňte formulář a my se vám ozveme do 24 hodin. 
                        Pro rychlejší odpověď nás můžete kontaktovat přímo telefonicky.
                    </p>
                    
';
		if ($flashes) /* line 56 */ {
			echo '                        <div class="flash-messages mb-4">
';
			foreach ($flashes as $flash) /* line 58 */ {
				echo '                                <div class="alert alert-';
				echo LR\Filters::escapeHtmlAttr($flash->type === 'success' ? 'success' : ($flash->type === 'error' ? 'danger' : $flash->type)) /* line 59 */;
				echo ' alert-dismissible fade show" role="alert">
                                    <div class="d-flex align-items-start">
';
				if ($flash->type === 'success') /* line 61 */ {
					echo '                                            <i class="bi bi-check-circle-fill me-2 flex-shrink-0 mt-1"></i>
';
				} elseif ($flash->type === 'error') /* line 63 */ {
					echo '                                            <i class="bi bi-exclamation-triangle-fill me-2 flex-shrink-0 mt-1"></i>
';
				} elseif ($flash->type === 'info') /* line 65 */ {
					echo '                                            <i class="bi bi-info-circle-fill me-2 flex-shrink-0 mt-1"></i>
';
				} elseif ($flash->type === 'warning') /* line 67 */ {
					echo '                                            <i class="bi bi-exclamation-circle-fill me-2 flex-shrink-0 mt-1"></i>
';
				}



				echo '                                        <div class="flex-grow-1">
                                            ';
				echo $flash->message /* line 71 */;
				echo '
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Zavřít"></button>
                                </div>
';

			}

			echo '                        </div>
';
		}
		echo '                    
                    ';
		$form = $this->global->formsStack[] = $this->global->uiControl['contactForm'] /* line 80 */;
		Nette\Bridges\FormsLatte\Runtime::initializeForm($form);
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form, ['class' => 'contact-form']) /* line 80 */;
		echo '
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('name', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 84 */;
		echo 'Jméno a příjmení *';
		echo $ʟ_label?->endTag() /* line 84 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('name', $this->global)->getControl()->addAttributes(['class' => 'form-control', 'placeholder' => 'Váš celé jméno']) /* line 85 */;
		echo '
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 92 */;
		echo 'E-mailová adresa *';
		echo $ʟ_label?->endTag() /* line 92 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getControl()->addAttributes(['class' => 'form-control', 'placeholder' => 'vas@email.cz']) /* line 93 */;
		echo '
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('company', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 100 */;
		echo 'Název firmy';
		echo $ʟ_label?->endTag() /* line 100 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('company', $this->global)->getControl()->addAttributes(['class' => 'form-control', 'placeholder' => 'Vaše firma s.r.o.']) /* line 101 */;
		echo '
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('phone', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 107 */;
		echo 'Telefon';
		echo $ʟ_label?->endTag() /* line 107 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('phone', $this->global)->getControl()->addAttributes(['class' => 'form-control', 'placeholder' => '+420 123 456 789']) /* line 108 */;
		echo '
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('subject', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 114 */;
		echo 'Předmět dotazu';
		echo $ʟ_label?->endTag() /* line 114 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('subject', $this->global)->getControl()->addAttributes(['class' => 'form-control']) /* line 115 */;
		echo '
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('message', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 122 */;
		echo 'Vaše zpráva *';
		echo $ʟ_label?->endTag() /* line 122 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('message', $this->global)->getControl()->addAttributes(['class' => 'form-control', 'placeholder' => 'Popište nám svůj dotaz nebo požadavek...']) /* line 123 */;
		echo '
                                    <div class="invalid-feedback"></div>
                                    <div class="form-text">
                                        <span id="messageCounter">0</span> / 1000 znaků
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-check">
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('privacy', $this->global)->getControl()->addAttributes(['class' => 'form-check-input', 'id' => 'privacy']) /* line 134 */;
		echo '
                                    <label class="form-check-label" for="privacy">
                                        Souhlasím se <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:privacy')) /* line 136 */;
		echo '" target="_blank">zpracováním osobních údajů</a> 
                                        pro účely vyřízení tohoto dotazu.
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-submit">
                                    <div class="submit-buttons">
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('send', $this->global)->getControl()->addAttributes(['class' => 'btn btn-primary btn-lg me-3']) /* line 147 */;
		echo '
                                        <button type="button" class="btn btn-outline-secondary btn-lg" id="clearForm">
                                            <i class="bi bi-trash me-2"></i>Vyčistit formulář
                                        </button>
                                    </div>
                                    <p class="submit-info">
                                        <i class="bi bi-shield-check me-1"></i>
                                        Vaše údaje jsou chráněny SSL šifrováním
                                    </p>
                                </div>
                            </div>
                        </div>
                    ';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack)) /* line 159 */;

		echo '
                </div>
            </div>
            
            <!-- Kontaktní informace -->
            <div class="col-lg-4">
                <div class="contact-info-card">
                    <h3>Kontaktní informace</h3>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Adresa</h5>
                            <p>
                                QRdoklad<br>
                                Librantice 167<br>
                                503 46 Librantice<br>
                                Česká republika
                            </p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Telefon</h5>
                            <p>
                                <a href="tel:+420703985390" class="contact-link">+420 703 985 390</a><br>
                                <small class="text-muted">Po-Pá: 8:00-17:00</small>
                            </p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div class="contact-details">
                            <h5>E-mail</h5>
                            <p>
                                <a href="mailto:info@qrdoklad.cz" class="contact-link">info@qrdoklad.cz</a><br>
                                <small class="text-muted">Odpovídáme do 24 hodin</small>
                            </p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="bi bi-headset"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Online podpora</h5>
                            <p>
                                <a href="#" class="contact-link">Chat podpora</a><br>
                                <small class="text-muted">Po-Pá: 9:00-16:00</small>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Rychlé akce -->
                <div class="quick-actions-card mt-4">
                    <h4>Rychlé akce</h4>
                    <div class="d-grid gap-2">
                        <a href="tel:+420703985390" class="btn btn-outline-primary">
                            <i class="bi bi-telephone me-2"></i>Zavolat nyní
                        </a>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:faq')) /* line 230 */;
		echo '" class="btn btn-outline-secondary">
                            <i class="bi bi-question-circle me-2"></i>Procházet FAQ
                        </a>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:help')) /* line 233 */;
		echo '" class="btn btn-outline-secondary">
                            <i class="bi bi-book me-2"></i>Nápověda
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ pro kontakt -->
<section class="contact-faq-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Časté otázky o kontaktu</h2>
                <p class="section-subtitle">
                    Rychlé odpovědi na nejčastější dotazy týkající se kontaktu a podpory
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="contactFaq">
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Jak rychle odpovídáte na e-maily?
                            </button>
                        </h3>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                <p>Na e-mailové dotazy odpovídáme nejpozději do 24 hodin v pracovní dny. 
                                Většinou však stihneme odpovědět již do několika hodin.</p>
                                <p>Pro urgentní záležitosti doporučujeme telefonický kontakt v pracovní době.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Je možné domluvit si osobní schůzku?
                            </button>
                        </h3>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                <p>Ano, osobní schůzky jsou možné po předchozí domluvě. 
                                Kontaktujte nás telefonicky nebo e-mailem a domluvíme si termín, který vám vyhovuje.</p>
                                <p>Naše kancelář se nachází v Libranticích u Semil.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Nabízíte technickou podporu?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                <p>Ano, poskytujeme plnou technickou podporu všem našim zákazníkům. 
                                Pomůžeme vám s nastavením systému, importem dat i řešením technických problémů.</p>
                                <p>Základní podpora je zdarma, rozšířená podpora je dostupná v placených balíčcích.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Můžu vás kontaktovat o víkendu?
                            </button>
                        </h3>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                <p>E-maily můžete zasílat kdykoli, odpovídáme i o víkendech. 
                                Telefonická podpora je dostupná pouze v pracovní dny od 8:00 do 17:00.</p>
                                <p>Pro urgentní případy o víkendu použijte e-mailový kontakt s označením "URGENTNÍ".</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section">
    <div class="container">
        <div class="cta-card">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="cta-title">Připraveni začít s QRdoklad?</h2>
                    <p class="cta-subtitle">
                        Založte si účet zdarma a vyzkoušejte všechny funkce. 
                        Žádné závazky, zrušit můžete kdykoli.
                    </p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-primary btn-lg">
                        <i class="bi bi-rocket"></i> Registrace zdarma
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
