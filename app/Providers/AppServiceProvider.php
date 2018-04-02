<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Paginator::defaultView('pagination::default');

        require(__DIR__ . '/../directives.php');
        require(__DIR__ . '/../helpers.php');
    }

    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
