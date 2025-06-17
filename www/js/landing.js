/**
 * QRdoklad Landing Page JavaScript
 * Moderní interaktivní prvky a animace
 */

document.addEventListener('DOMContentLoaded', function() {
    // Inicializace všech funkcí
    initScrollEffects();
    initAnimations();
    initSmoothScrolling();
    initNavbarEffects();
    initCounterAnimations();
    initPricingToggle();
    initSavingsCalculator();
    initContactForm();
    
    console.log('QRdoklad Landing Page initialized');
});

/**
 * Kontaktní formulář validace a funkcionalita
 */
function initContactForm() {
    const contactForm = document.querySelector('.contact-form');
    if (!contactForm) return;
    
    const nameInput = contactForm.querySelector('input[name="name"]');
    const emailInput = contactForm.querySelector('input[name="email"]');
    const messageInput = contactForm.querySelector('textarea[name="message"]');
    const privacyCheckbox = contactForm.querySelector('#privacy');
    const submitButton = contactForm.querySelector('input[type="submit"]');
    
    // Real-time validace
    if (nameInput) {
        nameInput.addEventListener('blur', function() {
            validateField(this, 'Prosím vyplňte jméno a příjmení');
        });
    }
    
    if (emailInput) {
        emailInput.addEventListener('blur', function() {
            validateEmail(this);
        });
    }
    
    if (messageInput) {
        messageInput.addEventListener('blur', function() {
            validateField(this, 'Prosím napište nám zprávu');
        });
    }
    
    // Validace před odesláním
    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        let isValid = true;
        
        // Validace povinných polí
        if (nameInput && !validateField(nameInput, 'Prosím vyplňte jméno a příjmení')) {
            isValid = false;
        }
        
        if (emailInput && !validateEmail(emailInput)) {
            isValid = false;
        }
        
        if (messageInput && !validateField(messageInput, 'Prosím napište nám zprávu')) {
            isValid = false;
        }
        
        if (privacyCheckbox && !privacyCheckbox.checked) {
            alert('Prosím potvrďte souhlas se zpracováním osobních údajů');
            isValid = false;
        }
        
        if (isValid) {
            // Simulace odeslání formuláře
            submitContactForm(contactForm);
        }
    });
    
    function validateField(field, errorMessage) {
        const value = field.value.trim();
        const feedback = field.parentNode.querySelector('.invalid-feedback');
        
        if (value === '') {
            field.classList.add('is-invalid');
            field.classList.remove('is-valid');
            if (feedback) {
                feedback.textContent = errorMessage;
            }
            return false;
        } else {
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
            return true;
        }
    }
    
    function validateEmail(field) {
        const email = field.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const feedback = field.parentNode.querySelector('.invalid-feedback');
        
        if (email === '') {
            field.classList.add('is-invalid');
            field.classList.remove('is-valid');
            if (feedback) {
                feedback.textContent = 'Prosím vyplňte e-mailovou adresu';
            }
            return false;
        } else if (!emailRegex.test(email)) {
            field.classList.add('is-invalid');
            field.classList.remove('is-valid');
            if (feedback) {
                feedback.textContent = 'Prosím zadejte platnou e-mailovou adresu';
            }
            return false;
        } else {
            field.classList.remove('is-invalid');
            field.classList.add('is-valid');
            return true;
        }
    }
    
    function submitContactForm(form) {
        const originalText = submitButton.value;
        
        // Loading state
        submitButton.value = 'Odesílám...';
        submitButton.disabled = true;
        
        // Simulace AJAX požadavku (v reálné aplikaci by tady byl fetch na server)
        setTimeout(() => {
            // Success state
            submitButton.value = 'Odesláno!';
            submitButton.classList.remove('btn-primary');
            submitButton.classList.add('btn-success');
            
            // Zobrazení success zprávy
            showSuccessMessage();
            
            // Reset formuláře
            setTimeout(() => {
                form.reset();
                form.querySelectorAll('.form-control').forEach(input => {
                    input.classList.remove('is-valid', 'is-invalid');
                });
                
                submitButton.value = originalText;
                submitButton.disabled = false;
                submitButton.classList.remove('btn-success');
                submitButton.classList.add('btn-primary');
            }, 3000);
            
        }, 2000);
    }
    
    function showSuccessMessage() {
        // Vytvoření success notifikace
        const successDiv = document.createElement('div');
        successDiv.className = 'alert alert-success alert-dismissible fade show position-fixed';
        successDiv.style.cssText = `
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
        `;
        successDiv.innerHTML = `
            <i class="bi bi-check-circle-fill me-2"></i>
            <strong>Děkujeme!</strong> Vaše zpráva byla úspěšně odeslána. Ozveme se vám do 24 hodin.
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(successDiv);
        
        // Automatické odstranění po 5 sekundách
        setTimeout(() => {
            if (successDiv.parentNode) {
                successDiv.remove();
            }
        }, 5000);
    }
}

/**
 * Pricing toggle funkcionalita
 */
function initPricingToggle() {
    const toggle = document.getElementById('priceToggle');
    if (!toggle) return;
    
    const monthlyPrices = document.querySelectorAll('.monthly-price');
    const annualPrices = document.querySelectorAll('.annual-price');
    const annualNotes = document.querySelectorAll('.annual-note');
    
    toggle.addEventListener('change', function() {
        if (this.checked) {
            // Zobrazit roční ceny
            monthlyPrices.forEach(price => price.style.display = 'none');
            annualPrices.forEach(price => price.style.display = 'inline');
            annualNotes.forEach(note => note.style.display = 'block');
        } else {
            // Zobrazit měsíční ceny
            monthlyPrices.forEach(price => price.style.display = 'inline');
            annualPrices.forEach(price => price.style.display = 'none');
            annualNotes.forEach(note => note.style.display = 'none');
        }
    });
}

/**
 * Kalkulačka úspor
 */
function initSavingsCalculator() {
    const invoiceCountSlider = document.getElementById('invoiceCount');
    const timePerInvoiceSlider = document.getElementById('timePerInvoice');
    const hourlyRateSlider = document.getElementById('hourlyRate');
    
    if (!invoiceCountSlider) return; // Kalkulačka není na této stránce
    
    const invoiceCountValue = document.getElementById('invoiceCountValue');
    const timePerInvoiceValue = document.getElementById('timePerInvoiceValue');
    const hourlyRateValue = document.getElementById('hourlyRateValue');
    
    const timeSavedElement = document.getElementById('timeSaved');
    const moneySavedElement = document.getElementById('moneySaved');
    const yearlySavingsElement = document.getElementById('yearlySavings');
    const roiTimeElement = document.getElementById('roiTime');
    
    function updateCalculator() {
        const invoiceCount = parseInt(invoiceCountSlider.value);
        const timePerInvoice = parseInt(timePerInvoiceSlider.value);
        const hourlyRate = parseInt(hourlyRateSlider.value);
        
        // Aktualizace zobrazených hodnot
        invoiceCountValue.textContent = invoiceCount;
        timePerInvoiceValue.textContent = timePerInvoice;
        hourlyRateValue.textContent = hourlyRate.toLocaleString('cs-CZ') + ' Kč';
        
        // Výpočty
        const currentTimePerMonth = invoiceCount * timePerInvoice; // minuty
        const qrdokladTimePerInvoice = 2; // minuty s QRdokladem
        const newTimePerMonth = invoiceCount * qrdokladTimePerInvoice;
        const timeSavedMinutes = currentTimePerMonth - newTimePerMonth;
        const timeSavedHours = Math.round(timeSavedMinutes / 60 * 10) / 10;
        
        const moneySavedPerMonth = (timeSavedMinutes / 60) * hourlyRate;
        const yearlySavings = moneySavedPerMonth * 12;
        
        // Business plán stojí 599 Kč/měsíc
        const monthlySubscription = 599;
        const netSavingsPerMonth = moneySavedPerMonth - monthlySubscription;
        const roiDays = Math.ceil(monthlySubscription / (moneySavedPerMonth / 30));
        
        // Aktualizace výsledků
        timeSavedElement.textContent = timeSavedHours + ' hodin';
        moneySavedElement.textContent = Math.round(netSavingsPerMonth).toLocaleString('cs-CZ') + ' Kč';
        yearlySavingsElement.textContent = Math.round(netSavingsPerMonth * 12).toLocaleString('cs-CZ') + ' Kč';
        
        if (roiDays <= 7) {
            roiTimeElement.textContent = roiDays + ' dní';
        } else if (roiDays <= 30) {
            roiTimeElement.textContent = Math.ceil(roiDays / 7) + ' týdny';
        } else {
            roiTimeElement.textContent = Math.ceil(roiDays / 30) + ' měsíce';
        }
    }
    
    // Event listenery pro slidery
    invoiceCountSlider.addEventListener('input', updateCalculator);
    timePerInvoiceSlider.addEventListener('input', updateCalculator);
    hourlyRateSlider.addEventListener('input', updateCalculator);
    
    // Inicializační výpočet
    updateCalculator();
}

/**
 * Efekty při scrollování
 */
function initScrollEffects() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);

    // Observe všechny elementy které chceme animovat
    const animatedElements = document.querySelectorAll(
        '.benefit-card, .testimonial-card, .feature-list-item, .section-title, .section-subtitle'
    );
    
    animatedElements.forEach(el => {
        el.classList.add('animate-on-scroll');
        observer.observe(el);
    });
}

/**
 * CSS animace pro scroll efekty
 */
function initAnimations() {
    // Přidáme CSS styly pro animace
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
        
        .benefit-card.animate-on-scroll {
            transition-delay: 0.1s;
        }
        
        .benefit-card:nth-child(2).animate-on-scroll {
            transition-delay: 0.2s;
        }
        
        .benefit-card:nth-child(3).animate-on-scroll {
            transition-delay: 0.3s;
        }
        
        .testimonial-card.animate-on-scroll {
            transition-delay: 0.15s;
        }
        
        .testimonial-card:nth-child(2).animate-on-scroll {
            transition-delay: 0.3s;
        }
        
        .testimonial-card:nth-child(3).animate-on-scroll {
            transition-delay: 0.45s;
        }
    `;
    document.head.appendChild(style);
}

