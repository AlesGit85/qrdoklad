<?php

declare(strict_types=1);

use Latte\Runtime as LR;

/** source: D:\_coding\nette\qrdoklad\app\Presentation\Landing/changelog.latte */
final class Template_b6d1e57656 extends Latte\Runtime\Template
{
	public const Source = 'D:\\_coding\\nette\\qrdoklad\\app\\Presentation\\Landing/changelog.latte';

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


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['year' => '38', 'versions' => '38', 'version' => '48', 'release' => '48', 'change' => '88, 102, 116, 130'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '
<!-- Hero sekce pro changelog -->
<section class="hero-section py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50 py-5">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="hero-title">
                    <span class="text-primary">Changelog</span> - Historie změn
                </h1>
                <p class="hero-subtitle">
                    Sledujte vývoj QRdokladu. Zde najdete kompletní historii všech 
                    aktualizací, nových funkcí a vylepšení našeho fakturačního systému.
                </p>
                <div class="d-flex justify-content-center align-items-center gap-4 mt-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-rocket-fill text-primary me-2"></i>
                        <span class="text-muted">Průběžné aktualizace</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-shield-check-fill text-success me-2"></i>
                        <span class="text-muted">Bezpečnost na prvním místě</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Obsah changelog -->
<section class="content-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                
                <!-- Timeline changelog -->
                <div class="changelog-timeline">
';
		foreach ($changelogData as $year => $versions) /* line 38 */ {
			echo '                        
                        <!-- Rok -->
                        <div class="year-divider mb-5">
                            <h2 class="text-center text-primary mb-5">
                                <i class="bi bi-calendar-event me-2"></i>
                                ';
			echo LR\Filters::escapeHtmlText($year) /* line 44 */;
			echo '
                            </h2>
                        </div>
                        
';
			foreach ($versions as $version => $release) /* line 48 */ {
				echo '                            <!-- Verze -->
                            <div class="changelog-item mb-5" data-version="';
				echo LR\Filters::escapeHtmlAttr($version) /* line 50 */;
				echo '">
                                <div class="row">
                                    <div class="col-md-3">
                                        <!-- Datum a verze -->
                                        <div class="version-info sticky-top">
                                            <div class="version-badge version-';
				echo LR\Filters::escapeHtmlAttr($release['type']) /* line 55 */;
				echo '" title="';
				echo LR\Filters::escapeHtmlAttr($release['type']) /* line 55 */;
				echo '">
                                                <h4 class="version-number mb-1">v';
				echo LR\Filters::escapeHtmlText($version) /* line 56 */;
				echo '</h4>
                                                <p class="version-date mb-0">
                                                    <i class="bi bi-calendar3 me-1"></i>
                                                    ';
				echo LR\Filters::escapeHtmlText($release['date']) /* line 59 */;
				echo '
                                                </p>
                                                <span class="version-type-badge">
';
				if ($release['type'] === 'major') /* line 62 */ {
					echo '                                                        <i class="bi bi-star-fill"></i> Hlavní verze
';
				} elseif ($release['type'] === 'feature') /* line 64 */ {
					echo '                                                        <i class="bi bi-plus-circle-fill"></i> Nové funkce
';
				} elseif ($release['type'] === 'bugfix') /* line 66 */ {
					echo '                                                        <i class="bi bi-bug-fill"></i> Opravy chyb
';
				} else /* line 68 */ {
					echo '                                                        <i class="bi bi-gear-fill"></i> Aktualizace
';
				}


				echo '                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-9">
                                        <!-- Obsah změn -->
                                        <div class="changelog-content">
                                            <h3 class="changelog-title">';
				echo LR\Filters::escapeHtmlText($release['title']) /* line 79 */;
				echo '</h3>
                                            
';
				if (isset($release['changes']['added']) && !empty($release['changes']['added'])) /* line 81 */ {
					echo '                                                <div class="change-group added mb-4">
                                                    <h5 class="change-type">
                                                        <i class="bi bi-plus-circle-fill text-success me-2"></i>
                                                        Nové funkce
                                                    </h5>
                                                    <ul class="change-list">
';
					foreach ($release['changes']['added'] as $change) /* line 88 */ {
						echo '                                                            <li>';
						echo LR\Filters::escapeHtmlText($change) /* line 89 */;
						echo '</li>
';

					}

					echo '                                                    </ul>
                                                </div>
';
				}
				echo '                                            
';
				if (isset($release['changes']['improved']) && !empty($release['changes']['improved'])) /* line 95 */ {
					echo '                                                <div class="change-group improved mb-4">
                                                    <h5 class="change-type">
                                                        <i class="bi bi-arrow-up-circle-fill text-primary me-2"></i>
                                                        Vylepšení
                                                    </h5>
                                                    <ul class="change-list">
';
					foreach ($release['changes']['improved'] as $change) /* line 102 */ {
						echo '                                                            <li>';
						echo LR\Filters::escapeHtmlText($change) /* line 103 */;
						echo '</li>
';

					}

					echo '                                                    </ul>
                                                </div>
';
				}
				echo '                                            
';
				if (isset($release['changes']['fixed']) && !empty($release['changes']['fixed'])) /* line 109 */ {
					echo '                                                <div class="change-group fixed mb-4">
                                                    <h5 class="change-type">
                                                        <i class="bi bi-bug-fill text-warning me-2"></i>
                                                        Opravené chyby
                                                    </h5>
                                                    <ul class="change-list">
';
					foreach ($release['changes']['fixed'] as $change) /* line 116 */ {
						echo '                                                            <li>';
						echo LR\Filters::escapeHtmlText($change) /* line 117 */;
						echo '</li>
';

					}

					echo '                                                    </ul>
                                                </div>
';
				}
				echo '                                            
';
				if (isset($release['changes']['removed']) && !empty($release['changes']['removed'])) /* line 123 */ {
					echo '                                                <div class="change-group removed mb-4">
                                                    <h5 class="change-type">
                                                        <i class="bi bi-dash-circle-fill text-danger me-2"></i>
                                                        Odstraněno
                                                    </h5>
                                                    <ul class="change-list">
';
					foreach ($release['changes']['removed'] as $change) /* line 130 */ {
						echo '                                                            <li>';
						echo LR\Filters::escapeHtmlText($change) /* line 131 */;
						echo '</li>
';

					}

					echo '                                                    </ul>
                                                </div>
';
				}
				echo '                                        </div>
                                    </div>
                                </div>
                            </div>
';

			}


		}

		echo '                </div>
                
                <!-- Info box na konci -->
                <div class="alert alert-info mt-5" role="alert">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="bi bi-info-circle-fill" style="font-size: 1.5rem;"></i>
                        </div>
                        <div>
                            <h5 class="alert-heading">Sledujte vývoj QRdokladu!</h5>
                            <p class="mb-2">
                                Chcete být informováni o nových funkcích a aktualizacích? 
                                <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:blog')) /* line 154 */;
		echo '" class="alert-link">Sledujte náš blog</a> nebo 
                                <a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link('Landing:kontakt')) /* line 155 */;
		echo '" class="alert-link">kontaktujte nás přímo</a>.
                            </p>
                            <p class="mb-0 small text-muted">
                                <i class="bi bi-shield-check me-1"></i>
                                Všechny aktualizace jsou automatické a bezplatné pro všechny uživatele.
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>';
	}
}
