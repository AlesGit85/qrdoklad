/**
 * Form Handler - Kontaktní formulář s auto-save a validací
 * Obsahuje funkci "Vyčistit formulář"
 * 
 * Barvy projektu:
 * - Primární: #B1D235
 * - Sekundární: #95B11F  
 * - Šedá: #6c757d
 * - Černá: #212529
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
            document.querySelector('form[data-form="contact"]') ||
            document.querySelector('form[id^="frm-"]'); // Nette formy

        if (!this.form) {
            console.log('ContactForm - formulář nenalezen na této stránce');
            return;
        }

        console.log('ContactForm - formulář nalezen, inicializuji...');
        this.initFields();
        this.bindEvents();
        this.initAutoSave();
        this.addFormStyles();
        this.checkForSuccessMessage();

        console.log('ContactForm - inicializace dokončena');
    },

    initFields() {
        // Mapování polí formuláře (včetně Nette convention)
        this.fields = {
            name: this.form.querySelector('input[name="name"], input[name="jmeno"]'),
            email: this.form.querySelector('input[name="email"]'),
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
        // Submit událost
        if (this.submitButton) {
            this.form.addEventListener('submit', (e) => {
                e.preventDefault();
                this.handleSubmit(e);
            });
        }

        // Clear formulář událost
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

    handleSubmit(originalEvent) {
        console.log('ContactForm - pokus o odeslání formuláře');
        this.trackEvent('form_submit_attempt', 'contact', 'contact_form');

        // Frontend validace
        if (!this.validateForm()) {
            this.trackEvent('form_submit_error', 'contact', 'validation_failed');
            this.showNotification(
                '❌ Prosím opravte chyby ve formuláři před odesláním',
                'error',
                5000
            );
            return false;
        }

        // Pokud je validace OK
        this.showLoading(this.submitButton, 'Odesílám zprávu...');
        this.trackEvent('form_submit_success', 'contact', 'contact_form');
        this.clearAutoSaveData();

        // Skutečné odeslání formuláře
        setTimeout(() => {
            this.form.removeEventListener('submit', arguments.callee);
            this.form.submit();
        }, 500);

        return true;
    },

    handleClearForm() {
        if (!this.hasAnyData()) {
            this.showNotification(
                'ℹ️ Formulář je již prázdný',
                'info',
                3000
            );
            return;
        }

        if (confirm('Opravdu chcete vyčistit celý formulář?\n\nVšechna vyplněná data budou ztracena.')) {
            this.clearFormData();
            this.showNotification(
                '✅ Formulář byl vyčištěn',
                'success',
                3000
            );
            console.log('ContactForm - formulář vyčištěn uživatelem');
        }
    },

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

    clearFormData() {
        this.form.reset();

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

        this.form.querySelectorAll('.form-control').forEach(input => {
            input.classList.remove('is-valid', 'is-invalid');
        });

        this.updateCharacterCounter();
        this.clearAutoSaveData();

        if (this.fields.name) {
            this.fields.name.focus();
        }
    },

    validateField(fieldName) {
        const field = this.fields[fieldName];
        if (!field) return true;

        let isValid = true;
        let errorMessage = '';

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
                if (field.value.trim() && field.value.trim().length > 100) {
                    isValid = false;
                    errorMessage = 'Název firmy je příliš dlouhý (max. 100 znaků)';
                }
                break;

            case 'phone':
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

    validateForm() {
        console.log('ContactForm - validace celého formuláře');

        let isValid = true;
        const errors = [];

        const requiredFields = ['name', 'email', 'subject', 'message'];
        requiredFields.forEach(fieldName => {
            if (!this.validateField(fieldName)) {
                isValid = false;
                errors.push(fieldName);
            }
        });

        const optionalFields = ['company', 'phone'];
        optionalFields.forEach(fieldName => {
            if (this.fields[fieldName] && this.fields[fieldName].value.trim()) {
                if (!this.validateField(fieldName)) {
                    isValid = false;
                    errors.push(fieldName);
                }
            }
        });

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

        if (!isValid && errors.length > 0) {
            const firstErrorField = this.fields[errors[0]];
            if (firstErrorField) {
                firstErrorField.focus();
            }
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

    // Character counter pro textarea
    initCharacterCounter() {
        const messageField = this.fields.message;
        const maxLength = 1000;

        let counter = messageField.parentNode.querySelector('.character-counter');
        if (!counter) {
            counter = document.getElementById('messageCounter');
            if (!counter) {
                counter = document.createElement('div');
                counter.className = 'form-text character-counter';
                counter.id = 'messageCounter';
                messageField.parentNode.appendChild(counter);
            }
        }

        this.characterCounter = counter;

        messageField.addEventListener('input', () => {
            this.updateCharacterCounter();
        });

        this.updateCharacterCounter();
    },

    updateCharacterCounter() {
        if (!this.characterCounter || !this.fields.message) return;

        const current = this.fields.message.value.length;
        const max = 1000;
        const remaining = max - current;

        this.characterCounter.innerHTML = `
            <span class="current-count ${remaining < 50 ? 'text-warning' : ''} ${remaining < 0 ? 'text-danger' : ''}">
                ${current}
            </span> / ${max} znaků
            ${remaining < 0 ? '<span class="text-danger ms-2">Překročen limit!</span>' : ''}
        `;
    },

    // Auto-save funkcionality
    initAutoSave() {
        this.loadSavedData();

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

    saveFormData() {
        try {
            const formData = {};
            Object.entries(this.fields).forEach(([name, field]) => {
                if (field) {
                    if (name === 'privacy') {
                        formData[name] = field.checked;
                    } else {
                        formData[name] = field.value;
                    }
                }
            });

            formData.timestamp = Date.now();
            localStorage.setItem('qrdoklad_contact_form_v2', JSON.stringify(formData));
        } catch (e) {
            console.log('Chyba při ukládání auto-save dat:', e);
        }
    },

    loadSavedData() {
        try {
            const saved = localStorage.getItem('qrdoklad_contact_form_v2');
            if (!saved) return;

            const formData = JSON.parse(saved);
            
            // Kontrola stáří dat (max 7 dní)
            if (Date.now() - formData.timestamp > 7 * 24 * 60 * 60 * 1000) {
                this.clearAutoSaveData();
                return;
            }

            Object.entries(this.fields).forEach(([name, field]) => {
                if (field && formData[name] !== undefined) {
                    if (name === 'privacy') {
                        field.checked = formData[name];
                    } else {
                        field.value = formData[name];
                    }
                }
            });

            this.updateCharacterCounter();
            console.log('ContactForm - auto-save data načtena');

        } catch (e) {
            console.log('Chyba při načítání auto-save dat:', e);
            this.clearAutoSaveData();
        }
    },

    clearAutoSaveData() {
        try {
            localStorage.removeItem('qrdoklad_contact_form_v2');
            console.log('ContactForm - auto-save data vyčištěna');
        } catch (e) {
            console.log('Chyba při mazání auto-save dat:', e);
        }
    },

    checkForSuccessMessage() {
        const successAlert = document.querySelector('.alert-success');
        if (successAlert) {
            console.log('ContactForm - detekována úspěšná flash zpráva, čistím formulář...');
            setTimeout(() => {
                this.clearFormData();
            }, 1000);
        }
    },

    // Utility funkce
    showLoading(button, text = 'Načítání...') {
        if (!button) return;
        button.disabled = true;
        button.dataset.originalText = button.textContent || button.value;
        
        if (button.tagName === 'INPUT') {
            button.value = text;
        } else {
            button.innerHTML = `<i class="bi bi-arrow-clockwise spin me-2"></i>${text}`;
        }
        
        button.classList.add('loading');
    },

    showNotification(message, type = 'info', duration = 4000) {
        // Jednoduchá notifikace - můžeme rozšířit
        console.log(`📢 ${type.toUpperCase()}: ${message}`);
        
        // Můžeme přidat visual notifikaci později
        if (type === 'error') {
            alert(message); // Dočasně
        }
    },

    trackEvent(action, category = 'form', label = '') {
        try {
            if (typeof gtag !== 'undefined') {
                gtag('event', action, {
                    event_category: category,
                    event_label: label
                });
            }
            console.log(`📊 Event tracked: ${action} - ${category} - ${label}`);
        } catch (error) {
            console.log('Track error:', error);
        }
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
    }
};

/*
==================================
FORM HANDLER MAIN MODULE
==================================
*/
const FormHandler = {
    init() {
        console.log('FormHandler - Inicializace začíná');
        
        // Inicializace kontaktního formuláře
        ContactForm.init();
        
        console.log('FormHandler - Inicializace dokončena');
    }
};

// Export pro možné použití v jiných souborech
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { FormHandler, ContactForm, FormUtils };
}