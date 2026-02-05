<?php

return [
    'rate_limit' => [
        'api' => env('API_RATE_LIMIT', 60),
        'upload' => env('UPLOAD_RATE_LIMIT', 10),
    ],
    'allowed_mime_types' => ['image/jpeg', 'image/png', 'image/webp', 'application/pdf'],
    'max_file_size_mb' => env('MAX_INVOICE_FILE_SIZE_MB', 10),
];
