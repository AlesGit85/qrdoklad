/**
 * QRdoklad UI Effects
 * Všechny UI efekty, animace, loading stavy a notifikace
 * 
 * Barvy projektu:
 * - Primární: #B1D235
 * - Sekundární: #95B11F  
 * - Šedá: #6c757d
 * - Černá: #212529
 */

/*
==================================
LOADING STATES MODULE
==================================
*/
const LoadingStates = {
    init() {
        console.log('LoadingStates - inicializace');
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
        
        const originalText = element.dataset.originalText;
        element.innerHTML = `<i class="bi bi-check-circle me-2"></i>${text}`;
        element.classList.remove('loading');
        element.classList.add('success');
        
        setTimeout(() => {
            element.innerHTML = originalText;
            element.classList.remove('success');
            element.disabled = false;
        }, duration);
    },

    error(element, text = 'Chyba!', duration = 3000) {
        if (!element) return;
        
        const originalText = element.dataset.originalText;
        element.innerHTML = `<i class="bi bi-exclamation-circle me-2"></i>${text}`;
        element.classList.remove('loading');
        element.classList.add('error');
        
        setTimeout(() => {
            element.innerHTML = originalText;
            element.classList.remove('error');
            element.disabled = false;
        }, duration);
    },

    bindCTAButtons() {
        document.querySelectorAll('.btn-primary, .btn-success').forEach(btn => {
            if (btn.type === 'submit') return; // Skip form buttons
            
            btn.addEventListener('click', (e) => {
                if (btn.classList.contains('loading')) {
                    e.preventDefault();
                    return;
                }
                
                this.show(btn, 'Načítání...');
                
                // Simulace loading pro demo účely
                setTimeout(() => {
                    this.success(btn, 'Úspěch!');
                }, 1500);
            });
        });
    },

    addLoadingStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .loading {
                opacity: 0.8;
                cursor: not-allowed;
                background-color: #95B11F !important;
                border-color: #95B11F !important;
                color: #212529 !important;
            }
            
            .success {
                background-color: #B1D235 !important;
                border-color: #B1D235 !important;
                color: #212529 !important;
            }
            
            .error {
                background-color: #dc3545 !important;
                border-color: #dc3545 !important;
                color: white !important;
            }
            
            .spin {
                animation: spin 1s linear infinite;
            }
            
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(style);
    }
};

