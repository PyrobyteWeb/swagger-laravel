<?php

namespace PyrobyteWeb\Swagger;

use Illuminate\Support\ServiceProvider;
use PyrobyteWeb\Swagger\Commands\SwaggerGenerateCommand;
use PyrobyteWeb\Swagger\Http\Middleware\SwaggerBasicAuthMiddleware;
use Illuminate\Routing\Router;

class SwaggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'swagger');
        $this->commands(SwaggerGenerateCommand::class);

        $this->configureMiddleware($router);

       $this->publishFiles();
    }

    /**
     * Config Middlewares
     *
     * @param Router $router
     */
    protected function configureMiddleware(Router $router)
    {
        $router->aliasMiddleware('swagger-auth-basic', SwaggerBasicAuthMiddleware::class);
    }

    /**
     * Publish files
     */
    protected function publishFiles()
    {
        $this->publishes([
            __DIR__ . '/../config/swagger.php' => $this->app->configPath() . '/swagger.php',
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/views' => base_path('resources/views'),
        ]);
    }
}