/**
 * Plynulé scrollování pro anchor odkazy
 */
function initSmoothScrolling() {
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

/**
 * Efekty pro navbar při scrollování
 */
function initNavbarEffects() {
    const navbar = document.querySelector('.navbar');
    let lastScrollTop = 0;
    
    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Změna průhlednosti navbar při scrollu
        if (scrollTop > 50) {
            navbar.style.background = 'rgba(255, 255, 255, 0.98)';
            navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.15)';
        } else {
            navbar.style.background = 'rgba(255, 255, 255, 0.95)';
            navbar.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
        }
        
        // Skrytí navbar při scrollování dolů (volitelné)
        // if (scrollTop > lastScrollTop && scrollTop > 100) {
        //     navbar.style.transform = 'translateY(-100%)';
        // } else {
        //     navbar.style.transform = 'translateY(0)';
        // }
        
        lastScrollTop = scrollTop;
    });
}

/**
 * Animace čítačů (pokud budou použity)
 */
function initCounterAnimations() {
    const counters = document.querySelectorAll('.counter');
    
    const observerOptions = {
        threshold: 0.5
    };
    
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-count'));
                const duration = 2000; // 2 sekundy
                const step = target / (duration / 16); // 60 FPS
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
                
                counterObserver.unobserve(counter);
            }
        });
    }, observerOptions);
    
    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
}

