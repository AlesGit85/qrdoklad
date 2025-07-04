/**
 * QRdoklad Landing Page JavaScript
 * Hlavní inicializační soubor
 * 
 * Barvy projektu:
 * - Primární: #B1D235
 * - Sekundární: #95B11F  
 * - Šedá: #6c757d
 * - Černá: #212529
 */

/*
==================================
SCROLL TO TOP MODUL
==================================
*/
const ScrollToTop = {
    button: null,
    threshold: 300, // Po kolika pixelech se tlačítko zobrazí
    
    init() {
        this.button = document.getElementById('scrollToTop');
        
        if (!this.button) {
            console.log('ScrollToTop - tlačítko nenalezeno');
            return;
        }
        
        console.log('ScrollToTop - inicializace...');
        this.bindEvents();
        this.checkScroll(); // Počáteční kontrola
    },
    
    bindEvents() {
        // Scroll událost pro zobrazení/skrytí tlačítka (throttled)
        let scrollTimeout;
        window.addEventListener('scroll', () => {
            if (scrollTimeout) {
                clearTimeout(scrollTimeout);
            }
            scrollTimeout = setTimeout(() => {
                this.checkScroll();
            }, 10);
        });
        
        // Click událost pro scroll nahoru
        this.button.addEventListener('click', (e) => {
            e.preventDefault();
            this.scrollToTop();
        });
    },
    
    checkScroll() {
        const scrolled = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrolled > this.threshold) {
            this.showButton();
        } else {
            this.hideButton();
        }
    },
    
    showButton() {
        this.button.classList.add('show');
    },
    
    hideButton() {
        this.button.classList.remove('show');
    },
    
    scrollToTop() {
        // Smooth scroll nahoru
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        
        // Analytics tracking (pokud je GA k dispozici)
        if (typeof gtag !== 'undefined') {
            gtag('event', 'scroll_to_top', {
                event_category: 'UI',
                event_label: 'scroll_to_top_click'
            });
        }
        
        console.log('ScrollToTop - scrollování nahoru');
    }
};

document.addEventListener('DOMContentLoaded', function() {
    console.log('🚀 QRdoklad Landing Page - inicializace začíná');
    
    // Inicializace modulů postupně - pouze těch, které skutečně existují
    try {
        // 1. UI efekty (scroll, navbar, smooth scrolling, lightbox)
        if (typeof UIEffects !== 'undefined') {
            console.log('✅ Inicializuji UIEffects moduly...');
            UIEffects.init();
        } else {
            console.warn('⚠️ UIEffects modul nenalezen');
        }
        
        // 2. Pricing funkcionalita
        if (typeof PricingModule !== 'undefined') {
            console.log('✅ Inicializuji PricingModule...');
            PricingModule.init();
        } else {
            console.log('ℹ️ PricingModule není dostupný na této stránce');
        }
        
        // 3. Formuláře
        if (typeof FormHandler !== 'undefined') {
            console.log('✅ Inicializuji FormHandler...');
            FormHandler.init();
        } else {
            console.log('ℹ️ FormHandler není dostupný na této stránce');
        }
        
        // 4. Scroll to Top tlačítko
        console.log('✅ Inicializuji ScrollToTop...');
        ScrollToTop.init();
        
        console.log('🎉 QRdoklad Landing Page - inicializace dokončena');
        
    } catch (error) {
        console.error('❌ Chyba při inicializaci modulů:', error);
        
        // Fallback - alespoň základní funkcionalita
        console.log('🔄 Spouštím fallback inicializaci...');
        initFallback();
    }
});

/**
 * Fallback inicializace pro případ selhání hlavních modulů
 */
function initFallback() {
    console.log('🔄 Spouštím fallback inicializaci...');
    
    // Základní smooth scrolling
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
    
    // Základní navbar scroll efekt
    let lastScrollY = window.scrollY;
    window.addEventListener('scroll', () => {
        const navbar = document.querySelector('.navbar');
        if (navbar) {
            if (window.scrollY > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        }
    });
    
    console.log('✅ Fallback inicializace dokončena');
}

/**
 * Globální utility funkce pro analytics a tracking
 */
window.QRdoklad = {
    /**
     * Jednoduché trackování událostí
     */
    track(action, category = 'general', label = '') {
        try {
            // Google Analytics 4 (pokud je dostupný)
            if (typeof gtag !== 'undefined') {
                gtag('event', action, {
                    event_category: category,
                    event_label: label
                });
            }
            
            // Debug v konzoli
            console.log('📊 Track:', { action, category, label });
        } catch (error) {
            console.warn('Track error:', error);
        }
    },

    /**
     * Utility funkce pro formátování
     */
    formatCurrency(amount, currency = 'CZK') {
        return new Intl.NumberFormat('cs-CZ', {
            style: 'currency',
            currency: currency
        }).format(amount);
    },

    /**
     * Utility pro kontrolu mobile zařízení
     */
    isMobile() {
        return window.innerWidth <= 768;
    },

    /**
     * Debounce funkce pro optimalizaci event listenerů
     */
    debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
};

// Export pro případné další použití
window.LandingInit = {
    initFallback,
    track: window.QRdoklad.track
};

