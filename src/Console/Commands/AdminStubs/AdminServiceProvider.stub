<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /* Repository Interface Binding */
        $this->repos();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Registering Blade Directives
        Paginator::useBootstrap();
    }

    // Repository Interface Binding
    protected function repos()
    {
        // $this->app->bind(AnnouncementRepositoryInterface::class, AnnouncementRepository::class);
    }
}
