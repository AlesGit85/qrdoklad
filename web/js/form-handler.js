/**
 * QRdoklad Form Handler
 * Správa formulářů, validace a odesílání
 */

/*
==================================
UTILITY FUNCTIONS
==================================
*/
const FormUtils = {
    debounce(func, wait, immediate) {
        let timeout;
        return function() {
            const context = this, args = arguments;
            const later = function() {
                timeout = null;
                if (!immediate) func.apply(context, args);
            };
            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
        };
    },

    throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        }
    },

    isEmailValid(email) {
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
        
        console.log('ContactForm - nalezená pole:', {
            name: !!this.fields.name,
            email: !!this.fields.email,
            company: !!this.fields.company,
            phone: !!this.fields.phone,
            subject: !!this.fields.subject,
            message: !!this.fields.message,
            privacy: !!this.fields.privacy,
            submitButton: !!this.submitButton
        });
    },

    bindEvents() {
        // Real-time validace při opuštění pole
        Object.entries(this.fields).forEach(([name, field]) => {
            if (field && name !== 'privacy') {
                field.addEventListener('blur', () => {
                    this.validateField(name);
                });
                
                // Validace při psaní (debounced) - pouze pokud už je pole invalid
                field.addEventListener('input', FormUtils.debounce(() => {
                    if (field.classList.contains('is-invalid')) {
                        this.validateField(name);
                    }
                }, 500));
            }
        });

        // Character counter pro message pole
        if (this.fields.message) {
            this.addCharacterCounter();
        }

        // Formátování telefonu při psaní
        if (this.fields.phone) {
            this.fields.phone.addEventListener('input', () => {
                const formatted = FormUtils.formatPhoneNumber(this.fields.phone.value);
                if (formatted !== this.fields.phone.value) {
                    this.fields.phone.value = formatted;
                }
            });
        }

        // Odeslání formuláře
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleSubmit();
        });

        // Tracking začátku vyplňování (pouze jednou)
        this.form.addEventListener('focusin', () => {
            this.trackEvent('form_start', 'contact', 'contact_form');
        }, { once: true });

        // Tracking interakcí s jednotlivými poli
        Object.entries(this.fields).forEach(([name, field]) => {
            if (field) {
                field.addEventListener('focus', () => {
                    this.trackEvent('field_focus', 'contact', name);
                }, { once: true });
            }
        });
    },

    addCharacterCounter() {
        const counter = document.createElement('div');
        counter.className = 'character-counter text-muted small mt-1';
        counter.style.textAlign = 'right';
        counter.style.fontWeight = '500';
        this.fields.message.parentNode.appendChild(counter);
        
        const updateCounter = () => {
            const length = this.fields.message.value.length;
            const maxLength = 1000;
            counter.textContent = `${length}/${maxLength} znaků`;
            
            // Barevné označení podle délky
            if (length > maxLength * 0.9) {
                counter.style.color = '#dc3545'; // červená
                counter.innerHTML = `<i class="bi bi-exclamation-triangle"></i> ${length}/${maxLength} znaků`;
            } else if (length > maxLength * 0.7) {
                counter.style.color = '#ffc107'; // žlutá
                counter.innerHTML = `<i class="bi bi-exclamation-circle"></i> ${length}/${maxLength} znaků`;
            } else {
                counter.style.color = '#6c757d'; // šedá
                counter.textContent = `${length}/${maxLength} znaků`;
            }
        };
        
        this.fields.message.addEventListener('input', updateCounter);
        updateCounter();
    },

    initAutoSave() {
        const formId = 'qrdoklad_contact_form_v2';
        
        // Načtení uložených dat
        try {
            const savedData = localStorage.getItem(formId);
            if (savedData) {
                const data = JSON.parse(savedData);
                let restoredFields = 0;
                
                Object.entries(data).forEach(([name, value]) => {
                    if (this.fields[name] && name !== 'privacy' && value.trim()) {
                        this.fields[name].value = value;
                        restoredFields++;
                    }
                });
                
                if (restoredFields > 0) {
                    this.showNotification(
                        `🔄 Obnovili jsme váš rozepsaný formulář (${restoredFields} polí)`, 
                        'info', 
                        4000
                    );
                }
            }
        } catch (e) {
            console.log('Chyba při načítání auto-save dat:', e);
        }
        
        // Auto-save při psaní
        const saveData = FormUtils.debounce(() => {
            const data = {};
            let hasData = false;
            
            Object.entries(this.fields).forEach(([name, field]) => {
                if (field && field.value && name !== 'privacy') {
                    data[name] = field.value.trim();
                    hasData = true;
                }
            });
            
            if (hasData) {
                try {
                    localStorage.setItem(formId, JSON.stringify(data));
                } catch (e) {
                    console.log('Chyba při ukládání auto-save dat:', e);
                }
            }
        }, 1500);
        
        Object.values(this.fields).forEach(field => {
            if (field) {
                field.addEventListener('input', saveData);
            }
        });
    },

    validateField(fieldName) {
        const field = this.fields[fieldName];
        if (!field) return true;
        
        let isValid = true;
        let errorMessage = '';
        
        switch (fieldName) {
            case 'name':
                if (!field.value.trim()) {
                    isValid = false;
                    errorMessage = 'Prosím vyplňte jméno a příjmení';
                } else if (field.value.trim().length < 2) {
                    isValid = false;
                    errorMessage = 'Jméno musí mít alespoň 2 znaky';
                } else if (field.value.trim().length > 100) {
                    isValid = false;
                    errorMessage = 'Jméno je příliš dlouhé (max 100 znaků)';
                }
                break;
                
            case 'email':
                if (!field.value.trim()) {
                    isValid = false;
                    errorMessage = 'Prosím vyplňte e-mailovou adresu';
                } else if (!FormUtils.isEmailValid(field.value.trim())) {
                    isValid = false;
                    errorMessage = 'Prosím zadejte platnou e-mailovou adresu';
                }
                break;
                
            case 'company':
                // Volitelné pole, ale pokud je vyplněné, validujeme
                if (field.value.trim() && field.value.trim().length < 2) {
                    isValid = false;
                    errorMessage = 'Název společnosti musí mít alespoň 2 znaky';
                }
                break;
                
            case 'phone':
                // Volitelné pole, ale pokud je vyplněné, validujeme
                if (field.value.trim()) {
                    const cleaned = field.value.replace(/\D/g, '');
                    if (cleaned.length < 9) {
                        isValid = false;
                        errorMessage = 'Prosím zadejte platné telefonní číslo';
                    }
                }
                break;
                
            case 'message':
                if (!field.value.trim()) {
                    isValid = false;
                    errorMessage = 'Prosím napište nám zprávu';
                } else if (field.value.trim().length < 10) {
                    isValid = false;
                    errorMessage = 'Zpráva musí mít alespoň 10 znaků';
                } else if (field.value.trim().length > 1000) {
                    isValid = false;
                    errorMessage = 'Zpráva je příliš dlouhá (max 1000 znaků)';
                }
                break;
        }
        
        this.setFieldValidationState(field, isValid, errorMessage);
        return isValid;
    },

    setFieldValidationState(field, isValid, errorMessage = '') {
        field.classList.remove('is-valid', 'is-invalid');
        
        // Najdeme nebo vytvoříme feedback element
        let feedback = field.parentNode.querySelector('.invalid-feedback');
        if (!feedback) {
            feedback = document.createElement('div');
            feedback.className = 'invalid-feedback';
            field.parentNode.appendChild(feedback);
        }
        
        if (isValid) {
            field.classList.add('is-valid');
            feedback.textContent = '';
            feedback.style.display = 'none';
        } else {
            field.classList.add('is-invalid');
            feedback.innerHTML = `<i class="bi bi-exclamation-circle"></i> ${errorMessage}`;
            feedback.style.display = 'block';
        }
    },

    validateForm() {
        let isValid = true;
        const errors = [];
        
        // Validace povinných polí
        const requiredFields = ['name', 'email', 'message'];
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

    handleSubmit() {
        console.log('ContactForm - pokus o odeslání formuláře');
        this.trackEvent('form_submit_attempt', 'contact', 'contact_form');
        
        if (!this.validateForm()) {
            this.trackEvent('form_submit_error', 'contact', 'validation_failed');
            this.showNotification(
                '❌ Prosím opravte chyby ve formuláři před odesláním', 
                'error',
                5000
            );
            return;
        }
        
        // Zobrazení loading stavu
        this.showLoading(this.submitButton, 'Odesílám zprávu...');
        
        // Příprava dat pro odeslání
        const formData = this.getFormData();
        
        // Simulace odeslání (později nahradíme skutečným API)
        setTimeout(() => {
            this.simulateFormSubmission(formData);
        }, 2000);
    },

    getFormData() {
        const data = {};
        Object.entries(this.fields).forEach(([name, field]) => {
            if (field && name !== 'privacy') {
                data[name] = field.value.trim();
            }
        });
        
        data.privacy_consent = this.fields.privacy ? this.fields.privacy.checked : false;
        data.submitted_at = new Date().toISOString();
        data.user_agent = navigator.userAgent;
        data.page_url = window.location.href;
        
        return data;
    },

    simulateFormSubmission(formData) {
        // Simulace úspěšného odeslání
        console.log('ContactForm - odeslaná data:', formData);
        
        this.showLoadingSuccess(this.submitButton, 'Zpráva odeslána!');
        this.trackEvent('form_submit_success', 'contact', 'contact_form');
        
        // Výrazná success notifikace
        this.showNotification(
            `🎉 <strong>Děkujeme za vaši zprávu!</strong><br>Ozveme se vám do 24 hodin na e-mail <strong>${formData.email}</strong>`,
            'success',
            8000
        );
        
        // Vyčištění auto-save dat
        try {
            localStorage.removeItem('qrdoklad_contact_form_v2');
        } catch (e) {
            console.log('Chyba při mazání auto-save dat:', e);
        }
        
        // Reset formuláře po úspěchu
        setTimeout(() => {
            this.resetForm();
        }, 3000);
    },

    resetForm() {
        this.form.reset();
        
        // Odstranění validation stavů
        this.form.querySelectorAll('.form-control').forEach(input => {
            input.classList.remove('is-valid', 'is-invalid');
        });
        
        // Odstranění character counteru
        const counter = this.form.querySelector('.character-counter');
        if (counter && this.fields.message) {
            counter.textContent = '0/1000 znaků';
            counter.style.color = '#6c757d';
        }
        
        console.log('ContactForm - formulář resetován');
    },

    addFormStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .character-counter {
                font-size: 0.875rem;
                margin-top: 0.25rem;
                transition: color 0.3s ease;
            }
            
            .invalid-feedback {
                display: block;
                font-size: 0.875rem;
                color: #dc3545;
                margin-top: 0.25rem;
                font-weight: 500;
            }
            
            .invalid-feedback i {
                margin-right: 4px;
            }
            
            .form-control.is-invalid {
                border-color: #dc3545;
                animation: shake 0.3s ease-in-out;
            }
            
            .form-control.is-valid {
                border-color: #B1D235;
            }
            
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-5px); }
                75% { transform: translateX(5px); }
            }
            
            .form-floating .invalid-feedback {
                margin-top: 0.5rem;
            }
        `;
        document.head.appendChild(style);
    },

    // Pomocné funkce pro komunikaci s ostatními moduly
    showLoading(element, text) {
        if (typeof LoadingStates !== 'undefined') {
            LoadingStates.show(element, text);
        } else {
            element.disabled = true;
            element.textContent = text;
        }
    },

    showLoadingSuccess(element, text) {
        if (typeof LoadingStates !== 'undefined') {
            LoadingStates.success(element, text);
        } else {
            element.disabled = false;
            element.textContent = text;
            element.style.backgroundColor = '#B1D235';
            element.style.color = '#212529';
        }
    },

    showNotification(message, type, duration) {
        if (typeof Notifications !== 'undefined') {
            Notifications.show(message, type, duration);
        } else {
            console.log(`📢 ${type.toUpperCase()}: ${message.replace(/<[^>]*>/g, '')}`);
            alert(message.replace(/<[^>]*>/g, ''));
        }
    },

    trackEvent(action, category, label) {
        // Tracking pouze pokud Analytics modul existuje
        if (typeof Analytics !== 'undefined') {
            Analytics.trackEvent(action, category, label);
        } else {
            console.log('📊 Event:', { action, category, label });
        }
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
        
        // Zde můžeme přidat další typy formulářů v budoucnu
        // např. NewsletterForm.init(), FeedbackForm.init(), atd.
        
        console.log('FormHandler - Inicializace dokončena');
    }
};

// Export pro možné použití v jiných souborech
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { FormHandler, ContactForm, FormUtils };
}