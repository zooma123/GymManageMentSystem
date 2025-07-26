<?php

namespace App\Providers;

use App\Services\SubscriptionService;
use Illuminate\Support\ServiceProvider;

class SubscriptionProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SubscriptionService::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
