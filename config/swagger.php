<?php

return [
    'prefix' => 'swagger',
    'view' => 'swagger',
    // Save path. Public.
    'save_path' => 'swagger-ui',
    'file_name' => 'swagger',
    'file_extension' => 'yaml',
    // Path to scan annotations
    'scan_path' => 'app',
    'auth' => [
        'enable' => env('SWAGGER_AUTH_ENABLE', true),
        'username' => env('SWAGGER_AUTH_USERNAME', 'admin'),
        'password' => env('SWAGGER_AUTH_PASSWORD', 'admin'),
    ]
];
