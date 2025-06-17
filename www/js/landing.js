/**
 * QRdoklad Landing Page JavaScript
 * Vše v jednom souboru, ale pěkně organizované
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('QRdoklad Landing Page - DOMContentLoaded');
    
    // Inicializace všech modulů
    ScrollEffects.init();
    NavbarEffects.init();
    SmoothScrolling.init();
    PricingToggle.init();
    SavingsCalculator.init();
    ContactForm.init();
    
    console.log('QRdoklad Landing Page initialized');
});

/*
==================================
SCROLL EFFECTS MODULE
==================================
*/
const ScrollEffects = {
    observer: null,
    
    init() {
        this.initScrollAnimations();
        this.initCounterAnimations();
        this.addScrollAnimationStyles();
    },

    initScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        this.observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        const animatedElements = document.querySelectorAll(
            '.benefit-card, .testimonial-card, .feature-list-item, .section-title, .section-subtitle, .feature-detail-card, .pricing-card, .advanced-feature-card'
        );
        
        animatedElements.forEach(el => {
            el.classList.add('animate-on-scroll');
            this.observer.observe(el);
        });
    },

    initCounterAnimations() {
        const counters = document.querySelectorAll('.counter');
        if (counters.length === 0) return;
        
        const observerOptions = { threshold: 0.5 };
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        counters.forEach(counter => counterObserver.observe(counter));
    },

    animateCounter(counter) {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                counter.textContent = target.toLocaleString('cs-CZ');
                clearInterval(timer);
            } else {
                counter.textContent = Math.floor(current).toLocaleString('cs-CZ');
            }
        }, 16);
    },

    addScrollAnimationStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .animate-on-scroll {
                opacity: 0;
                transform: translateY(30px);
                transition: all 0.8s ease;
            }
            .animate-on-scroll.animate-in {
                opacity: 1;
                transform: translateY(0);
            }
        `;
        document.head.appendChild(style);
    }
};

/*
==================================
NAVBAR EFFECTS MODULE
==================================
*/
const NavbarEffects = {
    navbar: null,
    lastScrollTop: 0,
    
    init() {
        this.navbar = document.querySelector('.navbar');
        if (!this.navbar) return;
        this.initScrollEffects();
    },

    initScrollEffects() {
        const scrollHandler = Utils.throttle(() => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 50) {
                this.navbar.classList.add('scrolled');
                this.navbar.style.background = 'rgba(0, 0, 0, 0.98)';
                this.navbar.style.boxShadow = '0 8px 40px rgba(0, 0, 0, 0.7)';
                this.navbar.style.backdropFilter = 'blur(25px)';
            } else {
                this.navbar.classList.remove('scrolled');
                this.navbar.style.background = 'rgba(0, 0, 0, 0.95)';
                this.navbar.style.boxShadow = '0 8px 32px rgba(0, 0, 0, 0.5)';
                this.navbar.style.backdropFilter = 'blur(20px)';
            }
            
            this.lastScrollTop = scrollTop;
        }, 16);
        
        window.addEventListener('scroll', scrollHandler);
        
        // Inicializační stav
        scrollHandler();
    }
};

/*
==================================
SMOOTH SCROLLING MODULE
==================================
*/
const SmoothScrolling = {
    init() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    }
};

/*
==================================
PRICING TOGGLE MODULE
==================================
*/
const PricingToggle = {
    toggle: null,
    monthlyPrices: null,
    annualPrices: null,
    annualNotes: null,
    
    init() {
        this.toggle = document.getElementById('priceToggle');
        if (!this.toggle) return;
        
        this.monthlyPrices = document.querySelectorAll('.monthly-price');
        this.annualPrices = document.querySelectorAll('.annual-price');
        this.annualNotes = document.querySelectorAll('.annual-note');
        
        this.toggle.addEventListener('change', () => {
            this.togglePrices();
        });
    },

    togglePrices() {
        if (this.toggle.checked) {
            this.monthlyPrices.forEach(price => price.style.display = 'none');
            this.annualPrices.forEach(price => price.style.display = 'inline');
            this.annualNotes.forEach(note => note.style.display = 'block');
        } else {
            this.monthlyPrices.forEach(price => price.style.display = 'inline');
            this.annualPrices.forEach(price => price.style.display = 'none');
            this.annualNotes.forEach(note => note.style.display = 'none');
        }
    }
};

/*
==================================
SAVINGS CALCULATOR MODULE
==================================
*/
const SavingsCalculator = {
    sliders: {},
    valueDisplays: {},
    resultElements: {},
    
    init() {
        console.log('SavingsCalculator init called');
        
        this.sliders.invoiceCount = document.getElementById('invoiceCount');
        if (!this.sliders.invoiceCount) {
            console.log('Kalkulačka není na této stránce');
            return;
        }
        
        console.log('Kalkulačka nalezena, inicializuji...');
        this.initElements();
        this.bindEvents();
        this.updateCalculator();
    },

    initElements() {
        this.sliders.timePerInvoice = document.getElementById('timePerInvoice');
        this.sliders.hourlyRate = document.getElementById('hourlyRate');
        
        this.valueDisplays.invoiceCount = document.getElementById('invoiceCountValue');
        this.valueDisplays.timePerInvoice = document.getElementById('timePerInvoiceValue');
        this.valueDisplays.hourlyRate = document.getElementById('hourlyRateValue');
        
        this.resultElements.timeSaved = document.getElementById('timeSaved');
        this.resultElements.moneySaved = document.getElementById('moneySaved');
        this.resultElements.yearlySavings = document.getElementById('yearlySavings');
        this.resultElements.roiTime = document.getElementById('roiTime');
        
        console.log('Elementy nalezeny:', {
            sliders: this.sliders,
            displays: this.valueDisplays,
            results: this.resultElements
        });
    },

    bindEvents() {
        Object.values(this.sliders).forEach(slider => {
            if (slider) {
                slider.addEventListener('input', () => {
                    console.log('Slider changed:', slider.id, slider.value);
                    this.updateCalculator();
                });
            }
        });
    },

    updateCalculator() {
        const values = this.getSliderValues();
        this.updateDisplayedValues(values);
        const calculations = this.performCalculations(values);
        this.updateResults(calculations);
    },

    getSliderValues() {
        return {
            invoiceCount: parseInt(this.sliders.invoiceCount.value),
            timePerInvoice: parseInt(this.sliders.timePerInvoice.value),
            hourlyRate: parseInt(this.sliders.hourlyRate.value)
        };
    },

    updateDisplayedValues(values) {
        if (this.valueDisplays.invoiceCount) {
            this.valueDisplays.invoiceCount.textContent = values.invoiceCount;
        }
        if (this.valueDisplays.timePerInvoice) {
            this.valueDisplays.timePerInvoice.textContent = values.timePerInvoice;
        }
        if (this.valueDisplays.hourlyRate) {
            this.valueDisplays.hourlyRate.textContent = values.hourlyRate.toLocaleString('cs-CZ') + ' Kč';
        }
    },

    performCalculations(values) {
        const currentTimePerMonth = values.invoiceCount * values.timePerInvoice;
        const qrdokladTimePerInvoice = 2;
        const newTimePerMonth = values.invoiceCount * qrdokladTimePerInvoice;
        const timeSavedMinutes = currentTimePerMonth - newTimePerMonth;
        const timeSavedHours = Math.round(timeSavedMinutes / 60 * 10) / 10;
        
        const moneySavedPerMonth = (timeSavedMinutes / 60) * values.hourlyRate;
        const monthlySubscription = 599;
        const netSavingsPerMonth = moneySavedPerMonth - monthlySubscription;
        const yearlySavings = netSavingsPerMonth * 12;
        const roiDays = Math.ceil(monthlySubscription / (moneySavedPerMonth / 30));
        
        return {
            timeSavedHours,
            netSavingsPerMonth,
            yearlySavings,
            roiDays
        };
    },

    updateResults(calculations) {
        if (this.resultElements.timeSaved) {
            this.resultElements.timeSaved.textContent = calculations.timeSavedHours + ' hodin';
        }
        if (this.resultElements.moneySaved) {
            this.resultElements.moneySaved.textContent = Math.round(calculations.netSavingsPerMonth).toLocaleString('cs-CZ') + ' Kč';
        }
        if (this.resultElements.yearlySavings) {
            this.resultElements.yearlySavings.textContent = Math.round(calculations.yearlySavings).toLocaleString('cs-CZ') + ' Kč';
        }
        if (this.resultElements.roiTime) {
            if (calculations.roiDays <= 7) {
                this.resultElements.roiTime.textContent = calculations.roiDays + ' dní';
            } else if (calculations.roiDays <= 30) {
                this.resultElements.roiTime.textContent = Math.ceil(calculations.roiDays / 7) + ' týdny';
            } else {
                this.resultElements.roiTime.textContent = Math.ceil(calculations.roiDays / 30) + ' měsíce';
            }
        }
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
        this.form = document.querySelector('.contact-form');
        if (!this.form) return;
        
        this.initFields();
        this.bindEvents();
    },

    initFields() {
        this.fields = {
            name: this.form.querySelector('input[name="name"]'),
            email: this.form.querySelector('input[name="email"]'),
            message: this.form.querySelector('textarea[name="message"]'),
            privacy: this.form.querySelector('#privacy')
        };
        this.submitButton = this.form.querySelector('input[type="submit"]');
    },

    bindEvents() {
        if (this.fields.name) {
            this.fields.name.addEventListener('blur', () => {
                this.validateField(this.fields.name, 'Prosím vyplňte jméno a příjmení');
            });
        }
        
        if (this.fields.email) {
            this.fields.email.addEventListener('blur', () => {
                this.validateEmail(this.fields.email);
            });
        }
        
        if (this.fields.message) {
            this.fields.message.addEventListener('blur', () => {
                this.validateField(this.fields.message, 'Prosím napište nám zprávu');
            });
        }
        
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleSubmit();
        });
    },

    validateField(field, errorMessage) {
        const value = field.value.trim();
        const feedback = field.parentNode.querySelector('.invalid-feedback');
        
        if (value === '') {
            this.setFieldInvalid(field, errorMessage, feedback);
            return false;
        } else {
            this.setFieldValid(field);
            return true;
        }
    },

    validateEmail(field) {
        const email = field.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const feedback = field.parentNode.querySelector('.invalid-feedback');
        
        if (email === '') {
            this.setFieldInvalid(field, 'Prosím vyplňte e-mailovou adresu', feedback);
            return false;
        } else if (!emailRegex.test(email)) {
            this.setFieldInvalid(field, 'Prosím zadejte platnou e-mailovou adresu', feedback);
            return false;
        } else {
            this.setFieldValid(field);
            return true;
        }
    },

    setFieldInvalid(field, message, feedback) {
        field.classList.add('is-invalid');
        field.classList.remove('is-valid');
        if (feedback) {
            feedback.textContent = message;
        }
    },

    setFieldValid(field) {
        field.classList.remove('is-invalid');
        field.classList.add('is-valid');
    },

    handleSubmit() {
        let isValid = this.validateForm();
        if (isValid) {
            this.submitForm();
        }
    },

    validateForm() {
        let isValid = true;
        
        if (this.fields.name && !this.validateField(this.fields.name, 'Prosím vyplňte jméno a příjmení')) {
            isValid = false;
        }
        if (this.fields.email && !this.validateEmail(this.fields.email)) {
            isValid = false;
        }
        if (this.fields.message && !this.validateField(this.fields.message, 'Prosím napište nám zprávu')) {
            isValid = false;
        }
        if (this.fields.privacy && !this.fields.privacy.checked) {
            alert('Prosím potvrďte souhlas se zpracováním osobních údajů');
            isValid = false;
        }
        
        return isValid;
    },

    submitForm() {
        const originalText = this.submitButton.value;
        this.submitButton.value = 'Odesílám...';
        this.submitButton.disabled = true;
        
        setTimeout(() => {
            this.submitButton.value = 'Odesláno!';
            this.submitButton.classList.remove('btn-primary');
            this.submitButton.classList.add('btn-success');
            
            this.showSuccessMessage();
            
            setTimeout(() => {
                this.form.reset();
                this.form.querySelectorAll('.form-control').forEach(input => {
                    input.classList.remove('is-valid', 'is-invalid');
                });
                
                this.submitButton.value = originalText;
                this.submitButton.disabled = false;
                this.submitButton.classList.remove('btn-success');
                this.submitButton.classList.add('btn-primary');
            }, 3000);
        }, 2000);
    },

    showSuccessMessage() {
        const successDiv = document.createElement('div');
        successDiv.className = 'alert alert-success alert-dismissible fade show position-fixed';
        successDiv.style.cssText = `
            top: 20px; right: 20px; z-index: 9999; min-width: 300px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        `;
        successDiv.innerHTML = `
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Děkujeme!</strong> Vaše zpráva byla úspěšně odeslána. Ozveme se vám do 24 hodin.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(successDiv);
        setTimeout(() => {
            if (successDiv.parentNode) {
                successDiv.remove();
            }
        }, 5000);
    }
};

/*
==================================
UTILITIES
==================================
*/
const Utils = {
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

    trackEvent(category, action, label = null) {
        if (typeof gtag !== 'undefined') {
            gtag('event', action, {
                'event_category': category,
                'event_label': label
            });
        }
    }
};