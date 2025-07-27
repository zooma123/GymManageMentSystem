<?php

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )   ->withSchedule(function (Schedule $schedule) {
    
            $schedule->command('subscriptions:check')->everyMinute();
    })->withMiddleware(function (Middleware $middleware): void {
        
    
            $middleware->alias([
              'RoleMiddleware' => RoleMiddleware::class
            ]);
        

        $middleware->validateCsrfTokens(except: [
            '/auth/register',
            '/auth/login',
            '/user/CreateUser',
            '/user/DeleteUser/*',
            '/CreateSubsCription',
            '/MakeUserSubscription',
              'UserSubscription/*',
              'CheckForEntry/*',
              'barcode/*',
              'deatcivateSubs/*'
        ]);
 




    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
