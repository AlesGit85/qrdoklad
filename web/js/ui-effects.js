/**
 * QRdoklad UI Effects
 * Všechny UI efekty, animace, loading stavy a notifikace
 */

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
                
                // Pokud Analytics existuje, použijeme je
                if (typeof Analytics !== 'undefined') {
                    Analytics.trackCTAClick(button.textContent.trim(), window.location.pathname);
                }
                
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
NOTIFICATIONS MODULE
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
LIGHTBOX MODULE - NOVÝ
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
            this.bindEvents();
        }
        console.log('LightboxModule - nalezeno obrázků:', this.images.length);
    },

    findImages() {
        // Najdeme všechny preview kontejnery v sekci ukázka systému
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
                
                // Přidáme click listener
                container.addEventListener('click', (e) => {
                    e.preventDefault();
                    this.openLightbox(index);
                });
                
                // Přidáme tabindex pro accessibility
                container.setAttribute('tabindex', '0');
                container.setAttribute('role', 'button');
                container.setAttribute('aria-label', `Zobrazit obrázek: ${img.alt || 'Ukázka systému'}`);
                
                // Keyboard support pro jednotlivé obrázky
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
        // Vytvoříme lightbox HTML strukturu
        this.overlay = document.createElement('div');
        this.overlay.className = 'lightbox-overlay';
        this.overlay.innerHTML = `
            <div class="lightbox-container">
                <img class="lightbox-image" alt="" />
                <div class="lightbox-caption">
                    <h4 class="lightbox-title"></h4>
                    <p class="lightbox-description"></p>
                </div>
                <button class="lightbox-close" aria-label="Zavřít lightbox">
                    <i class="bi bi-x-lg"></i>
                </button>
                <button class="lightbox-nav prev" aria-label="Předchozí obrázek">
                    <i class="bi bi-chevron-left"></i>
                </button>
                <button class="lightbox-nav next" aria-label="Následující obrázek">
                    <i class="bi bi-chevron-right"></i>
                </button>
                <div class="lightbox-counter"></div>
                <div class="lightbox-loading" style="display: none;"></div>
            </div>
        `;
        
        document.body.appendChild(this.overlay);
        
        // Cachujeme elementy pro rychlejší přístup
        this.elements = {
            container: this.overlay.querySelector('.lightbox-container'),
            image: this.overlay.querySelector('.lightbox-image'),
            title: this.overlay.querySelector('.lightbox-title'),
            description: this.overlay.querySelector('.lightbox-description'),
            caption: this.overlay.querySelector('.lightbox-caption'),
            closeBtn: this.overlay.querySelector('.lightbox-close'),
            prevBtn: this.overlay.querySelector('.lightbox-nav.prev'),
            nextBtn: this.overlay.querySelector('.lightbox-nav.next'),
            counter: this.overlay.querySelector('.lightbox-counter'),
            loading: this.overlay.querySelector('.lightbox-loading')
        };
    },

    bindEvents() {
        // Zavření lightboxu
        this.elements.closeBtn.addEventListener('click', () => this.closeLightbox());
        
        // Klik mimo obrázek zavře lightbox
        this.overlay.addEventListener('click', (e) => {
            if (e.target === this.overlay) {
                this.closeLightbox();
            }
        });
        
        // Navigace
        this.elements.prevBtn.addEventListener('click', () => this.showPrevious());
        this.elements.nextBtn.addEventListener('click', () => this.showNext());
        
        // Keyboard support
        document.addEventListener('keydown', (e) => {
            if (!this.isOpen) return;
            
            switch(e.key) {
                case 'Escape':
                    this.closeLightbox();
                    break;
                case 'ArrowLeft':
                    this.showPrevious();
                    break;
                case 'ArrowRight':
                    this.showNext();
                    break;
            }
        });
        
        // Touch/swipe support pro mobily
        let startX = 0;
        let endX = 0;
        
        this.overlay.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });
        
        this.overlay.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            const diff = startX - endX;
            
            if (Math.abs(diff) > 50) { // Minimální vzdálenost pro swipe
                if (diff > 0) {
                    this.showNext(); // Swipe doleva = další
                } else {
                    this.showPrevious(); // Swipe doprava = předchozí
                }
            }
        });
    },

    openLightbox(index) {
        if (!this.images.length || index < 0 || index >= this.images.length) return;
        
        this.currentIndex = index;
        this.isOpen = true;
        
        // Zablokujeme scrollování stránky
        document.body.style.overflow = 'hidden';
        
        // Zobrazíme loading
        this.showLoading();
        
        // Načteme obrázek
        this.loadImage(this.images[index]);
        
        // Zobrazíme lightbox
        this.overlay.classList.add('active');
        
        // Focus na zavírací tlačítko pro accessibility
        setTimeout(() => {
            this.elements.closeBtn.focus();
        }, 300);
        
        // Analytics tracking (pokud existuje)
        if (typeof Analytics !== 'undefined') {
            Analytics.trackEvent('lightbox_open', 'interaction', `image_${index}`);
        }
        
        console.log('LightboxModule - otevřen lightbox pro obrázek:', index);
    },

    closeLightbox() {
        if (!this.isOpen) return;
        
        this.isOpen = false;
        this.overlay.classList.remove('active');
        
        // Obnovíme scrollování
        document.body.style.overflow = '';
        
        // Vrátíme focus na původní element
        if (this.images[this.currentIndex] && this.images[this.currentIndex].element) {
            this.images[this.currentIndex].element.focus();
        }
        
        console.log('LightboxModule - lightbox zavřen');
    },

    showPrevious() {
        if (!this.isOpen || this.images.length <= 1) return;
        
        this.currentIndex = this.currentIndex > 0 ? this.currentIndex - 1 : this.images.length - 1;
        this.showLoading();
        this.loadImage(this.images[this.currentIndex]);
        
        console.log('LightboxModule - předchozí obrázek:', this.currentIndex);
    },

    showNext() {
        if (!this.isOpen || this.images.length <= 1) return;
        
        this.currentIndex = this.currentIndex < this.images.length - 1 ? this.currentIndex + 1 : 0;
        this.showLoading();
        this.loadImage(this.images[this.currentIndex]);
        
        console.log('LightboxModule - následující obrázek:', this.currentIndex);
    },

    showLoading() {
        this.elements.loading.style.display = 'block';
        this.elements.image.style.opacity = '0.5';
    },

    hideLoading() {
        this.elements.loading.style.display = 'none';
        this.elements.image.style.opacity = '1';
    },

    loadImage(imageData) {
        // Vytvoříme nový Image objekt pro preloading
        const img = new Image();
        
        img.onload = () => {
            // Obrázek se načetl úspěšně
            this.elements.image.src = imageData.src;
            this.elements.image.alt = imageData.alt;
            
            // Aktualizujeme caption
            this.elements.title.textContent = imageData.title;
            this.elements.description.textContent = imageData.description;
            
            // Skryjeme/zobrazíme caption podle obsahu
            if (imageData.title || imageData.description) {
                this.elements.caption.style.display = 'block';
            } else {
                this.elements.caption.style.display = 'none';
            }
            
            // Aktualizujeme počítadlo
            this.updateCounter();
            
            // Aktualizujeme navigační tlačítka
            this.updateNavigation();
            
            // Skryjeme loading
            this.hideLoading();
        };
        
        img.onerror = () => {
            console.error('LightboxModule - chyba při načítání obrázku:', imageData.src);
            this.hideLoading();
            
            // Zobrazíme error placeholder
            this.elements.title.textContent = 'Chyba při načítání';
            this.elements.description.textContent = 'Obrázek se nepodařilo načíst.';
            this.elements.caption.style.display = 'block';
        };
        
        // Spustíme načítání
        img.src = imageData.src;
    },

    updateCounter() {
        this.elements.counter.textContent = `${this.currentIndex + 1} / ${this.images.length}`;
        
        // Skryjeme počítadlo pokud je jen jeden obrázek
        if (this.images.length <= 1) {
            this.elements.counter.style.display = 'none';
        } else {
            this.elements.counter.style.display = 'block';
        }
    },

    updateNavigation() {
        // Zobrazíme/skryjeme navigační tlačítka
        if (this.images.length <= 1) {
            this.elements.prevBtn.classList.remove('visible');
            this.elements.nextBtn.classList.remove('visible');
        } else {
            this.elements.prevBtn.classList.add('visible');
            this.elements.nextBtn.classList.add('visible');
        }
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
                    
                    // Track element visibility - pouze pokud Analytics existuje
                    if (typeof Analytics !== 'undefined') {
                        const elementClass = entry.target.className;
                        if (elementClass.includes('pricing-card')) {
                            Analytics.trackEvent('element_view', 'engagement', 'pricing_card');
                        }
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
                    
                    // Track pouze pokud Analytics existuje
                    if (typeof Analytics !== 'undefined') {
                        Analytics.trackEvent('counter_view', 'engagement', 'animated_counter');
                    }
                    
                    counterObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);
        
        counters.forEach(counter => counterObserver.observe(counter));
    },

    initParallaxEffects() {
        const parallaxElements = document.querySelectorAll('.floating-card');
        
        if (parallaxElements.length === 0) return;
        
        window.addEventListener('scroll', this.throttle(() => {
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
    },

    // Pomocná funkce throttle (abychom nemuseli záviset na Utils)
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
        this.initScrollEffects();
        this.initMobileMenu();
    },

    initScrollEffects() {
        const scrollHandler = this.throttle(() => {
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
                    // Pokud Bootstrap je dostupný
                    if (typeof bootstrap !== 'undefined') {
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                            toggle: false
                        });
                        bsCollapse.hide();
                    }
                }
            });
        });
        
        // Track mobile menu usage - pouze pokud Analytics existuje
        toggleButton.addEventListener('click', () => {
            if (typeof Analytics !== 'undefined') {
                Analytics.trackEvent('mobile_menu_toggle', 'navigation', 'hamburger');
            }
        });
    },

    // Pomocná funkce throttle
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
                    
                    // Track pouze pokud Analytics existuje
                    if (typeof Analytics !== 'undefined') {
                        Analytics.trackEvent('anchor_click', 'navigation', this.getAttribute('href'));
                    }
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
INIT FUNCTION PRO UI EFFECTS
==================================
*/
const UIEffects = {
    init() {
        console.log('UIEffects - Inicializace začíná');
        
        // Inicializace všech UI modulů s detailním debug
        console.log('UIEffects - spouštím LoadingStates');
        LoadingStates.init();
        
        console.log('UIEffects - spouštím Notifications');
        Notifications.init();
        
        console.log('UIEffects - spouštím LightboxModule'); // NOVÉ
        LightboxModule.init();
        
        console.log('UIEffects - spouštím ScrollEffects');
        ScrollEffects.init();
        
        console.log('UIEffects - spouštím NavbarEffects');
        NavbarEffects.init();
        
        console.log('UIEffects - spouštím SmoothScrolling');
        SmoothScrolling.init();
        
        // NOUZOVÉ ŘEŠENÍ PRO POČÍTADLA
        console.log('UIEffects - spouštím nouzové řešení počítadel');
        setTimeout(() => {
            const statNumbers = document.querySelectorAll('[data-target]');
            console.log('UIEffects - nalezeno počítadel:', statNumbers.length);
            
            // Nejdříve nastavíme všechna počítadla na 0 pro konzistentní start
            statNumbers.forEach((counter) => {
                counter.textContent = '0';
            });
            
            // Pak je za chvilku animujeme
            setTimeout(() => {
                statNumbers.forEach((counter, index) => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    console.log(`UIEffects - animuji počítadlo ${index} z 0 do ${target}`);
                    
                    if (target && !counter.dataset.animated) {
                        counter.dataset.animated = 'true';
                        this.animateCounterDirect(counter, target);
                    }
                });
            }, 300); // Krátká pauza aby uživatel viděl, že se všechny nastavily na 0
        }, 1000);
        
        console.log('UIEffects - Inicializace dokončena');
    },
    
    // Přímá animace počítadel (vždy od 0)
    animateCounterDirect(counter, target) {
        console.log(`UIEffects - animuji počítadlo od 0 do ${target}`);
        
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                counter.textContent = target.toLocaleString('cs-CZ');
                clearInterval(timer);
                console.log(`UIEffects - počítadlo dokončeno: ${target}`);
            } else {
                counter.textContent = Math.floor(current).toLocaleString('cs-CZ');
            }
        }, 16);
    }
};

// Export pro možné použití v jiných souborech
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { UIEffects, LoadingStates, Notifications, LightboxModule, ScrollEffects, NavbarEffects, SmoothScrolling };
}