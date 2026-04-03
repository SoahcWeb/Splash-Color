<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Middleware de route minimal
    protected $middlewareGroups = [
        'web' => [
            // session et CSRF sont utiles pour login
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // CSRF peut être ignoré si tu veux juste tester
            // \App\Http\Middleware\VerifyCsrfToken::class,
        ],
    ];

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class, // Breeze fournit ça
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];
}
