<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => \App\Http\Middleware\Admin::class,
            'agent' => \App\Http\Middleware\Agent::class,
            'serveur' => \App\Http\Middleware\Serveur::class,
            'cuisinier' => \App\Http\Middleware\Cuisinier::class,
            'multiLogin' => \App\Http\Middleware\MultiLogin::class,
        ]);
    })->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