/**
 * Paralax efekt pro hero sekci (volitelné)
 */
function initParallaxEffect() {
    const hero = document.querySelector('.hero-section');
    
    if (hero) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            hero.style.transform = `translateY(${rate}px)`;
        });
    }
}

/**
 * Lazy loading pro obrázky (pokud budou použity)
 */
function initLazyLoading() {
    const images = document.querySelectorAll('img[data-src]');
    
    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });
    
    images.forEach(img => {
        imageObserver.observe(img);
    });
}

/**
 * Funkcionalita pro demo video/modal (pokud bude potřeba)
 */
function initDemoModal() {
    const demoButtons = document.querySelectorAll('[data-demo]');
    
    demoButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            // Zde by byla logika pro otevření demo videa
            console.log('Demo video clicked');
        });
    });
}

/**
 * Google Analytics events (pokud bude potřeba)
 */
function trackEvent(category, action, label = null) {
    if (typeof gtag !== 'undefined') {
        gtag('event', action, {
            'event_category': category,
            'event_label': label
        });
    }
}

// Event listenery pro tracking
document.addEventListener('click', function(e) {
    // Track CTA button clicks
    if (e.target.matches('a[href*="sign/up"]')) {
        trackEvent('CTA', 'click', 'Sign Up Button');
    }
    
    if (e.target.matches('a[href*="kontakt"]')) {
        trackEvent('Navigation', 'click', 'Contact Page');
    }
    
    if (e.target.matches('a[href*="cenik"]')) {
        trackEvent('Navigation', 'click', 'Pricing Page');
    }
});

/**
 * Form validation a AJAX odeslání (pokud bude potřeba)
 */
function initFormHandling() {
    const forms = document.querySelectorAll('form[data-ajax]');
    
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(form);
            const submitButton = form.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            
            // Loading state
            submitButton.textContent = 'Odesílám...';
            submitButton.disabled = true;
            
            // Simulace AJAX požadavku
            setTimeout(() => {
                submitButton.textContent = 'Odesláno!';
                setTimeout(() => {
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                    form.reset();
                }, 2000);
            }, 1000);
        });
    });
}