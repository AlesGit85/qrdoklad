/**
 * QRdoklad Utilities Module
 * Obsahuje: Loading States, Notifications, Analytics
 * 
 * Barvy projektu:
 * - Primární: #B1D235
 * - Sekundární: #95B11F  
 * - Šedá: #6c757d
 * - Černá: #212529
 */

// Globální objekt pro utilities
window.Utilities = {
    LoadingStates: {},
    Notifications: {},
    Analytics: {}
};

/*
==================================
LOADING STATES MODULE
==================================
*/
window.Utilities.LoadingStates = {
    init() {
        console.log('📦 LoadingStates modul inicializován');
        this.addLoadingStyles();
        this.bindCTAButtons();
    },

    addLoadingStyles() {
        // Pokud už styly existují, nebudeme je přidávat znovu
        if (document.getElementById('loading-styles')) return;
        
        const style = document.createElement('style');
        style.id = 'loading-styles';
        style.textContent = `
            .loading {
                position: relative;
                pointer-events: none;
                opacity: 0.7;
            }
            
            .spin {
                animation: spin 1s linear infinite;
            }
            
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
            
            /* Custom range slider styles */
            .form-range::-webkit-slider-thumb {
                background: #B1D235 !important;
                border: none;
                height: 20px;
                width: 20px;
                border-radius: 50%;
                cursor: pointer;
                transition: all 0.2s ease;
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
        
        const originalBg = element.style.backgroundColor;
        
        if (element.tagName === 'INPUT') {
            element.value = text;
        } else {
            element.innerHTML = `<i class="bi bi-check-circle-fill me-2"></i>${text}`;
        }
        
        element.style.backgroundColor = '#95B11F';
        element.classList.remove('loading');
        
        setTimeout(() => {
            this.hide(element);
            element.style.backgroundColor = originalBg;
        }, duration);
    },

    error(element, text = 'Chyba!', duration = 3000) {
        if (!element) return;
        
        const originalBg = element.style.backgroundColor;
        
        if (element.tagName === 'INPUT') {
            element.value = text;
        } else {
            element.innerHTML = `<i class="bi bi-exclamation-circle-fill me-2"></i>${text}`;
        }
        
        element.style.backgroundColor = '#dc3545';
        element.classList.remove('loading');
        element.disabled = false;
        
        setTimeout(() => {
            this.hide(element);
            element.style.backgroundColor = originalBg;
        }, duration);
    },

    bindCTAButtons() {
        // Všechna CTA tlačítka
        document.querySelectorAll('a[href*="app.qrdoklad.cz"]').forEach(button => {
            button.addEventListener('click', (e) => {
                this.show(button, 'Přesměrování...');
                
                // Trackování
                if (window.Utilities.Analytics.trackCTAClick) {
                    window.Utilities.Analytics.trackCTAClick(button.textContent.trim(), window.location.pathname);
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
window.Utilities.Notifications = {
    container: null,
    
    init() {
        console.log('📦 Notifications modul inicializován');
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
        if (document.getElementById('notification-styles')) return;
        
        const style = document.createElement('style');
        style.id = 'notification-styles';
        style.textContent = `
            .notification {
                background: white;
                border-radius: 8px;
                padding: 16px 20px;
                margin-bottom: 12px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
                border-left: 4px solid #B1D235;
                pointer-events: auto;
                transform: translateX(100%);
                transition: all 0.3s ease;
                font-family: Inter, sans-serif;
                font-size: 14px;
                line-height: 1.4;
            }
            
            .notification.show {
                transform: translateX(0);
            }
            
            .notification.success {
                border-left-color: #95B11F;
            }
            
            .notification.error {
                border-left-color: #dc3545;
            }
            
            .notification.warning {
                border-left-color: #ffc107;
            }
            
            .notification .notification-title {
                font-weight: 600;
                margin-bottom: 4px;
                color: #212529;
            }
            
            .notification .notification-message {
                color: #6c757d;
                margin: 0;
            }
            
            .notification .notification-close {
                position: absolute;
                top: 8px;
                right: 12px;
                background: none;
                border: none;
                font-size: 18px;
                cursor: pointer;
                color: #6c757d;
                line-height: 1;
            }
            
            .notification .notification-close:hover {
                color: #212529;
            }
        `;
        document.head.appendChild(style);
    },

    show(message, type = 'info', duration = 5000) {
        if (!this.container) return;
        
        const notification = document.createElement('div');
        notification.className = `notification ${type}`;
        
        const titles = {
            success: 'Úspěch',
            error: 'Chyba',
            warning: 'Upozornění',
            info: 'Informace'
        };
        
        notification.innerHTML = `
            <div class="notification-title">${titles[type] || 'Informace'}</div>
            <div class="notification-message">${message}</div>
            <button class="notification-close" aria-label="Zavřít">&times;</button>
        `;
        
        // Close button
        notification.querySelector('.notification-close').addEventListener('click', () => {
            this.hide(notification);
        });
        
        this.container.appendChild(notification);
        
        // Show animation
        requestAnimationFrame(() => {
            notification.classList.add('show');
        });
        
        // Auto-hide
        if (duration > 0) {
            setTimeout(() => {
                this.hide(notification);
            }, duration);
        }
        
        return notification;
    },

    hide(notification) {
        notification.classList.remove('show');
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

    info(message, duration = 5000) {
        return this.show(message, 'info', duration);
    }
};

/*
==================================
ANALYTICS MODULE
==================================
*/
window.Utilities.Analytics = {
    initialized: false,
    
    init() {
        console.log('📦 Analytics modul inicializován');
        this.initialized = true;
        this.setupGoogleAnalytics();
    },

    setupGoogleAnalytics() {
        // Pokud je Google Analytics už načtený, nebudeme ho načítat znovu
        if (window.gtag) return;
        
        // Pro development prostředí používáme mock analytics
        if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
            this.setupMockAnalytics();
            return;
        }
        
        // Produkční Google Analytics
        const script = document.createElement('script');
        script.async = true;
        script.src = 'https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID';
        document.head.appendChild(script);
        
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        window.gtag = gtag;
        gtag('js', new Date());
        gtag('config', 'GA_TRACKING_ID');
    },
    
    setupMockAnalytics() {
        // Mock analytics pro development
        window.gtag = function() {
            console.log('🔍 Analytics:', arguments);
        };
    },

    trackEvent(action, category, label, value) {
        if (!this.initialized) return;
        
        if (window.gtag) {
            window.gtag('event', action, {
                event_category: category,
                event_label: label,
                value: value
            });
        }
        
        console.log(`📊 Event tracked: ${action} | ${category} | ${label}`, value || '');
    },

    trackCTAClick(buttonText, page) {
        this.trackEvent('cta_click', 'engagement', `${buttonText} - ${page}`);
    },

    trackPricingInteraction(toggleState) {
        this.trackEvent('pricing_toggle', 'pricing', toggleState ? 'annual' : 'monthly');
    },

    trackCalculatorUsage(monthlyInvoices, savings) {
        this.trackEvent('calculator_usage', 'pricing', 'savings_calculation', savings);
    },

    trackFormSubmission(formType, success = true) {
        this.trackEvent('form_submission', 'contact', `${formType}_${success ? 'success' : 'error'}`);
    },

    trackScrollDepth(percentage) {
        // Throttle scroll tracking
        if (!this.lastScrollTrack || Date.now() - this.lastScrollTrack > 5000) {
            this.trackEvent('scroll_depth', 'engagement', `${percentage}%`);
            this.lastScrollTrack = Date.now();
        }
    },

    trackPageView(pageName) {
        this.trackEvent('page_view', 'navigation', pageName);
    }
};

console.log('✅ Utilities modul načten - LoadingStates, Notifications, Analytics');