/*
==================================
NOTIFICATIONS MODULE
==================================
*/
const Notifications = {
    container: null,
    
    init() {
        console.log('Notifications - inicializace');
        this.createContainer();
        this.addNotificationStyles();
    },

    createContainer() {
        this.container = document.createElement('div');
        this.container.id = 'notifications-container';
        this.container.className = 'notifications-container';
        document.body.appendChild(this.container);
    },

    show(message, type = 'info', duration = 4000) {
        const notification = this.createNotification(message, type);
        this.container.appendChild(notification);
        
        // Trigger animation
        setTimeout(() => {
            notification.classList.add('show');
        }, 10);
        
        // Auto remove
        if (duration > 0) {
            setTimeout(() => {
                this.remove(notification);
            }, duration);
        }
        
        return notification;
    },

    createNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        
        const icons = {
            success: 'bi-check-circle',
            error: 'bi-exclamation-triangle',
            warning: 'bi-exclamation-circle',
            info: 'bi-info-circle'
        };
        
        notification.innerHTML = `
            <div class="notification-content">
                <i class="bi ${icons[type] || icons.info} notification-icon"></i>
                <span class="notification-message">${message}</span>
                <button class="notification-close" aria-label="Zavřít">
                    <i class="bi bi-x"></i>
                </button>
            </div>
        `;
        
        // Close button functionality
        const closeBtn = notification.querySelector('.notification-close');
        closeBtn.addEventListener('click', () => {
            this.remove(notification);
        });
        
        return notification;
    },

    remove(notification) {
        notification.classList.add('hide');
        setTimeout(() => {
            if (notification.parentNode) {
                notification.parentNode.removeChild(notification);
            }
        }, 300);
    },

    success(message, duration = 4000) {
        return this.show(message, 'success', duration);
    },

    error(message, duration = 6000) {
        return this.show(message, 'error', duration);
    },

    warning(message, duration = 5000) {
        return this.show(message, 'warning', duration);
    },

    info(message, duration = 4000) {
        return this.show(message, 'info', duration);
    },

    addNotificationStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .notifications-container {
                position: fixed;
                top: 20px;
                right: 20px;
                z-index: 9999;
                pointer-events: none;
                width: 320px;
                max-width: calc(100vw - 40px);
            }
            
            .notification {
                background: white;
                border-radius: 8px;
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
                margin-bottom: 10px;
                opacity: 0;
                transform: translateX(100%);
                transition: all 0.3s ease;
                pointer-events: auto;
                border-left: 4px solid;
            }
            
            .notification.show {
                opacity: 1;
                transform: translateX(0);
            }
            
            .notification.hide {
                opacity: 0;
                transform: translateX(100%);
            }
            
            .notification-success {
                border-left-color: #B1D235;
            }
            
            .notification-error {
                border-left-color: #dc3545;
            }
            
            .notification-warning {
                border-left-color: #ffc107;
            }
            
            .notification-info {
                border-left-color: #6c757d;
            }
            
            .notification-content {
                padding: 16px;
                display: flex;
                align-items: center;
                gap: 12px;
            }
            
            .notification-icon {
                font-size: 1.2rem;
                flex-shrink: 0;
            }
            
            .notification-success .notification-icon {
                color: #B1D235;
            }
            
            .notification-error .notification-icon {
                color: #dc3545;
            }
            
            .notification-warning .notification-icon {
                color: #ffc107;
            }
            
            .notification-info .notification-icon {
                color: #6c757d;
            }
            
            .notification-message {
                flex: 1;
                color: #212529;
                font-size: 0.9rem;
                line-height: 1.4;
            }
            
            .notification-close {
                background: none;
                border: none;
                color: #6c757d;
                cursor: pointer;
                padding: 4px;
                border-radius: 4px;
                transition: all 0.2s ease;
                flex-shrink: 0;
            }
            
            .notification-close:hover {
                background: rgba(108, 117, 125, 0.1);
                color: #212529;
            }
            
            @media (max-width: 480px) {
                .notifications-container {
                    top: 10px;
                    right: 10px;
                    left: 10px;
                    width: auto;
                    max-width: none;
                }
                
                .notification-content {
                    padding: 12px;
                    gap: 8px;
                }
                
                .notification-message {
                    font-size: 0.85rem;
                }
            }
        `;
        document.head.appendChild(style);
    }
};

/*
==================================
LIGHTBOX MODULE
==================================
*/
const LightboxModule = {
    overlay: null,
    images: [],
    currentIndex: 0,
    isOpen: false,
    
    init() {
        console.log('LightboxModule - Inicializace začíná');
        this.findImages();
        if (this.images.length > 0) {
            this.createLightboxHTML();
            this.bindLightboxEvents();
        }
        console.log('LightboxModule - nalezeno obrázků:', this.images.length);
    },

    findImages() {
        const containers = document.querySelectorAll('.preview-image-container');
        this.images = [];
        
        containers.forEach((container, index) => {
            const img = container.querySelector('.preview-image');
            const titleElement = container.querySelector('.preview-content h4, .preview-content h5');
            const descElement = container.querySelector('.preview-content p');
            
            if (img && img.src) {
                this.images.push({
                    src: img.src,
                    alt: img.alt || '',
                    title: titleElement ? titleElement.textContent.trim() : '',
                    description: descElement ? descElement.textContent.trim() : '',
                    element: container
                });
                
                container.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.openLightbox(index);
                });
                
                container.setAttribute('tabindex', '0');
                container.setAttribute('role', 'button');
                container.setAttribute('aria-label', `Zobrazit obrázek: ${img.alt || 'Ukázka systému'}`);
                
                container.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        this.openLightbox(index);
                    }
                });
            }
        });
        
        console.log('LightboxModule - zpracované obrázky:', this.images);
    },

    createLightboxHTML() {
        this.overlay = document.createElement('div');
        this.overlay.className = 'lightbox-overlay';
        this.overlay.innerHTML = `
            <div class="lightbox-container">
                <img class="lightbox-image" alt="" />
                <div class="lightbox-caption">
                    <h4 class="lightbox-title"></h4>
                    <p class="lightbox-description"></p>
                </div>
                <button class="lightbox-close" aria-label="Zavřít">
                    <i class="bi bi-x"></i>
                </button>
                <button class="lightbox-prev" aria-label="Předchozí">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="lightbox-next" aria-label="Další">
                    <i class="bi bi-chevron-right"></i>
                </button>
                <div class="lightbox-counter"></div>
            </div>
        `;
        
        document.body.appendChild(this.overlay);
        this.bindLightboxEvents();
        this.addLightboxStyles();
    },

    bindLightboxEvents() {
        // Close lightbox
        this.overlay.querySelector('.lightbox-close').addEventListener('click', () => {
            this.closeLightbox();
        });
        
        // Navigation
        this.overlay.querySelector('.lightbox-prev').addEventListener('click', () => {
            this.prevImage();
        });
        
        this.overlay.querySelector('.lightbox-next').addEventListener('click', () => {
            this.nextImage();
        });
        
        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (!this.isOpen) return;
            
            switch (e.key) {
                case 'Escape':
                    this.closeLightbox();
                    break;
                case 'ArrowLeft':
                    this.prevImage();
                    break;
                case 'ArrowRight':
                    this.nextImage();
                    break;
            }
        });
        
        // Click outside to close
        this.overlay.addEventListener('click', (e) => {
            if (e.target === this.overlay) {
                this.closeLightbox();
            }
        });
    },

    openLightbox(index) {
        this.currentIndex = index;
        this.isOpen = true;
        this.updateLightbox();
        this.overlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    },

    closeLightbox() {
        this.isOpen = false;
        this.overlay.classList.remove('active');
        document.body.style.overflow = '';
    },

    prevImage() {
        this.currentIndex = (this.currentIndex - 1 + this.images.length) % this.images.length;
        this.updateLightbox();
    },

    nextImage() {
        this.currentIndex = (this.currentIndex + 1) % this.images.length;
        this.updateLightbox();
    },

    updateLightbox() {
        const imageData = this.images[this.currentIndex];
        const img = this.overlay.querySelector('.lightbox-image');
        const title = this.overlay.querySelector('.lightbox-title');
        const description = this.overlay.querySelector('.lightbox-description');
        const counter = this.overlay.querySelector('.lightbox-counter');
        
        img.src = imageData.src;
        img.alt = imageData.alt;
        title.textContent = imageData.title;
        description.textContent = imageData.description;
        counter.textContent = `${this.currentIndex + 1} / ${this.images.length}`;
    },

    addLightboxStyles() {
        const style = document.createElement('style');
        style.textContent = `
            .lightbox-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.9);
                z-index: 10000;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }
            
            .lightbox-overlay.active {
                opacity: 1;
                visibility: visible;
            }
            
            .lightbox-container {
                position: relative;
                max-width: 90vw;
                max-height: 90vh;
                text-align: center;
            }
            
            .lightbox-image {
                max-width: 100%;
                max-height: 70vh;
                border-radius: 8px;
                box-shadow: 0 8px 40px rgba(0, 0, 0, 0.5);
            }
            
            .lightbox-caption {
                color: white;
                margin-top: 20px;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }
            
            .lightbox-title {
                font-size: 1.5rem;
                margin-bottom: 10px;
                color: #B1D235;
            }
            
            .lightbox-description {
                font-size: 1rem;
                opacity: 0.9;
                line-height: 1.5;
            }
            
            .lightbox-close,
            .lightbox-prev,
            .lightbox-next {
                position: absolute;
                background: rgba(255, 255, 255, 0.1);
                border: none;
                color: white;
                cursor: pointer;
                padding: 15px;
                border-radius: 50%;
                transition: all 0.3s ease;
                backdrop-filter: blur(10px);
            }
            
            .lightbox-close {
                top: 20px;
                right: 20px;
                font-size: 1.5rem;
            }
            
            .lightbox-prev {
                left: 20px;
                top: 50%;
                transform: translateY(-50%);
                font-size: 1.2rem;
            }
            
            .lightbox-next {
                right: 20px;
                top: 50%;
                transform: translateY(-50%);
                font-size: 1.2rem;
            }
            
            .lightbox-close:hover,
            .lightbox-prev:hover,
            .lightbox-next:hover {
                background: rgba(177, 210, 53, 0.8);
                color: #212529;
            }
            
            .lightbox-counter {
                position: absolute;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                background: rgba(0, 0, 0, 0.7);
                color: white;
                padding: 8px 16px;
                border-radius: 20px;
                font-size: 0.9rem;
            }
            
            @media (max-width: 768px) {
                .lightbox-prev,
                .lightbox-next {
                    display: none;
                }
                
                .lightbox-container {
                    max-width: 95vw;
                    max-height: 95vh;
                }
                
                .lightbox-image {
                    max-height: 60vh;
                }
                
                .lightbox-caption {
                    margin-top: 15px;
                }
                
                .lightbox-title {
                    font-size: 1.2rem;
                }
            }
        `;
        document.head.appendChild(style);
    }
};

/*
==================================
SCROLL EFFECTS MODULE
==================================
*/
const ScrollEffects = {
    observer: null,
    
    init() {
        console.log('ScrollEffects - Inicializace začíná');
        this.initScrollAnimations();
        this.initCounterAnimations();
        this.initParallaxEffects();
        this.addScrollAnimationStyles();
        console.log('ScrollEffects - Inicializace dokončena');
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
            '.benefit-card, .testimonial-card, .feature-list-item, .section-title, .section-subtitle, .feature-detail-card, .pricing-card, .advanced-feature-card, .contact-info-card'
        );
        
        animatedElements.forEach((el, index) => {
            el.classList.add('animate-on-scroll');
            el.style.transitionDelay = `${index * 0.1}s`;
            this.observer.observe(el);
        });
    },

    initCounterAnimations() {
        const counters = document.querySelectorAll('[data-target]');
        if (counters.length === 0) return;
        
        const observerOptions = { threshold: 0.5 };
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.dataset.animated) {
                    this.animateCounter(entry.target);
                    entry.target.dataset.animated = 'true';
                    counterObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        counters.forEach(counter => {
            counter.textContent = '0';
            counterObserver.observe(counter);
        });
    },

    initParallaxEffects() {
        const parallaxElements = document.querySelectorAll('.floating-card');
        
        if (parallaxElements.length === 0) return;
        
        window.addEventListener('scroll', this.throttle(() => {
            const scrolled = window.pageYOffset;
            const rate = scrolled * -0.3;
            
            parallaxElements.forEach(element => {
                element.style.transform = `translateY(${rate}px)`;
            });
        }, 16));
    },

    animateCounter(counter) {
        const target = parseInt(counter.getAttribute('data-target'));
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
    isScrollingDown: false,
    
    init() {
        this.navbar = document.querySelector('.navbar');
        if (!this.navbar) return;
        
        console.log('NavbarEffects - inicializace');
        this.initScrollEffects();
        this.initMobileMenu();
    },

    initScrollEffects() {
        const scrollHandler = this.throttle(() => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            this.isScrollingDown = scrollTop > this.lastScrollTop;
            
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
            
            this.lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }, 10);

        window.addEventListener('scroll', scrollHandler);
    },

    initMobileMenu() {
        const toggleButton = this.navbar.querySelector('.navbar-toggler');
        const navCollapse = this.navbar.querySelector('.navbar-collapse');
        
        if (!toggleButton || !navCollapse) return;

        toggleButton.addEventListener('click', () => {
            const isExpanded = toggleButton.getAttribute('aria-expanded') === 'true';
            
            if (!isExpanded) {
                navCollapse.style.maxHeight = navCollapse.scrollHeight + 'px';
            } else {
                navCollapse.style.maxHeight = '0';
            }
        });
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
    }
};

/*
==================================
SMOOTH SCROLLING MODULE
==================================
*/
const SmoothScrolling = {
    init() {
        console.log('SmoothScrolling - inicializace');
        this.bindAnchorLinks();
        this.initPageTransitions();
    },

    bindAnchorLinks() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    },

    initPageTransitions() {
        document.body.classList.add('page-transition');
        
        window.addEventListener('load', () => {
            document.body.classList.add('loaded');
        });
        
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
MAIN UI EFFECTS MODULE
==================================
*/
const UIEffects = {
    init() {
        console.log('UIEffects - Inicializace začíná');
        
        try {
            // Inicializace všech UI modulů
            console.log('UIEffects - spouštím LoadingStates');
            LoadingStates.init();
            
            console.log('UIEffects - spouštím Notifications');
            Notifications.init();
            
            console.log('UIEffects - spouštím LightboxModule');
            LightboxModule.init();
            
            console.log('UIEffects - spouštím ScrollEffects');
            ScrollEffects.init();
            
            console.log('UIEffects - spouštím NavbarEffects');
            NavbarEffects.init();
            
            console.log('UIEffects - spouštím SmoothScrolling');
            SmoothScrolling.init();
            
            console.log('UIEffects - Inicializace dokončena');
            
        } catch (error) {
            console.error('UIEffects - Chyba při inicializaci:', error);
        }
    }
};

// Export pro možné použití v jiných souborech
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { 
        UIEffects, 
        LoadingStates, 
        Notifications, 
        LightboxModule, 
        ScrollEffects, 
        NavbarEffects, 
        SmoothScrolling 
    };
}

// Mobilní menu oprava - přidej na konec souboru ui-effects.js nebo landing.js

/*
==================================
MOBILE MENU FIX MODULE
==================================
*/
const MobileMenuFix = {
    navbar: null,
    navbarCollapse: null,
    
    init() {
        this.navbar = document.querySelector('.navbar');
        this.navbarCollapse = document.querySelector('.navbar-collapse');
        
        if (!this.navbar || !this.navbarCollapse) return;
        
        console.log('MobileMenuFix - inicializace');
        this.initMobileMenuEvents();
    },

    initMobileMenuEvents() {
        const toggleButton = document.querySelector('.navbar-toggler');
        if (!toggleButton) return;

        // Event listener pro kliknutí na hamburger
        toggleButton.addEventListener('click', () => {
            setTimeout(() => {
                this.updateMenuBackground();
            }, 50); // Malé zpoždění aby Bootstrap stihl své změny
        });

        // Event listener pro Bootstrap collapse události
        this.navbarCollapse.addEventListener('show.bs.collapse', () => {
            this.showMobileMenu();
        });

        this.navbarCollapse.addEventListener('hide.bs.collapse', () => {
            this.hideMobileMenu();
        });

        // Event listener pro kliknutí mimo menu
        document.addEventListener('click', (e) => {
            if (!this.navbar.contains(e.target)) {
                this.hideMobileMenu();
            }
        });
    },

    showMobileMenu() {
        console.log('Zobrazuji mobilní menu');
        
        // Aplikuj styly pro rozbalené menu
        this.navbar.style.background = 'rgba(0, 0, 0, 0.98)';
        this.navbar.style.backdropFilter = 'blur(25px)';
        this.navbar.style.paddingBottom = '2rem';
        this.navbar.style.boxShadow = '0 8px 40px rgba(0, 0, 0, 0.8)';
        
        // Styluj collapse container
        this.navbarCollapse.style.background = 'rgba(0, 0, 0, 0.95)';
        this.navbarCollapse.style.padding = '1.5rem 1rem';
        this.navbarCollapse.style.margin = '1rem -1rem 0 -1rem';
        this.navbarCollapse.style.borderTop = '1px solid rgba(255, 255, 255, 0.1)';
        this.navbarCollapse.style.borderRadius = '0 0 15px 15px';
        
        // Přidej třídu pro CSS
        this.navbar.classList.add('mobile-menu-open');
    },

    hideMobileMenu() {
        console.log('Skrývám mobilní menu');
        
        // Vrať původní styly
        this.navbar.style.background = 'rgba(0, 0, 0, 0.95)';
        this.navbar.style.paddingBottom = '1rem';
        this.navbar.style.boxShadow = '0 8px 32px rgba(0, 0, 0, 0.5)';
        
        // Vyčisti collapse styly
        this.navbarCollapse.style.background = '';
        this.navbarCollapse.style.padding = '';
        this.navbarCollapse.style.margin = '';
        this.navbarCollapse.style.borderTop = '';
        this.navbarCollapse.style.borderRadius = '';
        
        // Odstraň třídu
        this.navbar.classList.remove('mobile-menu-open');
    },

    updateMenuBackground() {
        const isOpen = this.navbarCollapse.classList.contains('show');
        
        if (isOpen) {
            this.showMobileMenu();
        } else {
            this.hideMobileMenu();
        }
    }
};

// Automatická inicializace když se DOM načte
document.addEventListener('DOMContentLoaded', function() {
    MobileMenuFix.init();
});

// Fallback pro případ, že už je DOM načtený
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', function() {
        MobileMenuFix.init();
    });
} else {
    MobileMenuFix.init();
}