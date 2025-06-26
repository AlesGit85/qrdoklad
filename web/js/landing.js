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
            console.log('ℹ️ Utilities modul není dostupný (bude v dalším kroku)');
        }
        
        // 2. UI efekty (scroll, navbar, smooth scrolling) - UPRAVENO v kroku 1!
        if (typeof UIEffects !== 'undefined') {
            console.log('✅ Inicializuji UIEffects moduly...');
            UIEffects.init();
        } else {
            console.warn('⚠️ UIEffects modul nenalezen');
        }
        
        // 3. Pricing funkcionalita - UPRAVENO v kroku 3!
        if (typeof PricingModule !== 'undefined') {
            console.log('✅ Inicializuji PricingModule...');
            PricingModule.init();
        } else {
            console.log('ℹ️ PricingModule není dostupný');
        }
        
        // 4. Formuláře - UPRAVENO v kroku 2!
        if (typeof FormHandler !== 'undefined') {
            console.log('✅ Inicializuji FormHandler...');
            FormHandler.init();
        } else {
            console.log('ℹ️ FormHandler není dostupný');
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