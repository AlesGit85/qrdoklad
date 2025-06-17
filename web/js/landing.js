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
    LoadingStates.init();
    Notifications.init();
    Analytics.init();
    
    console.log('QRdoklad Landing Page initialized');
});

/*
==================================
LOADING STATES MODULE
==================================
*/
const LoadingStates = {
    init() {
        this.addLoadingStyles();
        this.bindCTAButtons();
    },

    show(element, text = 'Načítání...') {
        if (!element) return;
        element.disabled = true;
        element.dataset.originalText = element.textContent || element.value;
        element.dataset.originalClass = element.className;
        
        if (element.tagName === 'INPUT') {
            element.value = text;
        } else {
            element.innerHTML = `<i class="bi bi-arrow-clockwise spin me-2"></i>${text}`;
        }
        
        element.classList.add('loading');
    },
    
    hide(element) {
        if (!element) return;
        element.disabled = false;
        
        if (element.tagName === 'INPUT') {
            element.value = element.dataset.originalText;
        } else {
            element.innerHTML = element.dataset.originalText;
        }
        
        element.classList.remove('loading');
    },

    success(element, text = 'Hotovo!', duration = 2000) {
        if (!element) return;
        element.disabled = false;
        element.classList.remove('loading');
        element.classList.add('success');
        
        if (element.tagName === 'INPUT') {
            element.value = text;
        } else {
            element.innerHTML = `<i class="bi bi-check-circle-fill me-2"></i>${text}`;
        }
        
        setTimeout(() => {
            element.classList.remove('success');
            if (element.tagName === 'INPUT') {
                element.value = element.dataset.originalText;
            } else {
                element.innerHTML = element.dataset.originalText;
            }
        }, duration);
    },

    addLoadingStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .spin {
                animation: spin 1s linear infinite;
            }
            
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
            
            .loading {
                opacity: 0.8;
                cursor: not-allowed;
                transition: all 0.3s ease;
                background-color: #95B11F !important;
                border-color: #95B11F !important;
                color: #212529 !important;
            }
            
            .success {
                background-color: #B1D235 !important;
                border-color: #B1D235 !important;
                color: #212529 !important;
                transition: all 0.3s ease;
            }
            
            .btn:disabled {
                opacity: 0.7;
            }
            
            .page-transition {
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            
            .page-transition.loaded {
                opacity: 1;
            }
            
            /* ÚPLNÉ ODSTRANĚNÍ MODRÉ BARVY Z TLAČÍTEK */
            .btn-primary,
            .btn-primary:hover,
            .btn-primary:focus,
            .btn-primary:active,
            .btn-primary.active,
            .btn-primary:not(:disabled):not(.disabled):active,
            .btn-primary:not(:disabled):not(.disabled).active {
                background-color: #B1D235 !important;
                border-color: #B1D235 !important;
                color: #212529 !important;
                box-shadow: none !important;
                outline: none !important;
            }
            
            .btn-primary:hover {
                background-color: #95B11F !important;
                border-color: #95B11F !important;
                color: #ffffff !important;
                transform: translateY(-2px);
            }
            
            .btn-primary:focus,
            .btn-primary.focus {
                background-color: #B1D235 !important;
                border-color: #B1D235 !important;
                color: #212529 !important;
                box-shadow: 0 0 0 0.2rem rgba(177, 210, 53, 0.5) !important;
            }
            
            .btn-primary:active,
            .btn-primary.active {
                background-color: #95B11F !important;
                border-color: #95B11F !important;
                color: #ffffff !important;
            }
            
            .btn-outline-primary,
            .btn-outline-primary:hover,
            .btn-outline-primary:focus,
            .btn-outline-primary:active,
            .btn-outline-primary.active {
                color: #B1D235 !important;
                border-color: #B1D235 !important;
                box-shadow: none !important;
                outline: none !important;
            }
            
            .btn-outline-primary:hover {
                background-color: #B1D235 !important;
                border-color: #B1D235 !important;
                color: #212529 !important;
                transform: translateY(-2px);
            }
            
            .btn-outline-primary:focus,
            .btn-outline-primary.focus {
                box-shadow: 0 0 0 0.2rem rgba(177, 210, 53, 0.5) !important;
            }
            
            .btn-outline-primary:active,
            .btn-outline-primary.active {
                background-color: #95B11F !important;
                border-color: #95B11F !important;
                color: #ffffff !important;
            }
            
            /* Form kontroly - oprava focus stavů */
            .form-control:focus {
                border-color: #B1D235 !important;
                box-shadow: 0 0 0 0.2rem rgba(177, 210, 53, 0.25) !important;
                outline: none !important;
            }
            
            .form-control.is-valid {
                border-color: #B1D235 !important;
                box-shadow: 0 0 0 0.2rem rgba(177, 210, 53, 0.25) !important;
            }
            
            .form-control.is-invalid {
                border-color: #dc3545 !important;
                box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
            }
            
            .form-check-input:checked {
                background-color: #B1D235 !important;
                border-color: #B1D235 !important;
            }
            
            .form-check-input:focus {
                border-color: #B1D235 !important;
                box-shadow: 0 0 0 0.2rem rgba(177, 210, 53, 0.25) !important;
            }
            
            /* Range slider styly */
            .form-range:focus {
                outline: none !important;
                box-shadow: none !important;
            }
            
            .form-range::-webkit-slider-thumb {
                background: #B1D235 !important;
                border: none;
                height: 20px;
                width: 20px;
                border-radius: 50%;
                cursor: pointer;
            }
            
            .form-range::-webkit-slider-thumb:hover {
                background: #95B11F !important;
                transform: scale(1.1);
            }
            
            .form-range::-moz-range-thumb {
                background: #B1D235 !important;
                border: none;
                height: 20px;
                width: 20px;
                border-radius: 50%;
                cursor: pointer;
            }
            
            .form-range::-moz-range-thumb:hover {
                background: #95B11F !important;
                transform: scale(1.1);
            }
            
            .form-range::-webkit-slider-track {
                background: #f8f9fa;
                border-radius: 10px;
                height: 6px;
            }
            
            .form-range::-moz-range-track {
                background: #f8f9fa;
                border-radius: 10px;
                height: 6px;
                border: none;
            }
        `;
        document.head.appendChild(style);
    },

    bindCTAButtons() {
        // Všechna CTA tlačítka
        document.querySelectorAll('a[href*="app.qrdoklad.cz"]').forEach(button => {
            button.addEventListener('click', (e) => {
                this.show(button, 'Přesměrování...');
                Analytics.trackCTAClick(button.textContent.trim(), window.location.pathname);
                
                // Pustíme přesměrování po krátké pauze pro lepší UX
                setTimeout(() => {
                    window.open(button.href, '_blank');
                    this.hide(button);
                }, 800);
                
                e.preventDefault();
            });
        });
    }
};

/*
==================================
NOTIFICATIONS MODULE (vylepšený)
==================================
*/
const Notifications = {
    container: null,
    
    init() {
        this.createContainer();
        this.addNotificationStyles();
    },

    createContainer() {
        this.container = document.createElement('div');
        this.container.id = 'notifications-container';
        this.container.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10000;
            max-width: 420px;
            pointer-events: none;
        `;
        document.body.appendChild(this.container);
    },

    addNotificationStyles() {
        const style = document.createElement('style');
        style.textContent = `
            /* VÝRAZNÉ NOTIFIKACE - dobře viditelné */
            .notification-custom {
                pointer-events: auto;
                border: none !important;
                border-radius: 16px !important;
                font-weight: 600 !important;
                font-size: 1rem !important;
                padding: 20px 24px !important;
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2) !important;
                backdrop-filter: blur(10px) !important;
                border-left: 5px solid transparent !important;
                animation: slideInFromRight 0.4s ease-out !important;
                margin-bottom: 16px !important;
                min-height: 80px !important;
                display: flex !important;
                align-items: center !important;
            }
            
            .notification-custom.alert-success {
                background: linear-gradient(135deg, #B1D235, #95B11F) !important;
                color: #212529 !important;
                border-left-color: #95B11F !important;
            }
            
            .notification-custom.alert-danger {
                background: linear-gradient(135deg, #dc3545, #b02a37) !important;
                color: #ffffff !important;
                border-left-color: #b02a37 !important;
            }
            
            .notification-custom.alert-warning {
                background: linear-gradient(135deg, #ffc107, #e0a800) !important;
                color: #212529 !important;
                border-left-color: #e0a800 !important;
            }
            
            .notification-custom.alert-info {
                background: linear-gradient(135deg, #6c757d, #5a6268) !important;
                color: #ffffff !important;
                border-left-color: #5a6268 !important;
            }
            
            .notification-custom .btn-close {
                filter: none !important;
                opacity: 0.8 !important;
                font-size: 1.2rem !important;
                padding: 8px !important;
                margin: -8px -8px -8px auto !important;
            }
            
            .notification-custom .btn-close:hover {
                opacity: 1 !important;
                transform: scale(1.1) !important;
            }
            
            .notification-custom i {
                font-size: 1.4rem !important;
                margin-right: 12px !important;
                flex-shrink: 0;
            }
            
            .notification-custom .notification-content {
                flex-grow: 1;
                line-height: 1.4;
            }
            
            @keyframes slideInFromRight {
                0% {
                    transform: translateX(100%);
                    opacity: 0;
                }
                100% {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOutToRight {
                0% {
                    transform: translateX(0);
                    opacity: 1;
                }
                100% {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
            
            .notification-custom.removing {
                animation: slideOutToRight 0.3s ease-in !important;
            }
        `;
        document.head.appendChild(style);
    },

    show(message, type = 'info', duration = 5000) {
        const notification = document.createElement('div');
        const id = 'notification-' + Date.now();
        
        const icons = {
            success: 'bi-check-circle-fill',
            error: 'bi-exclamation-triangle-fill',
            warning: 'bi-exclamation-triangle-fill',
            info: 'bi-info-circle-fill'
        };
        
        // Přemapování danger na error pro konzistenci
        const alertType = type === 'error' ? 'danger' : type;
        
        notification.id = id;
        notification.className = `alert alert-${alertType} alert-dismissible fade show notification-custom`;
        
        notification.innerHTML = `
            <i class="bi ${icons[type]}"></i>
            <div class="notification-content">${message}</div>
            <button type="button" class="btn-close" onclick="Notifications.remove('${id}')"></button>
        `;
        
        this.container.appendChild(notification);
        
        // Auto remove
        if (duration > 0) {
            setTimeout(() => this.remove(id), duration);
        }
        
        // Sound effect pro success (optional)
        if (type === 'success') {
            this.playNotificationSound();
        }
        
        return id;
    },

    remove(id) {
        const notification = document.getElementById(id);
        if (notification) {
            notification.classList.add('removing');
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.remove();
                }
            }, 300);
        }
    },

    success(message, duration = 6000) {
        return this.show(message, 'success', duration);
    },

    error(message, duration = 8000) {
        return this.show(message, 'error', duration);
    },

    warning(message, duration = 6000) {
        return this.show(message, 'warning', duration);
    },

    info(message, duration = 5000) {
        return this.show(message, 'info', duration);
    },

    playNotificationSound() {
        // Jednoduchý audio feedback (opcional)
        try {
            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();
            
            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);
            
            oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
            oscillator.frequency.setValueAtTime(1000, audioContext.currentTime + 0.1);
            gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.2);
            
            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 0.2);
        } catch (e) {
            // Audio není podporováno, nevadí
        }
    }
};

