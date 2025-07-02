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
		$form = $this->global->formsStack[] = $this->global->uiControl['contactForm'] /* line 55 */;
		Nette\Bridges\FormsLatte\Runtime::initializeForm($form);
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form, ['class' => 'contact-form']) /* line 55 */;
		echo '
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('name', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 59 */;
		echo 'Jméno a příjmení *';
		echo $ʟ_label?->endTag() /* line 59 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('name', $this->global)->getControl()->addAttributes(['class' => 'form-control', 'placeholder' => 'Váš celé jméno']) /* line 60 */;
		echo '
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 67 */;
		echo 'E-mailová adresa *';
		echo $ʟ_label?->endTag() /* line 67 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('email', $this->global)->getControl()->addAttributes(['class' => 'form-control', 'placeholder' => 'vas@email.cz']) /* line 68 */;
		echo '
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('company', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 75 */;
		echo 'Název firmy';
		echo $ʟ_label?->endTag() /* line 75 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('company', $this->global)->getControl()->addAttributes(['class' => 'form-control', 'placeholder' => 'Vaše firma s.r.o.']) /* line 76 */;
		echo '
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('phone', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 82 */;
		echo 'Telefon';
		echo $ʟ_label?->endTag() /* line 82 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('phone', $this->global)->getControl()->addAttributes(['class' => 'form-control', 'placeholder' => '+420 123 456 789']) /* line 83 */;
		echo '
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('subject', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 89 */;
		echo 'Předmět dotazu';
		echo $ʟ_label?->endTag() /* line 89 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('subject', $this->global)->getControl()->addAttributes(['class' => 'form-control']) /* line 90 */;
		echo '
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('message', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 97 */;
		echo 'Vaše zpráva *';
		echo $ʟ_label?->endTag() /* line 97 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('message', $this->global)->getControl()->addAttributes(['class' => 'form-control', 'placeholder' => 'Popište nám svůj dotaz nebo požadavek...']) /* line 98 */;
		echo '
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-check">
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('privacy', $this->global)->getControl()->addAttributes(['class' => 'form-check-input', 'id' => 'privacy']) /* line 105 */;
		echo '
                                    <label class="form-check-label" for="privacy">
                                        Souhlasím se <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:privacy')) /* line 107 */;
		echo '" target="_blank">zpracováním osobních údajů</a> 
                                        pro účely vyřízení tohoto dotazu.
                                    </label>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-submit">
                                    <div class="submit-buttons">
                                        ';
		echo Nette\Bridges\FormsLatte\Runtime::item('send', $this->global)->getControl()->addAttributes(['class' => 'btn btn-primary btn-lg me-3']) /* line 117 */;
		echo '
                                        <button type="button" class="btn btn-outline-secondary btn-lg" id="clearForm">
                                            <i class="bi bi-arrow-clockwise me-2"></i>Vyčistit formulář
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
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack)) /* line 129 */;

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
                                <small class="text-muted">Po-Pá: 8:00-17:00</small>
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
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:faq')) /* line 200 */;
		echo '" class="btn btn-outline-secondary">
                            <i class="bi bi-question-circle me-2"></i>Procházet FAQ
                        </a>
                        <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:help')) /* line 203 */;
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
                                <p>Ano, osobní schůzky jsou možné. Kontaktujte nás telefonicky nebo e-mailem 
                                a domluvíme si vhodný termín a místo setkání.</p>
                                <p>Nabízíme také online demo přes videohovor, které je často rychlejší a stejně efektivní.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Poskytujete technickou podporu?
                            </button>
                        </h3>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                <p>Ano, poskytujeme kompletní technickou podporu všem našim klientům. 
                                Podpora je dostupná e-mailem a telefonicky v pracovní době.</p>
                                <p>Pro uživatele pokročilých modulů nabízíme navíc prioritní podporu 
                                s rychlejší odezvou a individuální konzultace.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item">
                        <h3 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                Můžu si nechat předvést systém?
                            </button>
                        </h3>
                        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                <p>Samozřejmě! Nabízíme bezplatné online demo pro všechny zájemce. 
                                Stačí se ozvat a domluvíme si vhodný termín.</p>
                                <p>Demo trvá přibližně 30 minut a ukážeme vám všechny klíčové funkce systému.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA sekce -->
<section class="cta-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="cta-title">Připraveni začít s QRdokladem?</h2>
                <p class="cta-subtitle">
                    Připojte se k více než 1000 spokojeným podnikatelům, 
                    kteří již používají QRdoklad pro svou fakturaci.
                </p>
                <div class="cta-buttons">
                    <a href="#" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-person-plus me-2"></i>
                        Začít zdarma
                    </a>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:cenik')) /* line 309 */;
		echo '" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-eye me-2"></i>
                        Zobrazit ceník
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
