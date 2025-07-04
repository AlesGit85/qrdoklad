// FAQ stránka - JavaScript funkcionalita

document.addEventListener('DOMContentLoaded', function() {
    initFAQSearch();
    initCategoryLinks();
});

/**
 * Inicializace vyhledávání v FAQ
 */
function initFAQSearch() {
    const searchInput = document.getElementById('faqSearch');
    const accordionItems = document.querySelectorAll('.accordion-item');
    
    if (!searchInput) return;
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        accordionItems.forEach(item => {
            const question = item.querySelector('.accordion-button').textContent.toLowerCase();
            const answer = item.querySelector('.accordion-body').textContent.toLowerCase();
            
            if (!searchTerm || question.includes(searchTerm) || answer.includes(searchTerm)) {
                // Zobrazit položku
                item.style.display = '';
                
                // Zvýrazni shodu v otázce
                const button = item.querySelector('.accordion-button');
                if (searchTerm && question.includes(searchTerm)) {
                    button.style.background = 'linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%)';
                    button.style.color = 'white';
                } else {
                    button.style.background = '';
                    button.style.color = '';
                }
            } else {
                // Skrýt položku
                item.style.display = 'none';
            }
        });
    });
}

/**
 * Inicializace smooth scroll pro kategorie
 */
function initCategoryLinks() {
    const categoryLinks = document.querySelectorAll('.category-link');
    
    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
}