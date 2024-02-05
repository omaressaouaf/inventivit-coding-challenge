<?php

namespace App\Providers;

use App\Core\Repositories\Contracts\CalculationRepository;
use App\Core\Repositories\DBCalculationRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CalculationRepository::class, DBCalculationRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
