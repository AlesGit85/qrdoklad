/**
 * QRdoklad Documentation JavaScript
 * Interaktivní funkce pro dokumentaci
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // ============================
    // SIDEBAR NAVIGATION
    // ============================
    
    /**
     * Aktivní odkaz v sidebar podle scrollu
     */
    function updateActiveNavLink() {
        const sections = document.querySelectorAll('.docs-section-content[id]');
        const navLinks = document.querySelectorAll('.docs-nav .nav-link[href^="#"]');
        
        let currentSection = '';
        
        sections.forEach(section => {
            const rect = section.getBoundingClientRect();
            if (rect.top <= 150 && rect.bottom >= 150) {
                currentSection = section.id;
            }
        });
        
        navLinks.forEach(link => {
            const href = link.getAttribute('href').substring(1);
            if (href === currentSection) {
                link.classList.add('active');
            } else {
                link.classList.remove('active');
            }
        });
    }
    
    // Spustit při načtení a scrollu
    updateActiveNavLink();
    window.addEventListener('scroll', updateActiveNavLink);
    
    /**
     * Smooth scroll pro sidebar odkazy
     */
    const sidebarLinks = document.querySelectorAll('.docs-nav .nav-link[href^="#"]');
    sidebarLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                const headerOffset = 100;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // ============================
    // VYHLEDÁVÁNÍ V DOKUMENTACI
    // ============================
    
    const searchInput = document.getElementById('docsSearch');
    
    if (searchInput) {
        let searchTimeout;
        
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                performSearch(this.value.trim());
            }, 300);
        });
        
        // Enter pro vyhledávání
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                performSearch(this.value.trim());
            }
        });
    }
    
    /**
     * Provede vyhledávání v dokumentaci
     */
    function performSearch(query) {
        const sections = document.querySelectorAll('.docs-section-content');
        const navLinks = document.querySelectorAll('.docs-nav .nav-link');
        
        if (query === '') {
            // Zobrazit všechny sekce
            sections.forEach(section => {
                section.style.display = '';
            });
            navLinks.forEach(link => {
                link.style.display = '';
            });
            removeHighlights();
            return;
        }
        
        const queryLower = query.toLowerCase();
        let hasResults = false;
        
        sections.forEach(section => {
            const content = section.textContent.toLowerCase();
            const sectionId = section.id;
            const correspondingNavLink = document.querySelector(`.docs-nav .nav-link[href="#${sectionId}"]`);
            
            if (content.includes(queryLower)) {
                section.style.display = '';
                if (correspondingNavLink) {
                    correspondingNavLink.style.display = '';
                }
                highlightText(section, query);
                hasResults = true;
            } else {
                section.style.display = 'none';
                if (correspondingNavLink) {
                    correspondingNavLink.style.display = 'none';
                }
            }
        });
        
        // Zobrazit zprávu pokud nejsou výsledky
        showNoResultsMessage(!hasResults, query);
    }
    
    /**
     * Zvýrazní nalezený text
     */
    function highlightText(container, query) {
        removeHighlights(container);
        
        const walker = document.createTreeWalker(
            container,
            NodeFilter.SHOW_TEXT,
            null,
            false
        );
        
        const textNodes = [];
        let node;
        while (node = walker.nextNode()) {
            textNodes.push(node);
        }
        
        textNodes.forEach(textNode => {
            const text = textNode.textContent;
            const regex = new RegExp(`(${escapeRegExp(query)})`, 'gi');
            
            if (regex.test(text)) {
                const highlightedHTML = text.replace(regex, '<mark class="search-highlight">$1</mark>');
                const wrapper = document.createElement('span');
                wrapper.innerHTML = highlightedHTML;
                textNode.parentNode.replaceChild(wrapper, textNode);
            }
        });
    }
    
    /**
     * Odstraní zvýraznění
     */
    function removeHighlights(container = document) {
        const highlights = container.querySelectorAll('.search-highlight');
        highlights.forEach(highlight => {
            const parent = highlight.parentNode;
            parent.replaceChild(document.createTextNode(highlight.textContent), highlight);
            parent.normalize();
        });
    }
    
    /**
     * Zobrazí zprávu o nenalezených výsledcích
     */
    function showNoResultsMessage(show, query) {
        let noResultsDiv = document.getElementById('no-results-message');
        
        if (show) {
            if (!noResultsDiv) {
                noResultsDiv = document.createElement('div');
                noResultsDiv.id = 'no-results-message';
                noResultsDiv.className = 'alert alert-warning text-center';
                noResultsDiv.innerHTML = `
                    <i class="bi bi-search" style="font-size: 2rem; margin-bottom: 1rem;"></i>
                    <h5>Nenašli jsme žádné výsledky</h5>
                    <p class="mb-0">Pro dotaz "<strong>${escapeHtml(query)}</strong>" nebyla nalezena žádná dokumentace.</p>
                `;
                
                const docsContent = document.querySelector('.docs-content');
                if (docsContent) {
                    docsContent.appendChild(noResultsDiv);
                }
            }
        } else {
            if (noResultsDiv) {
                noResultsDiv.remove();
            }
        }
    }
    
    // ============================
    // UTILITY FUNCTIONS
    // ============================
    
    /**
     * Escapuje speciální znaky pro regex
     */
    function escapeRegExp(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }
    
    /**
     * Escapuje HTML znaky
     */
    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, function(m) { return map[m]; });
    }
    
    // ============================
    // KLÁVESOVÉ ZKRATKY
    // ============================
    
    document.addEventListener('keydown', function(e) {
        // "/" pro fokus na vyhledávání
        if (e.key === '/' && !e.ctrlKey && !e.altKey && !e.metaKey) {
            // Pouze pokud není fokus v input fieldu
            if (document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA') {
                e.preventDefault();
                if (searchInput) {
                    searchInput.focus();
                }
            }
        }
        
        // Escape pro vyčištění vyhledávání
        if (e.key === 'Escape') {
            if (searchInput && searchInput === document.activeElement) {
                searchInput.value = '';
                performSearch('');
                searchInput.blur();
            }
        }
    });
    
    // ============================
    // ACCORDION ENHANCEMENTS
    // ============================
    
    /**
     * Vylepšení pro Bootstrap accordion
     */
    const accordionButtons = document.querySelectorAll('.accordion-button');
    accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Scroll do view pokud je accordion dole
            setTimeout(() => {
                const rect = this.getBoundingClientRect();
                if (rect.top < 100) {
                    this.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }, 350); // Delay pro dokončení animace
        });
    });
    
    // ============================
    // COPY CODE FUNCTIONALITY
    // ============================
    
    /**
     * Přidá copy tlačítka ke code blokům (pokud existují)
     */
    function addCopyButtons() {
        const codeBlocks = document.querySelectorAll('pre code, .highlight code');
        
        codeBlocks.forEach(codeBlock => {
            const button = document.createElement('button');
            button.className = 'btn btn-sm btn-outline-secondary copy-code-btn';
            button.innerHTML = '<i class="bi bi-clipboard"></i>';
            button.title = 'Kopírovat kód';
            
            button.addEventListener('click', function() {
                const code = codeBlock.textContent;
                navigator.clipboard.writeText(code).then(() => {
                    this.innerHTML = '<i class="bi bi-check2"></i>';
                    this.classList.remove('btn-outline-secondary');
                    this.classList.add('btn-success');
                    
                    setTimeout(() => {
                        this.innerHTML = '<i class="bi bi-clipboard"></i>';
                        this.classList.remove('btn-success');
                        this.classList.add('btn-outline-secondary');
                    }, 2000);
                });
            });
            
            const wrapper = document.createElement('div');
            wrapper.className = 'code-block-wrapper';
            wrapper.style.position = 'relative';
            
            codeBlock.parentNode.insertBefore(wrapper, codeBlock);
            wrapper.appendChild(codeBlock);
            wrapper.appendChild(button);
            
            // Stylování copy tlačítka
            button.style.position = 'absolute';
            button.style.top = '10px';
            button.style.right = '10px';
            button.style.zIndex = '10';
        });
    }
    
    addCopyButtons();
    
    // ============================
    // SCROLL PROGRESS INDICATOR
    // ============================
    
    /**
     * Indikátor postupu čtení
     */
    function createScrollProgress() {
        const progressBar = document.createElement('div');
        progressBar.className = 'scroll-progress';
        progressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            z-index: 9999;
            transition: width 0.1s ease;
        `;
        
        document.body.appendChild(progressBar);
        
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPercent = (scrollTop / docHeight) * 100;
            
            progressBar.style.width = Math.min(scrollPercent, 100) + '%';
        });
    }
    
    createScrollProgress();
    
    // ============================
    // PRINT STYLES HELPER
    // ============================
    
    /**
     * Příprava pro tisk
     */
    window.addEventListener('beforeprint', function() {
        // Rozbalit všechny accordion při tisku
        const accordionCollapses = document.querySelectorAll('.accordion-collapse');
        accordionCollapses.forEach(collapse => {
            collapse.classList.add('show');
        });
        
        // Odstranit zvýraznění vyhledávání při tisku
        removeHighlights();
    });
    
    window.addEventListener('afterprint', function() {
        // Vrátit accordion do původního stavu
        const accordionCollapses = document.querySelectorAll('.accordion-collapse');
        accordionCollapses.forEach(collapse => {
            if (!collapse.classList.contains('show')) {
                collapse.classList.remove('show');
            }
        });
    });
    
    console.log('📚 QRdoklad dokumentace načtena úspěšně!');
});