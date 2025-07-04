<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/blog.latte */
final class Template_df0c1384cf extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/blog.latte';

	public const Blocks = [
		['content' => 'blockContent'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		if ($this->global->snippetDriver?->renderSnippets($this->blocks[self::LayerSnippet], $this->params)) {
			return;
		}

		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '
<!-- Hero sekce pro blog -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    Blog <span class="text-primary">QRdoklad</span>
                </h1>
                <p class="hero-subtitle">
                    Tipy, triky a novinky pro moderní podnikatele. Praktické rady o fakturaci, 
                    účetnictví a digitalizaci vašeho podnikání.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Filtry a kategorie -->
<section class="blog-filters py-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <!-- Kategorie filtry - vycentrované -->
                <div class="text-center mb-4">
                    <div class="btn-group" role="group">
                        <input type="radio" class="btn-check" name="categoryFilter" id="filterAll" checked>
                        <label class="btn btn-outline-primary" for="filterAll">Všechny</label>
                        
                        <input type="radio" class="btn-check" name="categoryFilter" id="filterTips">
                        <label class="btn btn-outline-primary" for="filterTips">Tipy</label>
                        
                        <input type="radio" class="btn-check" name="categoryFilter" id="filterBusiness">
                        <label class="btn btn-outline-primary" for="filterBusiness">Podnikání</label>
                        
                        <input type="radio" class="btn-check" name="categoryFilter" id="filterTech">
                        <label class="btn btn-outline-primary" for="filterTech">Technologie</label>
                        
                        <input type="radio" class="btn-check" name="categoryFilter" id="filterNews">
                        <label class="btn btn-outline-primary" for="filterNews">Novinky</label>
                    </div>
                </div>
                
                <!-- Vyhledávání - vycentrované -->
                <div class="text-center">
                    <div class="blog-search d-inline-block">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="bi bi-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Hledat články..." id="blogSearch">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Hlavní článek (featured) -->
<section class="featured-article py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="featured-card bg-white rounded-3 shadow-sm overflow-hidden">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="featured-image">
                                <div class="article-image-placeholder bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 300px;">
                                    <i class="bi bi-image text-primary" style="font-size: 3rem;"></i>
                                </div>
                                <div class="featured-badge position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-primary">Doporučujeme</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="featured-content p-4 p-lg-5">
                                <div class="article-meta mb-3">
                                    <span class="badge bg-success me-2">Tipy</span>
                                    <span class="text-muted small">5. 7. 2025 • 8 min čtení</span>
                                </div>
                                <h3 class="featured-title mb-3">
                                    <a href="#" class="text-decoration-none text-dark">
                                        10 způsobů, jak zrychlit platby od klientů
                                    </a>
                                </h3>
                                <p class="featured-excerpt text-muted mb-4">
                                    Praktické tipy a triky, jak motivovat klienty k rychlejším platbám. 
                                    Od QR plateb přes automatické připomínky až po smluvní podmínky.
                                </p>
                                <div class="featured-author d-flex align-items-center justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 95 */;
		echo '/images/ales-avatar.webp" alt="Aleš Zita" class="author-avatar rounded-circle me-2" style="width: 40px; height: 40px;">
                                        <div>
                                            <small class="text-muted">Napsal</small>
                                            <div class="fw-semibold">Aleš Zita</div>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-primary">Číst článek</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Seznam článků -->
<section class="articles-grid py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h2 class="section-title text-center mb-5">Nejnovější články</h2>
                
                <div class="row g-4" id="articlesGrid">
                    <!-- Článek 1 -->
                    <div class="col-lg-4 col-md-6" data-category="business">
                        <article class="article-card bg-white rounded-3 shadow-sm h-100">
                            <div class="article-image">
                                <div class="image-placeholder bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="bi bi-graph-up text-success" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="article-content p-4">
                                <div class="article-meta mb-3">
                                    <span class="badge bg-success me-2">Podnikání</span>
                                    <span class="text-muted small">2. 7. 2025 • 6 min</span>
                                </div>
                                <h5 class="article-title mb-3">
                                    <a href="#" class="text-decoration-none text-dark">
                                        Jak správně nastavit ceny za své služby v roce 2025
                                    </a>
                                </h5>
                                <p class="article-excerpt text-muted mb-3">
                                    Kompletní návod pro stanovení konkurenceschopných cen. 
                                    Kalkulace nákladů, analýza trhu a psychologie cen.
                                </p>
                                <div class="article-footer d-flex align-items-center justify-content-between">
                                    <div class="article-stats">
                                        <i class="bi bi-eye text-muted me-1"></i>
                                        <span class="text-muted small">247 čtení</span>
                                    </div>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Číst více</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    
                    <!-- Článek 2 -->
                    <div class="col-lg-4 col-md-6" data-category="tips">
                        <article class="article-card bg-white rounded-3 shadow-sm h-100">
                            <div class="article-image">
                                <div class="image-placeholder bg-warning bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="bi bi-lightbulb text-warning" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="article-content p-4">
                                <div class="article-meta mb-3">
                                    <span class="badge bg-warning me-2">Tipy</span>
                                    <span class="text-muted small">28. 6. 2025 • 4 min</span>
                                </div>
                                <h5 class="article-title mb-3">
                                    <a href="#" class="text-decoration-none text-dark">
                                        QR platby: Proč je vaši klienti milují
                                    </a>
                                </h5>
                                <p class="article-excerpt text-muted mb-3">
                                    Statistiky a zkušenosti podnikatelů s QR platbami. 
                                    Jak QR kódy zrychlují platby a zlepšují cash flow.
                                </p>
                                <div class="article-footer d-flex align-items-center justify-content-between">
                                    <div class="article-stats">
                                        <i class="bi bi-eye text-muted me-1"></i>
                                        <span class="text-muted small">189 čtení</span>
                                    </div>
                                    <a href="#" class="btn btn-outline-warning btn-sm">Číst více</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    
                    <!-- Článek 3 -->
                    <div class="col-lg-4 col-md-6" data-category="tech">
                        <article class="article-card bg-white rounded-3 shadow-sm h-100">
                            <div class="article-image">
                                <div class="image-placeholder bg-info bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="bi bi-robot text-info" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="article-content p-4">
                                <div class="article-meta mb-3">
                                    <span class="badge bg-info me-2">Technologie</span>
                                    <span class="text-muted small">25. 6. 2025 • 7 min</span>
                                </div>
                                <h5 class="article-title mb-3">
                                    <a href="#" class="text-decoration-none text-dark">
                                        AI v podnikání: Jak automatizovat nudné úkoly
                                    </a>
                                </h5>
                                <p class="article-excerpt text-muted mb-3">
                                    Praktické použití umělé inteligence pro malé podnikatele. 
                                    Nástroje, které už dnes můžete používat.
                                </p>
                                <div class="article-footer d-flex align-items-center justify-content-between">
                                    <div class="article-stats">
                                        <i class="bi bi-eye text-muted me-1"></i>
                                        <span class="text-muted small">156 čtení</span>
                                    </div>
                                    <a href="#" class="btn btn-outline-info btn-sm">Číst více</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    
                    <!-- Článek 4 -->
                    <div class="col-lg-4 col-md-6" data-category="news">
                        <article class="article-card bg-white rounded-3 shadow-sm h-100">
                            <div class="article-image">
                                <div class="image-placeholder bg-primary bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="bi bi-megaphone text-primary" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="article-content p-4">
                                <div class="article-meta mb-3">
                                    <span class="badge bg-primary me-2">Novinky</span>
                                    <span class="text-muted small">20. 6. 2025 • 3 min</span>
                                </div>
                                <h5 class="article-title mb-3">
                                    <a href="#" class="text-decoration-none text-dark">
                                        Nové funkce v QRdokladu - červen 2025
                                    </a>
                                </h5>
                                <p class="article-excerpt text-muted mb-3">
                                    Přehled všech novinek, které jsme přidali v červnu. 
                                    Automatické připomínky, nové šablony a více.
                                </p>
                                <div class="article-footer d-flex align-items-center justify-content-between">
                                    <div class="article-stats">
                                        <i class="bi bi-eye text-muted me-1"></i>
                                        <span class="text-muted small">98 čtení</span>
                                    </div>
                                    <a href="#" class="btn btn-outline-primary btn-sm">Číst více</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    
                    <!-- Článek 5 -->
                    <div class="col-lg-4 col-md-6" data-category="business">
                        <article class="article-card bg-white rounded-3 shadow-sm h-100">
                            <div class="article-image">
                                <div class="image-placeholder bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="bi bi-calculator text-secondary" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="article-content p-4">
                                <div class="article-meta mb-3">
                                    <span class="badge bg-secondary me-2">Podnikání</span>
                                    <span class="text-muted small">18. 6. 2025 • 9 min</span>
                                </div>
                                <h5 class="article-title mb-3">
                                    <a href="#" class="text-decoration-none text-dark">
                                        DPH pro začátečníky: Kompletní průvodce 2025
                                    </a>
                                </h5>
                                <p class="article-excerpt text-muted mb-3">
                                    Vše, co potřebujete vědět o DPH jako začínající podnikatel. 
                                    Registrace, sazby, přiznání a časté chyby.
                                </p>
                                <div class="article-footer d-flex align-items-center justify-content-between">
                                    <div class="article-stats">
                                        <i class="bi bi-eye text-muted me-1"></i>
                                        <span class="text-muted small">312 čtení</span>
                                    </div>
                                    <a href="#" class="btn btn-outline-secondary btn-sm">Číst více</a>
                                </div>
                            </div>
                        </article>
                    </div>
                    
                    <!-- Článek 6 -->
                    <div class="col-lg-4 col-md-6" data-category="tips">
                        <article class="article-card bg-white rounded-3 shadow-sm h-100">
                            <div class="article-image">
                                <div class="image-placeholder bg-success bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="bi bi-clock text-success" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                            <div class="article-content p-4">
                                <div class="article-meta mb-3">
                                    <span class="badge bg-success me-2">Tipy</span>
                                    <span class="text-muted small">15. 6. 2025 • 5 min</span>
                                </div>
                                <h5 class="article-title mb-3">
                                    <a href="#" class="text-decoration-none text-dark">
                                        Time management pro freelancery
                                    </a>
                                </h5>
                                <p class="article-excerpt text-muted mb-3">
                                    Efektivní správa času jako klíč k úspěšnému podnikání. 
                                    Nástroje, techniky a osvědčené postupy.
                                </p>
                                <div class="article-footer d-flex align-items-center justify-content-between">
                                    <div class="article-stats">
                                        <i class="bi bi-eye text-muted me-1"></i>
                                        <span class="text-muted small">201 čtení</span>
                                    </div>
                                    <a href="#" class="btn btn-outline-success btn-sm">Číst více</a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                
                <!-- Load more tlačítko -->
                <div class="text-center mt-5">
                    <button class="btn btn-primary btn-lg" id="loadMoreBtn">
                        <i class="bi bi-arrow-down me-2"></i>
                        Načíst další články
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sidebar s populárními články -->
<section class="blog-sidebar py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <h3 class="mb-4">Trendující témata</h3>
                        <div class="trending-topics">
                            <a href="#" class="topic-tag me-2 mb-2">#QRplatby</a>
                            <a href="#" class="topic-tag me-2 mb-2">#Fakturace</a>
                            <a href="#" class="topic-tag me-2 mb-2">#Podnikání</a>
                            <a href="#" class="topic-tag me-2 mb-2">#DPH</a>
                            <a href="#" class="topic-tag me-2 mb-2">#Automatizace</a>
                            <a href="#" class="topic-tag me-2 mb-2">#AI</a>
                            <a href="#" class="topic-tag me-2 mb-2">#Živnostensky</a>
                            <a href="#" class="topic-tag me-2 mb-2">#Cashflow</a>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="popular-articles bg-white rounded-3 shadow-sm p-4">
                            <h5 class="text-primary mb-4">📈 Nejčtenější články</h5>
                            
                            <div class="popular-article mb-3 pb-3 border-bottom">
                                <h6 class="small mb-1">
                                    <a href="#" class="text-decoration-none text-dark">
                                        Jak zrychlit platby od klientů
                                    </a>
                                </h6>
                                <small class="text-muted">1,247 čtení • Tipy</small>
                            </div>
                            
                            <div class="popular-article mb-3 pb-3 border-bottom">
                                <h6 class="small mb-1">
                                    <a href="#" class="text-decoration-none text-dark">
                                        DPH průvodce pro začátečníky
                                    </a>
                                </h6>
                                <small class="text-muted">892 čtení • Podnikání</small>
                            </div>
                            
                            <div class="popular-article mb-3 pb-3 border-bottom">
                                <h6 class="small mb-1">
                                    <a href="#" class="text-decoration-none text-dark">
                                        AI nástroje pro podnikatele
                                    </a>
                                </h6>
                                <small class="text-muted">567 čtení • Tech</small>
                            </div>
                            
                            <div class="popular-article">
                                <h6 class="small mb-1">
                                    <a href="#" class="text-decoration-none text-dark">
                                        Nastavení cen za služby
                                    </a>
                                </h6>
                                <small class="text-muted">423 čtení • Business</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript pro filtrování a vyhledávání -->
<script>
document.addEventListener(\'DOMContentLoaded\', function() {
    initBlogFiltering();
    initLoadMore();
});

function initBlogFiltering() {
    const filterButtons = document.querySelectorAll(\'input[name="categoryFilter"]\');
    const searchInput = document.getElementById(\'blogSearch\');
    const articles = document.querySelectorAll(\'[data-category]\');
    
    // Filtrování podle kategorie
    filterButtons.forEach(button => {
        button.addEventListener(\'change\', function() {
            const filterCategory = this.id.replace(\'filter\', \'\').toLowerCase();
            
            articles.forEach(article => {
                const articleCategory = article.getAttribute(\'data-category\');
                let shouldShow = false;
                
                if (filterCategory === \'all\') {
                    shouldShow = true;
                } else {
                    shouldShow = articleCategory === filterCategory;
                }
                
                article.style.display = shouldShow ? \'\' : \'none\';
            });
        });
    });
    
    // Vyhledávání v článcích
    if (searchInput) {
        searchInput.addEventListener(\'input\', function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            articles.forEach(article => {
                const text = article.textContent.toLowerCase();
                const shouldShow = !searchTerm || text.includes(searchTerm);
                
                // Pouze pokud není skrytý filtrem
                if (article.style.display !== \'none\' || searchTerm) {
                    article.style.display = shouldShow ? \'\' : \'none\';
                }
            });
        });
    }
}

function initLoadMore() {
    const loadMoreBtn = document.getElementById(\'loadMoreBtn\');
    
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener(\'click\', function() {
            // Simulace načítání dalších článků
            this.innerHTML = \'<i class="bi bi-arrow-repeat me-2"></i>Načítám...\';
            this.disabled = true;
            
            setTimeout(() => {
                this.innerHTML = \'<i class="bi bi-check-circle me-2"></i>Všechny články načteny\';
                this.classList.remove(\'btn-primary\');
                this.classList.add(\'btn-success\');
            }, 1500);
        });
    }
}
</script>

<style>
.article-card {
    transition: all 0.3s ease;
    border: 2px solid transparent;
}

.article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    border-color: var(--primary-color);
}

.featured-card {
    transition: all 0.3s ease;
}

.featured-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
}

.topic-tag {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    background-color: var(--primary-color);
    color: white;
    text-decoration: none;
    border-radius: 1rem;
    font-size: 0.875rem;
    transition: all 0.3s ease;
}

.topic-tag:hover {
    background-color: var(--secondary-color);
    color: white;
    transform: translateY(-1px);
}

.btn-check:checked + .btn-outline-primary {
    background-color: var(--primary-color) !important;
    border-color: var(--primary-color) !important;
    color: white !important;
}

.btn-outline-primary {
    border-color: var(--primary-color) !important;
    color: var(--primary-color) !important;
}

.btn-outline-primary:hover {
    background-color: var(--primary-color) !important;
    border-color: var(--primary-color) !important;
    color: white !important;
}

.author-avatar {
    object-fit: cover;
}

.popular-article a:hover {
    color: var(--primary-color) !important;
}

#blogSearch:focus {
    border-color: var(--primary-color);
    box-shadow: 0 0 0 0.2rem rgba(177, 210, 53, 0.25);
}
</style>

';
	}
}
