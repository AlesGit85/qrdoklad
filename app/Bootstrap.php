<?php

declare(strict_types=1);

namespace App;

use Nette;
use Nette\Bootstrap\Configurator;


class Bootstrap
{
	private Configurator $configurator;
	private string $rootDir;


	public function __construct()
	{
		$this->rootDir = dirname(__DIR__);
		$this->configurator = new Configurator;
		$this->configurator->setTempDirectory($this->rootDir . '/temp');
	}


	public function bootWebApplication(): Nette\DI\Container
	{
		$this->initializeEnvironment();
		$this->setupContainer();
		$this->setSecurityHeaders();
		return $this->configurator->createContainer();
	}


	public function initializeEnvironment(): void
	{
		//$this->configurator->setDebugMode('secret@23.75.345.200'); // enable for your remote IP
		$this->configurator->enableTracy($this->rootDir . '/log');

		$this->configurator->createRobotLoader()
			->addDirectory(__DIR__)
			->register();
	}


	private function setupContainer(): void
	{
		$configDir = $this->rootDir . '/config';
		$this->configurator->addConfig($configDir . '/common.neon');
		$this->configurator->addConfig($configDir . '/services.neon');
	}

	/**
	 * Nastavuje bezpečnostní hlavičky
	 */
	private function setSecurityHeaders(): void
	{
		// Pouze pokud headers ještě nebyly odeslány
		if (!headers_sent()) {
			// Zabránění MIME type sniffingu
			header('X-Content-Type-Options: nosniff');
			
			// Ochrana proti clickjackingu
			header('X-Frame-Options: DENY');
			
			// XSS ochrana pro starší prohlížeče
			header('X-XSS-Protection: 1; mode=block');
			
			// Referrer policy - omezení předávání referrer informací
			header('Referrer-Policy: strict-origin-when-cross-origin');
			
			// Zabránění zobrazování stránky v iframe (dodatečná ochrana)
			header('Content-Security-Policy: frame-ancestors \'none\';');
			
			// Zabránění cacheování citlivých stránek
			if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
				// HSTS pouze pro HTTPS
				header('Strict-Transport-Security: max-age=31536000; includeSubDomains; preload');
			}
			
			// Powered by header removal (bezpečnost through obscurity)
			header_remove('X-Powered-By');
			
			// Server header removal (pokud je to možné)
			if (function_exists('header_remove')) {
				header_remove('Server');
			}
		}
	}
}