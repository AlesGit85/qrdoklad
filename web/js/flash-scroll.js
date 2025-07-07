/**
 * Flash Messages Auto-Scroll
 * Automaticky scrolluje na flash messages po načtení stránky
 */

document.addEventListener('DOMContentLoaded', function() {
    // ✅ Hledáme flash messages na stránce
    const flashMessages = document.querySelectorAll('.alert, .flash-message, [class*="alert"]');
    
    if (flashMessages.length > 0) {
        // Najdeme první flash message
        const firstFlash = flashMessages[0];
        
        // Počkáme 100ms aby se stránka úplně načetla
        setTimeout(function() {
            // ✅ Smooth scroll na první flash message
            firstFlash.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center',
                inline: 'nearest'
            });
            
            // ✅ Přidáme vizuální highlight efekt
            firstFlash.style.transition = 'all 0.3s ease';
            firstFlash.style.transform = 'scale(1.02)';
            firstFlash.style.boxShadow = '0 4px 20px rgba(177, 210, 53, 0.3)';
            
            // Vrátíme zpět po 2 sekundách
            setTimeout(function() {
                firstFlash.style.transform = 'scale(1)';
                firstFlash.style.boxShadow = 'none';
            }, 2000);
            
            console.log('Flash message displayed and scrolled into view');
        }, 100);
    }
});

// ✅ Funkce pro manuální scroll na flash messages (pro AJAX použití)
window.scrollToFlashMessages = function() {
    const flashContainer = document.querySelector('.flash-messages, .alerts, #flashes');
    const flashMessages = document.querySelectorAll('.alert, .flash-message, [class*="alert"]');
    
    if (flashContainer) {
        flashContainer.scrollIntoView({ 
            behavior: 'smooth', 
            block: 'start' 
        });
    } else if (flashMessages.length > 0) {
        flashMessages[0].scrollIntoView({ 
            behavior: 'smooth', 
            block: 'center' 
        });
    }
};

// ✅ Monitoring form submissions pro debug
document.addEventListener('submit', function(e) {
    const form = e.target;
    if (form.id === 'frm-contactForm' || form.getAttribute('data-form') === 'contact') {
        console.log('Contact form submitted - will check for flash messages after reload');
        
        // Uložíme flag do sessionStorage že se formulář odeslal
        sessionStorage.setItem('formSubmitted', 'true');
    }
});

// ✅ Po načtení stránky zkontrolujeme jestli byl formulář odeslaný
document.addEventListener('DOMContentLoaded', function() {
    if (sessionStorage.getItem('formSubmitted') === 'true') {
        sessionStorage.removeItem('formSubmitted');
        
        // Přidáme extra highlighting pokud byl formulář právě odeslaný
        setTimeout(function() {
            const flashMessages = document.querySelectorAll('.alert, .flash-message, [class*="alert"]');
            flashMessages.forEach(function(flash) {
                flash.style.animation = 'pulse 0.5s ease-in-out';
            });
        }, 150);
    }
});

// ✅ CSS animace (pokud není definována jinde)
if (!document.querySelector('#flash-animations-css')) {
    const style = document.createElement('style');
    style.id = 'flash-animations-css';
    style.textContent = `
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }
        
        .alert {
            transition: all 0.3s ease;
        }
        
        .alert:target {
            animation: pulse 0.6s ease-in-out;
        }
    `;
    document.head.appendChild(style);
}