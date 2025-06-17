<?php

namespace App\Presentation\Landing;

use Nette\Application\UI\Presenter;
use Nette\Application\UI\Form;

class LandingPresenter extends Presenter
{
    /**
     * Hlavní prezentační stránka
     */
    public function renderDefault(): void
    {
        $this->template->pageTitle = 'QRdoklad - Moderní fakturační systém';
        $this->template->metaDescription = 'Profesionální fakturační systém s QR platbami, automatickým ARES vyhledáváním a pokročilými funkcemi pro vaše podnikání.';
    }

    /**
     * Stránka s funkcemi
     */
    public function renderFunkce(): void
    {
        $this->template->pageTitle = 'Funkce - QRdoklad';
        $this->template->metaDescription = 'Kompletní přehled všech funkcí fakturačního systému QRdoklad. Zjistěte, jak vám pomůžeme s vaší administrativou.';
    }

    /**
     * Stránka s cenami
     */
    public function renderCenik(): void
    {
        $this->template->pageTitle = 'Ceník - QRdoklad';
        $this->template->metaDescription = 'Transparentní ceník fakturačního systému QRdoklad. Vyberte si balíček podle velikosti vašeho podnikání.';
    }

    /**
     * Kontaktní stránka
     */
    public function renderKontakt(): void
    {
        $this->template->pageTitle = 'Kontakt - QRdoklad';
        $this->template->metaDescription = 'Kontaktujte nás ohledně fakturačního systému QRdoklad. Jsme tu pro vás a rádi odpovíme na všechny vaše otázky.';
    }

    /**
     * Kontaktní formulář
     */
    protected function createComponentContactForm(): Form
    {
        $form = new Form;

        $form->addText('name', 'Jméno a příjmení:')
            ->setRequired('Vyplňte prosím jméno a příjmení');

        $form->addEmail('email', 'E-mail:')
            ->setRequired('Vyplňte prosím e-mailovou adresu');

        $form->addText('company', 'Firma:');

        $form->addText('phone', 'Telefon:');

        $form->addSelect('subject', 'Předmět dotazu:', [
            '' => 'Vyberte předmět dotazu',
            'pricing' => 'Dotaz k ceníku',
            'features' => 'Dotaz k funkcím', 
            'technical' => 'Technická podpora',
            'demo' => 'Požadavek na demo',
            'enterprise' => 'Enterprise řešení',
            'other' => 'Ostatní'
        ]);

        $form->addTextArea('message', 'Zpráva:')
            ->setRequired('Napište nám zprávu')
            ->setHtmlAttribute('rows', 5)
            ->setHtmlAttribute('placeholder', 'Popište nám svůj dotaz nebo požadavek...');

        $form->addSubmit('send', 'Odeslat zprávu')
            ->setHtmlAttribute('class', 'btn btn-primary btn-lg');

        $form->onSuccess[] = [$this, 'contactFormSucceeded'];

        return $form;
    }

    public function contactFormSucceeded(Form $form, \stdClass $values): void
    {
        // Zde by byla logika pro odeslání e-mailu
        // Například: poslání na info@qrdoklad.cz
        // Můžete použít Nette\Mail\Mailer
        
        /*
        $mail = new Nette\Mail\Message;
        $mail->setFrom($values->email, $values->name)
            ->addTo('info@qrdoklad.cz')
            ->setSubject('Nový kontakt z webu: ' . ($values->subject ?: 'Obecný dotaz'))
            ->setBody("
                Jméno: {$values->name}
                E-mail: {$values->email}
                Firma: {$values->company}
                Telefon: {$values->phone}
                Předmět: {$values->subject}
                
                Zpráva:
                {$values->message}
            ");
            
        $mailer->send($mail);
        */
        
        $this->flashMessage('Vaše zpráva byla úspěšně odeslána. Brzy se vám ozveme!', 'success');
        $this->redirect('this');
    }
}