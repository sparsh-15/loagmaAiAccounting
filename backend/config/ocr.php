<?php

return [
    'driver' => env('OCR_DRIVER', 'tesseract'),
    'tesseract' => [
        'path' => env('TESSERACT_PATH', '/usr/bin/tesseract'),
        'lang' => env('TESSERACT_LANG', 'eng'),
    ],
    'cloud' => [
        'provider' => env('OCR_CLOUD_PROVIDER', 'google'),
        'api_key' => env('OCR_CLOUD_API_KEY'),
    ],
    'raw_storage_path' => storage_path('ocr_raw'),
];
