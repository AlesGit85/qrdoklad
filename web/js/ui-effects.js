/**
 * QRdoklad UI Effects Module - TESTOVACÍ VERZE
 * Jednoduchý test pro debugování
 */

console.log('🚀 UI-EFFECTS.JS SE NAČÍTÁ...');

// Testujeme, jestli se vůbec spustí
try {
    console.log('✅ UI-effects.js úspěšně načten');
    
    // Globální objekt pro UI efekty
    window.UIEffects = {
        ScrollEffects: {},
        NavbarEffects: {},
        SmoothScrolling: {}
    };
    
    // VELMI JEDNODUCHÝ ScrollEffects
    window.UIEffects.ScrollEffects = {
        init() {
            console.log('📦 ScrollEffects - INIT SPUŠTĚN');
            
            // Najdeme navbar
            const navbar = document.querySelector('.navbar');
            console.log('🧭 Navbar nalezen:', navbar ? 'ANO' : 'NE');
            
            if (navbar) {
                // Nastavíme počáteční stav
                const initialScrollY = window.scrollY;
                console.log('🎯 Počáteční scroll pozice:', initialScrollY);
                
                // Testujeme, zda scroll listener vůbec funguje
                let scrollCount = 0;
                
                // VELMI JEDNODUCHÝ scroll listener - méně logů
                const handleScroll = function() {
                    scrollCount++;
                    const scrollY = window.scrollY;
                    
                    // Logujeme jen změny stavu, ne pozici
                    if (scrollY > 100) {
                        if (!navbar.classList.contains('navbar-scrolled')) {
                            navbar.classList.add('navbar-scrolled');
                            console.log('🎨 Navbar → tmavší');
                        }
                    } else {
                        if (navbar.classList.contains('navbar-scrolled')) {
                            navbar.classList.remove('navbar-scrolled');
                            console.log('🎨 Navbar → černý');
                        }
                    }
                };
                
                // Přidáme event listener
                window.addEventListener('scroll', handleScroll);
                
                // Test - zkusíme scroll listener spustit ručně po 2 sekundách
                setTimeout(() => {
                    console.log('🧪 Testování scroll listeneru...');
                    window.scrollTo({ top: 150, behavior: 'smooth' });
                }, 2000);
                
                console.log('✅ Scroll listener připojen k navbar (jednoduchá verze)');
            }
        }
    };
    
    // VELMI JEDNODUCHÝ NavbarEffects
    window.UIEffects.NavbarEffects = {
        init() {
            console.log('📦 NavbarEffects - INIT SPUŠTĚN');
        }
    };
    
    // VELMI JEDNODUCHÝ SmoothScrolling
    window.UIEffects.SmoothScrolling = {
        init() {
            console.log('📦 SmoothScrolling - INIT SPUŠTĚN');
        }
    };
    
    console.log('✅ Všechny UIEffects moduly vytvořeny');
    
} catch (error) {
    console.error('❌ CHYBA v ui-effects.js:', error);
}

// Přidáme CSS styly pro navbar
(function addNavbarStyles() {
    if (document.getElementById('navbar-styles')) return;
    
    const style = document.createElement('style');
    style.id = 'navbar-styles';
    style.textContent = `
        .navbar {
            transition: all 0.3s ease !important;
            background-color: #212529 !important;
            backdrop-filter: blur(10px) !important;
        }
        
        .navbar.navbar-scrolled {
            background-color: #2c3034 !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.3) !important;
        }
        
        /* Ještě silnější pravidla pro jistotu */
        .navbar.navbar-scrolled.navbar-scrolled {
            background: #2c3034 !important;
            background-color: #2c3034 !important;
        }
    `;
    document.head.appendChild(style);
    console.log('✅ Navbar CSS styly přidány s vysokou prioritou');
})();