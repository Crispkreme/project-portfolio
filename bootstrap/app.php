<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        // web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        using: function () { 
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web','auth'])
                ->prefix('user')
                ->as('user.')
                ->group(base_path('routes/frontend.php'));

            Route::middleware(['web','auth'])
                ->prefix('admin')
                ->as('admin.')
                ->group(base_path('routes/backend.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
