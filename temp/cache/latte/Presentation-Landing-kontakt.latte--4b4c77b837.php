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
                                <span>+420 123 456 789</span>
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
                                    <label class="form-label">Předmět dotazu</label>
                                    <select class="form-control" name="subject">
                                        <option value="">Vyberte předmět dotazu</option>
                                        <option value="pricing">Dotaz k ceníku</option>
                                        <option value="features">Dotaz k funkcím</option>
                                        <option value="technical">Technická podpora</option>
                                        <option value="demo">Požadavek na demo</option>
                                        <option value="enterprise">Enterprise řešení</option>
                                        <option value="other">Ostatní</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    ';
		echo ($ʟ_label = Nette\Bridges\FormsLatte\Runtime::item('message', $this->global)->getLabel())?->addAttributes(['class' => 'form-label'])?->startTag() /* line 104 */;
		echo 'Vaše zpráva *';
		echo $ʟ_label?->endTag() /* line 104 */;
		echo '
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('message', $this->global)->getControl()->addAttributes(['class' => 'form-control', 'placeholder' => 'Popište nám svůj dotaz nebo požadavek...']) /* line 105 */;
		echo '
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="privacy" required>
                                    <label class="form-check-label" for="privacy">
                                        Souhlasím se <a href="#" target="_blank">zpracováním osobních údajů</a> 
                                        pro účely vyřízení tohoto dotazu. *
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-submit">
                                    ';
		echo Nette\Bridges\FormsLatte\Runtime::item('send', $this->global)->getControl()->addAttributes(['class' => 'btn btn-primary btn-lg']) /* line 122 */;
		echo '
                                    <p class="submit-info">
                                        <i class="bi bi-shield-check me-1"></i>
                                        Vaše údaje jsou chráněny SSL šifrováním
                                    </p>
                                </div>
                            </div>
                        </div>
                    ';
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack)) /* line 130 */;

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
                                QRdoklad s.r.o.<br>
                                Hlavní 123<br>
                                110 00 Praha 1<br>
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
                                <a href="tel:+420123456789">+420 123 456 789</a><br>
                                <small>Po-Pá: 8:00-17:00</small>
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
                                <a href="mailto:info@qrdoklad.cz">info@qrdoklad.cz</a><br>
                                <a href="mailto:podpora@qrdoklad.cz">podpora@qrdoklad.cz</a>
                            </p>
                        </div>
                    </div>
                    
                    <div class="contact-info-item">
                        <div class="contact-icon">
                            <i class="bi bi-chat-dots-fill"></i>
                        </div>
                        <div class="contact-details">
                            <h5>Online chat</h5>
                            <p>
                                Dostupný v aplikaci<br>
                                <small>Po-Pá: 8:00-17:00</small>
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Rychlé akce -->
                <div class="quick-actions-card">
                    <h4>Rychlé akce</h4>
                    
                    <a href="https://app.qrdoklad.cz/sign/up" class="quick-action-btn">
                        <i class="bi bi-rocket-takeoff"></i>
                        <div>
                            <h6>Vyzkoušet zdarma</h6>
                            <small>30 dní bez omezení</small>
                        </div>
                    </a>
                    
                    <a href="#" class="quick-action-btn">
                        <i class="bi bi-play-circle"></i>
                        <div>
                            <h6>Rezervovat demo</h6>
                            <small>Osobní prezentace online</small>
                        </div>
                    </a>
                    
                    <a href="#" class="quick-action-btn">
                        <i class="bi bi-file-earmark-text"></i>
                        <div>
                            <h6>Stáhnout materiály</h6>
                            <small>Prezentace a manuály</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mapa nebo alternativní sekce -->
<section class="map-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Najdete nás v centru Prahy</h2>
                <p class="section-subtitle">
                    Naše kanceláře se nacházejí v centru Prahy s výbornou dostupností MHD. 
                    Osobní schůzky možné po předchozí domluvě.
                </p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="map-container">
                    <!-- Placeholder pro mapu -->
                    <div class="map-placeholder">
                        <i class="bi bi-geo-alt-fill"></i>
                        <h4>Interaktivní mapa</h4>
                        <p>Hlavní 123, Praha 1</p>
                        <a href="https://maps.google.com/?q=Praha+1" target="_blank" class="btn btn-primary">
                            <i class="bi bi-map me-2"></i>
                            Otevřít v Google Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ pro kontakt -->
<section class="contact-faq-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="section-title">Nejčastější dotazy</h2>
                <p class="section-subtitle">
                    Odpovědi na otázky, které nám pokládáte nejčastěji
                </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="faq-item">
                            <div class="faq-icon">
                                <i class="bi bi-clock"></i>
                            </div>
                            <h5>Jak rychle dostanu odpověď?</h5>
                            <p>Na e-maily odpovídáme do 24 hodin, telefonicky jsme k dispozici okamžitě v pracovní době.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="faq-item">
                            <div class="faq-icon">
                                <i class="bi bi-calendar-check"></i>
                            </div>
                            <h5>Můžu si domluvit osobní schůzku?</h5>
                            <p>Ano, osobní schůzky jsou možné po předchozí domluvě v našich pražských kancelářích.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="faq-item">
                            <div class="faq-icon">
                                <i class="bi bi-headset"></i>
                            </div>
                            <h5>Jaká je dostupnost podpory?</h5>
                            <p>Základní podpora je dostupná Po-Pá 8:00-17:00. Business zákazníci mají prioritní podporu.</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="faq-item">
                            <div class="faq-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h5>Jsou moje údaje v bezpečí?</h5>
                            <p>Ano, všechny údaje jsou chráněny SSL šifrováním a zpracovávány v souladu s GDPR.</p>
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
                <h2 class="cta-title">Neváhejte nás kontaktovat</h2>
                <p class="cta-subtitle">
                    Jsme tu pro vás a rádi odpovíme na všechny vaše otázky. 
                    Nebo si rovnou vyzkoušejte QRdoklad zdarma.
                </p>
                <div class="cta-buttons">
                    <a href="https://app.qrdoklad.cz/sign/up" class="btn btn-light btn-lg me-3">
                        <i class="bi bi-rocket-takeoff me-2"></i>
                        Začít zdarma
                    </a>
                    <a href="tel:+420123456789" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-telephone me-2"></i>
                        Zavolat nyní
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

';
	}
}
