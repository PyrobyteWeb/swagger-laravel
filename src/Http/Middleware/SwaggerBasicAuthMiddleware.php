<?php

namespace PyrobyteWeb\Swagger\Http\Middleware;

use Closure;

class SwaggerBasicAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!config('swagger.auth.enable')) {
            return $next($request);
        }

        header('Cache-Control: no-cache, must-revalidate, max-age=0');

        $hasSuppliedCredentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));

        if (
            !$hasSuppliedCredentials ||
            $_SERVER['PHP_AUTH_USER'] != config('swagger.auth.username') ||
            $_SERVER['PHP_AUTH_PW']   != config('swagger.auth.password')
        ) {
            header('HTTP/1.1 401 Authorization Required');
            header('WWW-Authenticate: Basic realm="Access denied"');
            exit;
        }

        return $next($request);
    }
}
