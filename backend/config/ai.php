<?php

return [
    'provider' => env('AI_PROVIDER', 'openai'),
    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
        'model' => env('OPENAI_MODEL', 'gpt-4'),
    ],
    'structured_storage_path' => storage_path('ai_structured'),
];
