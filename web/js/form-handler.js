/**
 * Form Handler - Kontaktní formulář s auto-save a validací
 * Obsahuje funkci "Vyčistit formulář"
 */

/*
==================================
UTILITY FUNKCE
==================================
*/
const FormUtils = {
    validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    },

    formatPhoneNumber(phone) {
        // Formátování českého telefonu
        const cleaned = phone.replace(/\D/g, '');
        if (cleaned.length === 9 && cleaned.startsWith('7')) {
            return '+420 ' + cleaned.substring(0, 3) + ' ' + cleaned.substring(3, 6) + ' ' + cleaned.substring(6);
        }
        return phone;
    },

    getRandomId() {
        return Math.random().toString(36).substring(2, 15);
    }
};

/*
==================================
CONTACT FORM MODULE
==================================
*/
const ContactForm = {
    form: null,
    fields: {},
    submitButton: null,
    clearButton: null,

    init() {
        console.log('ContactForm - hledám formulář...');

        // Hledáme formulář podle různých možných selektorů
        this.form = document.querySelector('.contact-form') ||
            document.querySelector('#contactForm') ||
            document.querySelector('form[data-form="contact"]');

        if (!this.form) {
            console.log('ContactForm - formulář nenalezen na této stránce');
            return;
        }

        console.log('ContactForm - formulář nalezen, inicializuji...');
        this.initFields();
        this.bindEvents();
        this.initAutoSave();
        this.addFormStyles();

        // NOVÉ: Vyčištění formuláře při úspěšném odeslání
        this.checkForSuccessMessage();

        console.log('ContactForm - inicializace dokončena');
    },

    initFields() {
        // Mapování polí formuláře
        this.fields = {
            name: this.form.querySelector('input[name="name"], input[name="jmeno"]'),
            email: this.form.querySelector('input[name="email"], input[name="email"]'),
            company: this.form.querySelector('input[name="company"], input[name="spolecnost"]'),
            phone: this.form.querySelector('input[name="phone"], input[name="telefon"]'),
            subject: this.form.querySelector('select[name="subject"], select[name="predmet"]'),
            message: this.form.querySelector('textarea[name="message"], textarea[name="zprava"]'),
            privacy: this.form.querySelector('#privacy, input[name="privacy"], input[name="souhlas"]')
        };

        this.submitButton = this.form.querySelector('input[type="submit"], button[type="submit"]');
        this.clearButton = document.getElementById('clearForm');

        console.log('ContactForm - nalezená pole:', {
            name: !!this.fields.name,
            email: !!this.fields.email,
            company: !!this.fields.company,
            phone: !!this.fields.phone,
            subject: !!this.fields.subject,
            message: !!this.fields.message,
            privacy: !!this.fields.privacy,
            submitButton: !!this.submitButton,
            clearButton: !!this.clearButton
        });
    },

    bindEvents() {
        // Submit událost - OPRAVENO: Nyní povolit skutečné odeslání
        if (this.submitButton) {
            this.form.addEventListener('submit', (e) => {
                e.preventDefault(); // Zabrání výchozímu odeslání
                this.handleSubmit(e); // Nejdříve validace
            });
        }

        // NOVÉ - Clear formulář událost
        if (this.clearButton) {
            this.clearButton.addEventListener('click', (e) => {
                e.preventDefault();
                this.handleClearForm();
            });
        }

        // Validace při opuštění pole
        Object.entries(this.fields).forEach(([name, field]) => {
            if (field && name !== 'privacy') {
                field.addEventListener('blur', () => this.validateField(name));
                field.addEventListener('input', () => this.clearFieldError(name));
            }
        });

        // Validace checkboxu
        if (this.fields.privacy) {
            this.fields.privacy.addEventListener('change', () => {
                this.validateField('privacy');
            });
        }

        // Character counter pro zprávu
        if (this.fields.message) {
            this.initCharacterCounter();
        }
    },

    // OPRAVENO: Nyní skutečně odešle formulář po validaci
    handleSubmit(originalEvent) {
        console.log('ContactForm - pokus o odeslání formuláře');
        this.trackEvent('form_submit_attempt', 'contact', 'contact_form');

        // Nejdříve frontend validace
        if (!this.validateForm()) {
            this.trackEvent('form_submit_error', 'contact', 'validation_failed');
            this.showNotification(
                '❌ Prosím opravte chyby ve formuláři před odesláním',
                'error',
                5000
            );
            return false; // Zabrání odeslání
        }

        // Pokud je validace OK, zobrazíme loading a odešleme skutečně
        this.showLoading(this.submitButton, 'Odesílám zprávu...');
        this.trackEvent('form_submit_success', 'contact', 'contact_form');

        // Vyčištění auto-save dat (formulář se odešle)
        this.clearAutoSaveData();

        // Nyní skutečně odešleme formulář přes Nette
        // Odstraníme event listener, aby se zabránilo nekonečné smyčce
        this.form.removeEventListener('submit', arguments.callee);

        // Odešleme formulář normálně
        setTimeout(() => {
            this.form.submit();
        }, 500); // Krátké zpoždění pro zobrazení loading stavu

        return true;
    },

    // Character counter pro textarea
    initCharacterCounter() {
        const messageField = this.fields.message;
        const maxLength = 1000;

        // Najdeme nebo vytvoříme counter element
        let counter = messageField.parentNode.querySelector('.character-counter');
        if (!counter) {
            // Pokusíme se najít pomocí ID
            counter = document.getElementById('messageCounter');
            if (!counter) {
                // Vytvoříme nový counter
                counter = document.createElement('div');
                counter.className = 'form-text character-counter';
                counter.id = 'messageCounter';
                messageField.parentNode.appendChild(counter);
            }
        }

        // Inicializace hodnoty
        this.updateCharacterCounter();

        // Event listener
        messageField.addEventListener('input', () => {
            this.updateCharacterCounter();
        });
    },

    updateCharacterCounter() {
        const messageField = this.fields.message;
        const counter = document.getElementById('messageCounter') ||
            messageField.parentNode.querySelector('.character-counter');

        if (!counter || !messageField) return;

        const currentLength = messageField.value.length;
        const maxLength = 1000;

        counter.innerHTML = `<span class="current-count">${currentLength}</span> / ${maxLength} znaků`;

        // Barevné označení podle délky
        if (currentLength > maxLength * 0.9) {
            counter.style.color = '#dc3545'; // Červená
        } else if (currentLength > maxLength * 0.7) {
            counter.style.color = '#fd7e14'; // Oranžová
        } else {
            counter.style.color = '#6c757d'; // Šedá
        }
    },

    // NOVÁ funkce - Vyčištění formuláře s potvrzením
    handleClearForm() {
        // Kontrola, zda jsou nějaká data vyplněná
        const hasData = this.hasAnyData();

        if (!hasData) {
            this.showNotification(
                'ℹ️ Formulář je již prázdný',
                'info',
                3000
            );
            return;
        }

        // Potvrzovací dialog
        if (confirm('Opravdu chcete vyčistit celý formulář? Všechna vyplněná data budou ztracena.')) {
            this.clearFormData();
            this.showNotification(
                '✅ Formulář byl vyčištěn',
                'success',
                3000
            );
            console.log('ContactForm - formulář vyčištěn uživatelem');
        }
    },

    // NOVÁ funkce - Kontrola, zda jsou nějaká data
    hasAnyData() {
        return Object.entries(this.fields).some(([name, field]) => {
            if (!field) return false;

            if (name === 'privacy') {
                return field.checked;
            } else if (field.type === 'select-one') {
                return field.value !== '';
            } else {
                return field.value.trim() !== '';
            }
        });
    },

    // NOVÁ funkce - Vyčištění dat formuláře
    clearFormData() {
        // Reset formuláře
        this.form.reset();

        // Vyčištění všech polí individuálně (pro jistotu)
        Object.entries(this.fields).forEach(([name, field]) => {
            if (!field) return;

            if (name === 'privacy') {
                field.checked = false;
            } else if (field.type === 'select-one') {
                field.selectedIndex = 0;
            } else {
                field.value = '';
            }
        });

        // Odstranění validation stavů
        this.form.querySelectorAll('.form-control').forEach(input => {
            input.classList.remove('is-valid', 'is-invalid');
        });

        // Reset character counteru
        this.updateCharacterCounter();

        // Vyčištění auto-save dat z localStorage
        this.clearAutoSaveData();

        // Focus na první pole
        if (this.fields.name) {
            this.fields.name.focus();
        }
    },

    // NOVÁ funkce - Vyčištění auto-save dat
    clearAutoSaveData() {
        try {
            localStorage.removeItem('qrdoklad_contact_form_v2');
            console.log('ContactForm - auto-save data vyčištěna');
        } catch (e) {
            console.log('Chyba při mazání auto-save dat:', e);
        }
    },

    // Validace jednotlivých polí
    validateField(fieldName) {
        const field = this.fields[fieldName];
        if (!field) return true;

        let isValid = true;
        let errorMessage = '';

        // Vyčištění předchozích stavů
        this.clearFieldError(fieldName);

        switch (fieldName) {
            case 'name':
                if (!field.value.trim()) {
                    isValid = false;
                    errorMessage = 'Vyplňte prosím jméno a příjmení';
                } else if (field.value.trim().length < 2) {
                    isValid = false;
                    errorMessage = 'Jméno musí mít alespoň 2 znaky';
                } else if (field.value.trim().length > 100) {
                    isValid = false;
                    errorMessage = 'Jméno je příliš dlouhé (max. 100 znaků)';
                }
                break;

            case 'email':
                if (!field.value.trim()) {
                    isValid = false;
                    errorMessage = 'Vyplňte prosím e-mailovou adresu';
                } else if (!FormUtils.validateEmail(field.value.trim())) {
                    isValid = false;
                    errorMessage = 'Zadejte prosím platnou e-mailovou adresu';
                }
                break;

            case 'company':
                // Volitelné pole - validace jen pokud je vyplněné
                if (field.value.trim() && field.value.trim().length > 100) {
                    isValid = false;
                    errorMessage = 'Název firmy je příliš dlouhý (max. 100 znaků)';
                }
                break;

            case 'phone':
                // Volitelné pole - validace jen pokud je vyplněné
                if (field.value.trim()) {
                    const cleaned = field.value.replace(/\D/g, '');
                    if (cleaned.length < 9 || cleaned.length > 15) {
                        isValid = false;
                        errorMessage = 'Zadejte prosím platné telefonní číslo';
                    }
                }
                break;

            case 'subject':
                if (!field.value) {
                    isValid = false;
                    errorMessage = 'Vyberte prosím předmět dotazu';
                }
                break;

            case 'message':
                if (!field.value.trim()) {
                    isValid = false;
                    errorMessage = 'Napište prosím svou zprávu';
                } else if (field.value.trim().length < 10) {
                    isValid = false;
                    errorMessage = 'Zpráva je příliš krátká (min. 10 znaků)';
                } else if (field.value.trim().length > 1000) {
                    isValid = false;
                    errorMessage = 'Zpráva je příliš dlouhá (max. 1000 znaků)';
                }
                break;

            case 'privacy':
                if (!field.checked) {
                    isValid = false;
                    errorMessage = 'Musíte souhlasit se zpracováním osobních údajů';
                }
                break;
        }

        if (isValid) {
            this.showFieldSuccess(fieldName);
        } else {
            this.showFieldError(fieldName, errorMessage);
        }

        return isValid;
    },

    showFieldError(fieldName, message) {
        const field = this.fields[fieldName];
        if (!field) return;

        field.classList.add('is-invalid');
        field.classList.remove('is-valid');

        const errorDiv = field.parentNode.querySelector('.invalid-feedback');
        if (errorDiv) {
            errorDiv.textContent = message;
        }
    },

    showFieldSuccess(fieldName) {
        const field = this.fields[fieldName];
        if (!field) return;

        field.classList.add('is-valid');
        field.classList.remove('is-invalid');
    },

    clearFieldError(fieldName) {
        const field = this.fields[fieldName];
        if (!field) return;

        field.classList.remove('is-invalid', 'is-valid');
    },

    validateForm() {
        console.log('ContactForm - validace celého formuláře');

        let isValid = true;
        const errors = [];

        // Validace povinných polí
        const requiredFields = ['name', 'email', 'subject', 'message'];
        requiredFields.forEach(fieldName => {
            if (!this.validateField(fieldName)) {
                isValid = false;
                errors.push(fieldName);
            }
        });

        // Validace volitelných polí (pokud jsou vyplněné)
        const optionalFields = ['company', 'phone'];
        optionalFields.forEach(fieldName => {
            if (this.fields[fieldName] && this.fields[fieldName].value.trim()) {
                if (!this.validateField(fieldName)) {
                    isValid = false;
                    errors.push(fieldName);
                }
            }
        });

        // Kontrola souhlasu s GDPR
        if (this.fields.privacy && !this.fields.privacy.checked) {
            this.showNotification(
                '⚠️ Prosím potvrďte souhlas se zpracováním osobních údajů',
                'error',
                6000
            );
            this.fields.privacy.focus();
            isValid = false;
            errors.push('privacy');
        }

        // Pokud jsou chyby, focusni první chybné pole
        if (!isValid && errors.length > 0) {
            const firstErrorField = this.fields[errors[0]];
            if (firstErrorField) {
                firstErrorField.focus();
            }
        }

        return isValid;
    },

    // Auto-save funkcionality
    initAutoSave() {
        // Načtení uložených dat
        this.loadSavedData();

        // Auto-save při změnách
        Object.entries(this.fields).forEach(([name, field]) => {
            if (field) {
                field.addEventListener('input', () => {
                    setTimeout(() => this.saveFormData(), 500);
                });
                field.addEventListener('change', () => {
                    this.saveFormData();
                });
            }
        });
    },

    loadSavedData() {
        try {
            const saved = localStorage.getItem('qrdoklad_contact_form_v2');
            if (!saved) return;

            const data = JSON.parse(saved);

            Object.entries(data).forEach(([name, value]) => {
                const field = this.fields[name];
                if (field && value !== null && value !== undefined) {
                    if (name === 'privacy') {
                        field.checked = value;
                    } else {
                        field.value = value;
                    }
                }
            });

            console.log('ContactForm - načtena uložená data');
        } catch (e) {
            console.log('Chyba při načítání auto-save dat:', e);
        }
    },

    saveFormData() {
        try {
            const data = {};
            Object.entries(this.fields).forEach(([name, field]) => {
                if (field) {
                    if (name === 'privacy') {
                        data[name] = field.checked;
                    } else {
                        data[name] = field.value;
                    }
                }
            });

            localStorage.setItem('qrdoklad_contact_form_v2', JSON.stringify(data));
        } catch (e) {
            console.log('Chyba při ukládání auto-save dat:', e);
        }
    },

    // Notifikace a UI efekty
    showNotification(message, type = 'info', duration = 5000) {
        // Jednoduchá notifikace
        const notification = document.createElement('div');
        notification.className = `alert alert-${type === 'error' ? 'danger' : type} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 400px;';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, duration);
    },

    showLoading(element, text = 'Načítání...') {
        if (!element) return;
        element.disabled = true;
        element.dataset.originalText = element.textContent || element.value;

        if (element.tagName === 'INPUT') {
            element.value = text;
        } else {
            element.innerHTML = `<i class="bi bi-arrow-clockwise spin me-2"></i>${text}`;
        }

        element.classList.add('loading');
    },

    trackEvent(action, category, label) {
        // Google Analytics tracking (pokud je GA inicializovaný)
        if (typeof gtag !== 'undefined') {
            gtag('event', action, {
                event_category: category,
                event_label: label
            });
        }
        console.log(`Event tracked: ${action} - ${category} - ${label}`);
    },

    addFormStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .contact-form .loading {
                opacity: 0.8;
                cursor: not-allowed;
                background-color: #95B11F !important;
                border-color: #95B11F !important;
                color: #212529 !important;
            }
            
            .contact-form .success {
                background-color: #B1D235 !important;
                border-color: #B1D235 !important;
                color: #212529 !important;
            }
            
            .contact-form .spin {
                animation: spin 1s linear infinite;
            }
            
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
            
            .submit-buttons {
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
                margin-bottom: 1rem;
            }
            
            .character-counter {
                font-size: 0.875rem;
                margin-top: 0.25rem;
            }
            
            .current-count {
                font-weight: 600;
            }
            
            @media (max-width: 576px) {
                .submit-buttons {
                    flex-direction: column;
                }
                
                .submit-buttons .btn {
                    width: 100%;
                    margin: 0 0 0.5rem 0 !important;
                }
            }
        `;
        document.head.appendChild(style);
    },

    // Kontrola úspěšné zprávy a vyčištění formuláře
    checkForSuccessMessage() {
        // Kontrola existence úspěšné flash zprávy
        const successAlert = document.querySelector('.alert-success');
        if (successAlert) {
            console.log('ContactForm - detekována úspěšná flash zpráva, čistím formulář...');

            // Vyčištění formuláře po úspěšném odeslání (tichý režim)
            setTimeout(() => {
                this.clearFormData();
            }, 1000); // Krátké zpoždění pro lepší UX
        }
    }
};

// Inicializace při načtení DOM
document.addEventListener('DOMContentLoaded', () => {
    ContactForm.init();
});