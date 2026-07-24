<?php
// Vercel requires the entry point to live in /api.

// /tmp starts empty on every cold start, so recreate the storage
// subdirectories Laravel expects to write to before it boots.
if (getenv('VERCEL')) {
    foreach ([
        '/tmp/storage/framework/views',
        '/tmp/storage/framework/cache/data',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/framework/testing',
        '/tmp/storage/logs',
        '/tmp/storage/app/public',
    ] as $dir) {
        if (!is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
    }
}

// Forward every request to Laravel's normal front controller.
require __DIR__ . '/../public/index.php';
