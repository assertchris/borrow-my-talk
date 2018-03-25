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

        Blade::directive('link', function ($expression) {
            return "<?php
                \$params = [{$expression}];

                if (count(\$params) < 2) {
                    throw new Exception('not enough params for a link');
                }

                [\$href, \$label] = \$params;

                \$classes = ['text-brand-light'];

                if (isset(\$params[2])) {
                    \$classes = array_merge(\$classes, \$params[2]);
                }

                \$classes = join(' ', \$classes);

                echo \"<a href='{\$href}' class='{\$classes}'>{\$label}</a>\";
            ?>";
        });
    }

    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Laravel\Dusk\DuskServiceProvider::class);
        }
    }
}
