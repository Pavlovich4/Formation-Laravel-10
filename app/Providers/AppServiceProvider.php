<?php

namespace App\Providers;

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

        /*$this->app->singleton(Stripe::class, function ($app) {
            return new Stripe(config('stripe.api'));
        });

        $this->app->when(PostController::class)
            ->needs('$currentDate')
            ->giveConfig('stripe.api');*/
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
