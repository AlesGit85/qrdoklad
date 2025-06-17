<?php

declare(strict_types=1);

namespace App;

use Nette;
use Nette\Bootstrap\Configurator;


class Bootstrap
{
	private Configurator $configurator;
	private string $rootDir;


	public function __construct(?string $rootDir = null)
	{
		$this->rootDir = $rootDir ?? dirname(__DIR__);
		$this->configurator = new Configurator;
		$this->configurator->setTempDirectory($this->rootDir . '/temp');
	}


	public function bootWebApplication(): Nette\DI\Container
	{
		// Start output buffering to prevent premature header sending
		if (!ob_get_level()) {
			ob_start();
		}
		
		$this->initializeEnvironment();
		$this->setupContainer();
		return $this->configurator->createContainer();
	}


	public function initializeEnvironment(): void
	{
		// Detect environment
		$isProduction = $this->isProductionEnvironment();
		
		// Debug mode setup - automaticky vypne na produkci
		if (!$isProduction) {
			$this->configurator->setDebugMode(true);
		}
		
		$this->configurator->enableTracy($this->rootDir . '/log');

		// Setup robot loader
		$this->configurator->createRobotLoader()
			->addDirectory($this->rootDir . '/app')
			->register();
	}


	private function setupContainer(): void
	{
		$configDir = $this->rootDir . '/config';
		$this->configurator->addConfig($configDir . '/common.neon');
		$this->configurator->addConfig($configDir . '/services.neon');
		
		// Load environment specific config if exists
		$envConfig = $this->getEnvironmentConfigFile();
		if ($envConfig && file_exists($envConfig)) {
			$this->configurator->addConfig($envConfig);
		}
	}
	
	
	private function isProductionEnvironment(): bool
	{
		// Detekuje produkční prostředí podle různých indikátorů
		return !empty($_SERVER['HTTP_HOST']) && 
			   !in_array($_SERVER['HTTP_HOST'], ['localhost', '127.0.0.1', 'qrdoklad.test']) &&
			   !isset($_SERVER['COMPUTERNAME']); // Windows development indicator
	}
	
	
	private function getEnvironmentConfigFile(): ?string
	{
		$configDir = $this->rootDir . '/config';
		
		if ($this->isProductionEnvironment()) {
			return $configDir . '/production.neon';
		} else {
			return $configDir . '/local.neon';
		}
	}
}