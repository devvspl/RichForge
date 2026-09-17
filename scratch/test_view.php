<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$post = App\Models\BlogPost::first();
if (!$post) {
    echo "NO POST FOUND\n";
    exit;
}

try {
    echo "RENDERING VIEW...\n";
    $html = view('blog.show', ['post' => $post, 'recentPosts' => collect()])->render();
    echo "SUCCESS - Rendered " . strlen($html) . " bytes\n";
} catch (\Throwable $e) {
    echo "ERROR CLASS: " . get_class($e) . "\n";
    echo "ERROR MESSAGE: " . $e->getMessage() . "\n";
    echo "FILE: " . $e->getFile() . " LINE: " . $e->getLine() . "\n";
    echo "TRACE:\n" . $e->getTraceAsString() . "\n";
}
