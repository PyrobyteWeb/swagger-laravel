# Swagger UI Laravel
### Dependencies
Laravel 8+  
PHP 7.4+

1. app.php in section packages add:  
``\PyrobyteWeb\Swagger\SwaggerServiceProvider::class``  
2. Then publish package files ``php artisan vendor:publish --provider="PyrobyteWeb\Swagger\SwaggerServiceProvider"``
3. Run ``php artisan swagger:generate`` for scan annotation 
Config  
````
    'prefix' => 'swagger', // address to available ui
    'view' => 'swagger', // view alias
    'save_path' => 'swagger-ui', // Save path. Public.
    'file_name' => 'swagger',
    'file_extension' => 'yaml',
    'scan_path' => 'app', // Path to scan annotations. Basic path
    'auth' => [
        'enable' => env('SWAGGER_AUTH_ENABLE', true),
        'username' => env('SWAGGER_AUTH_USERNAME', 'admin'),
        'password' => env('SWAGGER_AUTH_PASSWORD', 'admin'),
    ]
````