<?php

// Simple deployment script
// Usage: php deploy.php

echo "🚀 QRdoklad Deployment Script\n";
echo "============================\n\n";

// Check if we're in the right directory
if (!file_exists('composer.json')) {
    echo "❌ Error: composer.json not found. Run this script from project root.\n";
    exit(1);
}

echo "📦 Installing/updating dependencies...\n";
exec('composer install --no-dev --optimize-autoloader', $output, $return);
if ($return !== 0) {
    echo "❌ Composer install failed\n";
    exit(1);
}

echo "🧹 Clearing cache...\n";
$tempDir = __DIR__ . '/temp';
if (is_dir($tempDir)) {
    exec("rm -rf {$tempDir}/*");
}

echo "🔧 Setting permissions...\n";
if (is_dir('log')) chmod('log', 0777);
if (is_dir('temp')) chmod('temp', 0777);

echo "✅ Deployment completed successfully!\n\n";
echo "📋 Next steps for hosting:\n";
echo "1. Upload all files to your hosting\n";
echo "2. Point domain to the 'web' folder\n";
echo "3. Make sure 'temp' and 'log' folders are writable\n";
echo "4. Check if mod_rewrite is enabled\n\n";