/**
 * QRdoklad API Documentation JavaScript
 * Funkcionality pro API dokumentaci stránku
 * Konzistentní s ostatními moduly
 */

const APIDocumentation = {
    init() {
        console.log('🚀 API Documentation - Inicializace začíná');
        
        try {
            this.initNavigation();
            this.initScrollEffects();
            this.initCodeBlocks();
            
            console.log('✅ API Documentation - Inicializace dokončena');
        } catch (error) {
            console.error('❌ API Documentation - Chyba při inicializaci:', error);
        }
    },

    /**
     * Inicializace API navigace
     */
    initNavigation() {
        const navLinks = document.querySelectorAll('.api-navigation .nav-link');
        const sections = document.querySelectorAll('section[id]');
        
        if (!navLinks.length || !sections.length) {
            console.log('🔍 API Navigation - Navigace nenalezena, přeskakuji');
            return;
        }

        console.log('🧭 API Navigation - Inicializace navigace');

        // Smooth scroll pro navigační odkazy
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                const targetId = link.getAttribute('href');
                const targetSection = document.querySelector(targetId);
                
                if (targetSection) {
                    const offsetTop = targetSection.offsetTop - 120; // offset pro sticky nav
                    
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                    
                    // Tracking
                    if (typeof gtag !== 'undefined') {
                        gtag('event', 'api_navigation', {
                            'section': targetId.replace('#', ''),
                            'event_category': 'API Documentation'
                        });
                    }
                }
            });
        });

        // Aktivní sekce v navigaci při scrollování
        let ticking = false;
        
        const updateActiveNav = () => {
            let current = '';
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 150;
                if (window.scrollY >= sectionTop) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        };

        const handleScroll = () => {
            if (!ticking) {
                requestAnimationFrame(() => {
                    updateActiveNav();
                    ticking = false;
                });
                ticking = true;
            }
        };

        // Event listeners
        window.addEventListener('scroll', handleScroll);
        updateActiveNav(); // Počáteční nastavení

        console.log('✅ API Navigation - Navigace inicializována');
    },

    /**
     * Scroll efekty pro API stránku
     */
    initScrollEffects() {
        console.log('📜 API Scroll Effects - Inicializace');

        // Animace karet při scrollování
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Pozorování karet
        const cards = document.querySelectorAll('.endpoint-card, .feature-card, .sdk-card, .auth-method, .webhook-info');
        cards.forEach((card, index) => {
            // Nastavení počátečního stavu
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = `all 0.6s ease ${index * 0.1}s`;
            
            observer.observe(card);
        });

        console.log(`✅ API Scroll Effects - Pozorování ${cards.length} karet`);
    },

    /**
     * Vylepšení code bloků
     */
    initCodeBlocks() {
        console.log('💻 API Code Blocks - Inicializace');

        const codeBlocks = document.querySelectorAll('.code-block');
        
        codeBlocks.forEach(block => {
            // Přidání copy button (jednoduchá verze)
            const wrapper = block.closest('.code-example');
            if (wrapper && !wrapper.querySelector('.copy-btn')) {
                this.addCopyButton(wrapper, block);
            }
        });

        console.log(`✅ API Code Blocks - ${codeBlocks.length} bloků připraveno`);
    },

    /**
     * Přidání copy tlačítka k code bloku
     */
    addCopyButton(wrapper, codeBlock) {
        const header = wrapper.querySelector('.code-header');
        if (!header) return;

        const copyBtn = document.createElement('button');
        copyBtn.className = 'btn btn-sm btn-outline-light copy-btn ms-2';
        copyBtn.innerHTML = '<i class="bi bi-clipboard"></i>';
        copyBtn.title = 'Zkopírovat do schránky';
        
        copyBtn.style.cssText = `
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.8rem;
            padding: 4px 8px;
            border: 1px solid rgba(255,255,255,0.3);
            background: rgba(255,255,255,0.1);
            color: white;
            transition: all 0.3s ease;
        `;

        copyBtn.addEventListener('click', () => {
            const text = codeBlock.textContent || codeBlock.innerText;
            
            // Kopírování do schránky
            if (navigator.clipboard) {
                navigator.clipboard.writeText(text).then(() => {
                    this.showCopyFeedback(copyBtn);
                }).catch(() => {
                    this.fallbackCopy(text, copyBtn);
                });
            } else {
                this.fallbackCopy(text, copyBtn);
            }

            // Tracking
            if (typeof gtag !== 'undefined') {
                gtag('event', 'code_copy', {
                    'event_category': 'API Documentation',
                    'event_label': 'Copy Code'
                });
            }
        });

        header.style.position = 'relative';
        header.appendChild(copyBtn);
    },

    /**
     * Zobrazení zpětné vazby po kopírování
     */
    showCopyFeedback(button) {
        const originalContent = button.innerHTML;
        button.innerHTML = '<i class="bi bi-check"></i>';
        button.style.background = 'rgba(34, 197, 94, 0.8)';
        
        setTimeout(() => {
            button.innerHTML = originalContent;
            button.style.background = 'rgba(255,255,255,0.1)';
        }, 1500);
    },

    /**
     * Fallback kopírování pro starší prohlížeče
     */
    fallbackCopy(text, button) {
        const textArea = document.createElement('textarea');
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        
        try {
            document.execCommand('copy');
            this.showCopyFeedback(button);
        } catch (err) {
            console.error('Chyba při kopírování:', err);
        }
        
        document.body.removeChild(textArea);
    }
};

// Auto-inicializace pokud jsme na API stránce
document.addEventListener('DOMContentLoaded', () => {
    // Kontrola, zda jsme na API stránce
    if (document.querySelector('.api-navigation') || 
        document.querySelector('.getting-started-section') ||
        window.location.pathname.includes('api')) {
        
        APIDocumentation.init();
    }
});

// Export pro možné použití
if (typeof module !== 'undefined' && module.exports) {
    module.exports = { APIDocumentation };
}