/*
==================================
ANALYTICS MODULE
==================================
*/
const Analytics = {
    init() {
        this.trackPageView();
        this.bindTrackingEvents();
    },

    trackEvent(action, category, label = null, value = null) {
        // Console logging pro development
        console.log('📊 Analytics Event:', {
            action,
            category, 
            label,
            value,
            page: window.location.pathname,
            timestamp: new Date().toISOString()
        });
        
        // Google Analytics 4 (když bude připojený)
        if (typeof gtag !== 'undefined') {
            gtag('event', action, {
                'event_category': category,
                'event_label': label,
                'value': value,
                'page_location': window.location.href,
                'page_title': document.title
            });
        }
    },

    trackPageView() {
        this.trackEvent('page_view', 'navigation', window.location.pathname);
    },

    trackCTAClick(buttonText, location) {
        this.trackEvent('cta_click', 'conversion', `${buttonText} - ${location}`);
    },

    trackFormSubmit(formName, success = true) {
        this.trackEvent(success ? 'form_submit_success' : 'form_submit_error', 'contact', formName);
    },

    trackPricingInteraction(action, plan = null) {
        this.trackEvent(action, 'pricing', plan);
    },

    trackCalculatorUse() {
        this.trackEvent('calculator_use', 'engagement', 'savings_calculator');
    },

    trackScrollDepth(percentage) {
        if (percentage >= 75 && !this.scrollTracked75) {
            this.trackEvent('scroll_depth', 'engagement', '75_percent');
            this.scrollTracked75 = true;
        }
        if (percentage >= 90 && !this.scrollTracked90) {
            this.trackEvent('scroll_depth', 'engagement', '90_percent');
            this.scrollTracked90 = true;
        }
    },

    bindTrackingEvents() {
        // Track scroll depth
        let maxScroll = 0;
        window.addEventListener('scroll', Utils.throttle(() => {
            const scrollPercent = Math.round(
                (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100
            );
            if (scrollPercent > maxScroll) {
                maxScroll = scrollPercent;
                this.trackScrollDepth(scrollPercent);
            }
        }, 1000));

        // Track external links
        document.querySelectorAll('a[href^="http"]:not([href*="qrdoklad.cz"])').forEach(link => {
            link.addEventListener('click', () => {
                this.trackEvent('external_link', 'navigation', link.href);
            });
        });

        // Track internal navigation
        document.querySelectorAll('a[href^="/"], a[href^="#"]').forEach(link => {
            link.addEventListener('click', () => {
                this.trackEvent('internal_link', 'navigation', link.href);
            });
        });
    }
};

/*
==================================
SCROLL EFFECTS MODULE (rozšířený)
==================================
*/
const ScrollEffects = {
    observer: null,
    
    init() {
        this.initScrollAnimations();
        this.initCounterAnimations();
        this.initParallaxEffects();
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
                    
                    // Track element visibility
                    const elementClass = entry.target.className;
                    if (elementClass.includes('pricing-card')) {
                        Analytics.trackEvent('element_view', 'engagement', 'pricing_card');
                    }
                }
            });
        }, observerOptions);

        const animatedElements = document.querySelectorAll(
            '.benefit-card, .testimonial-card, .feature-list-item, .section-title, .section-subtitle, .feature-detail-card, .pricing-card, .advanced-feature-card, .contact-info-card'
        );
        
        animatedElements.forEach((el, index) => {
            el.classList.add('animate-on-scroll');
            el.style.transitionDelay = `${index * 0.1}s`;
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
                    Analytics.trackEvent('counter_view', 'engagement', 'animated_counter');
                    counterObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        counters.forEach(counter => counterObserver.observe(counter));
    },

    initParallaxEffects() {
        const parallaxElements = document.querySelectorAll('.floating-card');
        
        window.addEventListener('scroll', Utils.throttle(() => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.5;
            
            parallaxElements.forEach(element => {
                element.style.transform = `translateY(${rate}px)`;
            });
        }, 16));
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
            
            /* Staggered animations */
            .animate-on-scroll:nth-child(1) { transition-delay: 0.1s; }
            .animate-on-scroll:nth-child(2) { transition-delay: 0.2s; }
            .animate-on-scroll:nth-child(3) { transition-delay: 0.3s; }
            .animate-on-scroll:nth-child(4) { transition-delay: 0.4s; }
            .animate-on-scroll:nth-child(5) { transition-delay: 0.5s; }
            .animate-on-scroll:nth-child(6) { transition-delay: 0.6s; }
        `;
        document.head.appendChild(style);
    }
};

/*
==================================
NAVBAR EFFECTS MODULE (rozšířený)
==================================
*/
const NavbarEffects = {
    navbar: null,
    lastScrollTop: 0,
    isScrollingDown: false,
    
    init() {
        this.navbar = document.querySelector('.navbar');
        if (!this.navbar) return;
        this.initScrollEffects();
        this.initMobileMenu();
    },

    initScrollEffects() {
        const scrollHandler = Utils.throttle(() => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            this.isScrollingDown = scrollTop > this.lastScrollTop;
            
            // Background opacity based on scroll
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
            
            // Hide/show navbar on mobile when scrolling
            if (window.innerWidth <= 768) {
                if (this.isScrollingDown && scrollTop > 200) {
                    this.navbar.style.transform = 'translateY(-100%)';
                } else {
                    this.navbar.style.transform = 'translateY(0)';
                }
            }
            
            this.lastScrollTop = scrollTop;
        }, 16);
        
        window.addEventListener('scroll', scrollHandler);
        scrollHandler(); // Initial call
    },

    initMobileMenu() {
        const toggleButton = this.navbar.querySelector('.navbar-toggler');
        const navbarCollapse = this.navbar.querySelector('.navbar-collapse');
        
        if (!toggleButton || !navbarCollapse) return;
        
        // Close mobile menu when clicking on links
        navbarCollapse.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 991) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                        toggle: false
                    });
                    bsCollapse.hide();
                }
            });
        });
        
        // Track mobile menu usage
        toggleButton.addEventListener('click', () => {
            Analytics.trackEvent('mobile_menu_toggle', 'navigation', 'hamburger');
        });
    }
};

/*
==================================
SMOOTH SCROLLING MODULE (rozšířený)
==================================
*/
const SmoothScrolling = {
    init() {
        this.bindAnchorLinks();
        this.initPageTransitions();
    },

    bindAnchorLinks() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80; // navbar height
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                    
                    Analytics.trackEvent('anchor_click', 'navigation', this.getAttribute('href'));
                }
            });
        });
    },

    initPageTransitions() {
        // Add page transition effect
        document.body.classList.add('page-transition');
        
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });
        
        // Smooth transitions for internal navigation
        document.querySelectorAll('a[href^="/"], a[n\\:href]').forEach(link => {
            link.addEventListener('click', function(e) {
                if (this.href && this.href !== window.location.href) {
                    document.body.classList.remove('loaded');
                    setTimeout(() => {
                        window.location.href = this.href;
                    }, 150);
                    e.preventDefault();
                }
            });
        });
    }
};

/*
==================================
PRICING TOGGLE MODULE (rozšířený)
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
            
            // Track pricing toggle
            Analytics.trackPricingInteraction(
                this.toggle.checked ? 'annual_view' : 'monthly_view'
            );
        });
        
        // Track initial view
        Analytics.trackPricingInteraction('pricing_page_view');
    },

    togglePrices() {
        const isAnnual = this.toggle.checked;
        
        // Add animation class
        document.querySelectorAll('.pricing-card').forEach(card => {
            card.style.transform = 'scale(0.95)';
            card.style.opacity = '0.7';
        });
        
        setTimeout(() => {
            if (isAnnual) {
                this.monthlyPrices.forEach(price => price.style.display = 'none');
                this.annualPrices.forEach(price => price.style.display = 'inline');
                this.annualNotes.forEach(note => note.style.display = 'block');
            } else {
                this.monthlyPrices.forEach(price => price.style.display = 'inline');
                this.annualPrices.forEach(price => price.style.display = 'none');
                this.annualNotes.forEach(note => note.style.display = 'none');
            }
            
            // Remove animation
            document.querySelectorAll('.pricing-card').forEach(card => {
                card.style.transform = 'scale(1)';
                card.style.opacity = '1';
            });
        }, 150);
    }
};

/*
==================================
SAVINGS CALCULATOR MODULE (rozšířený)
==================================
*/
const SavingsCalculator = {
    sliders: {},
    valueDisplays: {},
    resultElements: {},
    hasInteracted: false,
    
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
                    
                    if (!this.hasInteracted) {
                        Analytics.trackCalculatorUse();
                        this.hasInteracted = true;
                    }
                    
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
        this.animateResults();
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
    },

    animateResults() {
        // Subtle animation when values change - používáme zelenou barvu
        document.querySelectorAll('.savings-value').forEach(element => {
            element.style.transform = 'scale(1.05)';
            element.style.color = '#B1D235';
            
            setTimeout(() => {
                element.style.transform = 'scale(1)';
                element.style.color = '';
            }, 200);
        });
    }
};

/*
==================================
CONTACT FORM MODULE (rozšířený)
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
        this.initAutoSave();
    },

    initFields() {
        this.fields = {
            name: this.form.querySelector('input[name="name"]'),
            email: this.form.querySelector('input[name="email"]'),
            company: this.form.querySelector('input[name="company"]'),
            phone: this.form.querySelector('input[name="phone"]'),
            subject: this.form.querySelector('select[name="subject"]'),
            message: this.form.querySelector('textarea[name="message"]'),
            privacy: this.form.querySelector('#privacy')
        };
        this.submitButton = this.form.querySelector('input[type="submit"]');
    },

    bindEvents() {
        // Real-time validation
        Object.entries(this.fields).forEach(([name, field]) => {
            if (field && name !== 'privacy') {
                field.addEventListener('blur', () => {
                    this.validateField(name);
                });
                
                field.addEventListener('input', Utils.debounce(() => {
                    if (field.classList.contains('is-invalid')) {
                        this.validateField(name);
                    }
                }, 500));
            }
        });

        // Character counter for message
        if (this.fields.message) {
            this.addCharacterCounter();
        }

        // Form submission
        this.form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.handleSubmit();
        });

        // Track form interaction
        this.form.addEventListener('focusin', () => {
            Analytics.trackEvent('form_start', 'contact', 'contact_form');
        }, { once: true });
    },

    addCharacterCounter() {
        const counter = document.createElement('div');
        counter.className = 'character-counter text-muted small mt-1';
        counter.style.textAlign = 'right';
        this.fields.message.parentNode.appendChild(counter);
        
        const updateCounter = () => {
            const length = this.fields.message.value.length;
            const maxLength = 1000;
            counter.textContent = `${length}/${maxLength} znaků`;
            
            if (length > maxLength * 0.9) {
                counter.style.color = '#dc3545';
            } else if (length > maxLength * 0.7) {
                counter.style.color = '#ffc107';
            } else {
                counter.style.color = '#6c757d';
            }
        };
        
        this.fields.message.addEventListener('input', updateCounter);
        updateCounter();
    },

    initAutoSave() {
        // Auto-save form data to localStorage
        const formId = 'qrdoklad_contact_form';
        
        // Load saved data
        const savedData = localStorage.getItem(formId);
        if (savedData) {
            try {
                const data = JSON.parse(savedData);
                Object.entries(data).forEach(([name, value]) => {
                    if (this.fields[name] && name !== 'privacy') {
                        this.fields[name].value = value;
                    }
                });
                
                if (Object.keys(data).length > 0) {
                    Notifications.info('Obnovili jsme váš rozepsaný formulář', 3000);
                }
            } catch (e) {
                console.log('Chyba při načítání uložených dat:', e);
            }
        }
        
        // Save on input
        const saveData = Utils.debounce(() => {
            const data = {};
            Object.entries(this.fields).forEach(([name, field]) => {
                if (field && field.value && name !== 'privacy') {
                    data[name] = field.value;
                }
            });
            
            if (Object.keys(data).length > 0) {
                localStorage.setItem(formId, JSON.stringify(data));
            }
        }, 1000);
        
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
                }
                break;
                
            case 'email':
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!field.value.trim()) {
                    isValid = false;
                    errorMessage = 'Prosím vyplňte e-mailovou adresu';
                } else if (!emailRegex.test(field.value.trim())) {
                    isValid = false;
                    errorMessage = 'Prosím zadejte platnou e-mailovou adresu';
                }
                break;
                
            case 'message':
                if (!field.value.trim()) {
                    isValid = false;
                    errorMessage = 'Prosím napište nám zprávu';
                } else if (field.value.trim().length < 10) {
                    isValid = false;
                    errorMessage = 'Zpráva musí mít alespoň 10 znaků';
                }
                break;
        }
        
        this.setFieldValidationState(field, isValid, errorMessage);
        return isValid;
    },

    setFieldValidationState(field, isValid, errorMessage = '') {
        field.classList.remove('is-valid', 'is-invalid');
        
        let feedback = field.parentNode.querySelector('.invalid-feedback');
        if (!feedback) {
            feedback = document.createElement('div');
            feedback.className = 'invalid-feedback';
            field.parentNode.appendChild(feedback);
        }
        
        if (isValid) {
            field.classList.add('is-valid');
            feedback.textContent = '';
        } else {
            field.classList.add('is-invalid');
            feedback.textContent = errorMessage;
        }
    },

    validateForm() {
        let isValid = true;
        
        // Validate required fields
        ['name', 'email', 'message'].forEach(fieldName => {
            if (!this.validateField(fieldName)) {
                isValid = false;
            }
        });
        
        // Check privacy consent
        if (!this.fields.privacy.checked) {
            Notifications.error('Prosím potvrďte souhlas se zpracováním osobních údajů');
            this.fields.privacy.focus();
            isValid = false;
        }
        
        return isValid;
    },

    handleSubmit() {
        Analytics.trackEvent('form_submit_attempt', 'contact', 'contact_form');
        
        if (!this.validateForm()) {
            Analytics.trackFormSubmit('contact_form', false);
            return;
        }
        
        LoadingStates.show(this.submitButton, 'Odesílám...');
        
        // Simulace odeslání (nahradí se skutečným odesláním)
        setTimeout(() => {
            LoadingStates.success(this.submitButton, 'Odesláno!');
            Analytics.trackFormSubmit('contact_form', true);
            
            // VÝRAZNÁ SUCCESS ZPRÁVA
            Notifications.success(
                '🎉 <strong>Děkujeme za vaši zprávu!</strong><br>Ozveme se vám do 24 hodin na e-mail <strong>' + this.fields.email.value + '</strong>',
                8000
            );
            
            // Clear auto-saved data
            localStorage.removeItem('qrdoklad_contact_form');
            
            // Reset form after success
            setTimeout(() => {
                this.form.reset();
                this.form.querySelectorAll('.form-control').forEach(input => {
                    input.classList.remove('is-valid', 'is-invalid');
                });
            }, 2000);
            
        }, 2000);
    }
};

/*
==================================
UTILITIES (rozšířené)
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

    formatNumber(number, locale = 'cs-CZ') {
        return new Intl.NumberFormat(locale).format(number);
    },

    formatCurrency(amount, currency = 'CZK', locale = 'cs-CZ') {
        return new Intl.NumberFormat(locale, {
            style: 'currency',
            currency: currency
        }).format(amount);
    },

    getRandomId() {
        return Math.random().toString(36).substring(2, 15);
    },

    isEmailValid(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    },

    isMobile() {
        return window.innerWidth <= 768;
    },

    isTablet() {
        return window.innerWidth > 768 && window.innerWidth <= 1024;
    },

    isDesktop() {
        return window.innerWidth > 1024;
    }
};