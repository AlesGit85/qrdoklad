<?php

declare(strict_types=1);

// Prevent any output before headers
if (ob_get_level()) {
    ob_end_clean();
}

// Autodetect root directory (works for both www and web folders)
$rootDir = dirname(__DIR__);

require $rootDir . '/vendor/autoload.php';

try {
    $bootstrap = new App\Bootstrap($rootDir);
    $container = $bootstrap->bootWebApplication();
    $application = $container->getByType(Nette\Application\Application::class);
    $application->run();
} catch (Throwable $e) {
    // Ensure we handle any errors gracefully
    if (!headers_sent()) {
        http_response_code(500);
        header('Content-Type: text/html; charset=UTF-8');
    }
    
    if (class_exists('Tracy\Debugger')) {
        Tracy\Debugger::exceptionHandler($e);
    } else {
        echo '<h1>Application Error</h1>';
        echo '<p>An error occurred while processing your request.</p>';
        if (error_reporting() & E_ERROR) {
            echo '<pre>' . htmlspecialchars((string) $e) . '</pre>';
        }
    }
}