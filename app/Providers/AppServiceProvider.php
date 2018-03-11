<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Blade::directive('markdown', function ($expression) {
            return "<?php print Facades\App\Markdown\Converter::render($expression); ?>";
        });
    }
}
