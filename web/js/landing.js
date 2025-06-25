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

document.addEventListener('DOMContentLoaded', function() {
    console.log('QRdoklad Landing Page - DOMContentLoaded');
    
    // Inicializace modulů postupně - pouze těch, které existují
    try {
        // 1. Nejdříve utility (loading, notifikace, analytics)
        if (window.Utilities) {
            console.log('✅ Inicializuji Utilities moduly...');
            if (window.Utilities.LoadingStates) window.Utilities.LoadingStates.init();
            if (window.Utilities.Notifications) window.Utilities.Notifications.init();
            if (window.Utilities.Analytics) window.Utilities.Analytics.init();
        } else {
            console.warn('⚠️ Utilities modul nenalezen');
        }
        
        // 2. UI efekty (scroll, navbar, smooth scrolling)
        if (window.UIEffects) {
            console.log('✅ Inicializuji UIEffects moduly...');
            if (window.UIEffects.ScrollEffects) window.UIEffects.ScrollEffects.init();
            if (window.UIEffects.NavbarEffects) window.UIEffects.NavbarEffects.init();
            if (window.UIEffects.SmoothScrolling) window.UIEffects.SmoothScrolling.init();
        } else {
            console.warn('⚠️ UIEffects modul nenalezen');
        }
        
        // 3. Pricing funkcionalita (pouze pokud existuje a je na stránce)
        if (window.PricingModule && (document.getElementById('priceToggle') || document.querySelector('.savings-calculator'))) {
            console.log('✅ Inicializuji PricingModule...');
            if (window.PricingModule.PricingToggle) window.PricingModule.PricingToggle.init();
            if (window.PricingModule.SavingsCalculator) window.PricingModule.SavingsCalculator.init();
        } else if (!window.PricingModule) {
            console.log('ℹ️ PricingModule není dostupný (bude v dalším kroku)');
        }
        
        // 4. Formuláře (pouze pokud existuje a je na stránce)
        if (window.FormHandler && document.querySelector('#contactForm')) {
            console.log('✅ Inicializuji FormHandler...');
            if (window.FormHandler.ContactForm) window.FormHandler.ContactForm.init();
        } else if (!window.FormHandler) {
            console.log('ℹ️ FormHandler není dostupný (bude v dalším kroku)');
        }
        
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
 * Globální utility funkce dostupné z celé aplikace
 */
window.QRDoklad = {
    // Verze pro debug
    version: '1.0.0',
    
    // Trackování pro analytics
    trackEvent: function(action, category, label) {
        if (window.Utilities && window.Utilities.Analytics) {
            window.Utilities.Analytics.trackEvent(action, category, label);
        }
    },
    
    // Notifikace
    showNotification: function(message, type = 'info') {
        if (window.Utilities && window.Utilities.Notifications) {
            window.Utilities.Notifications.show(message, type);
        } else {
            console.log(`📢 ${type.toUpperCase()}: ${message}`);
        }
    },
    
    // Loading state
    showLoading: function(element, text) {
        if (window.Utilities && window.Utilities.LoadingStates) {
            window.Utilities.LoadingStates.show(element, text);
        }
    },
    
    hideLoading: function(element) {
        if (window.Utilities && window.Utilities.LoadingStates) {
            window.Utilities.LoadingStates.hide(element);
        }
    }
};

// Debug informace
console.log('🚀 QRdoklad Landing v' + window.QRDoklad.version + ' načten');