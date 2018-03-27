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

                if (isset(\$params[2]) && is_array(\$params[2])) {
                    if (isset(\$params[2][0]) && \$params[2][0] !== false) {
                        \$classes = array_merge(\$params[2], \$classes);
                    } else {
                        \$classes = \$params[2];
                    }
                }

                \$classes = join(' ', \$classes);

                \$attrs = '';

                if (isset(\$params[3])) {
                    \$attrs = \$params[3];
                }

                echo \"<a href='{\$href}' class='{\$classes}' {\$attrs}>{\$label}</a>\";
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
