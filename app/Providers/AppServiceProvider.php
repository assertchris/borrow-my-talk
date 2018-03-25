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
            $args = eval("return [{$expression}];");

            if (count($args) < 2) {
                throw new InvalidArgumentException('not enough args for a link');
            }

            [$href, $label] = $args;

            $classes = ['text-brand-light'];

            if (isset($args[2])) {
                $classes = array_merge($classes, $args[2]);
            }

            $class = join(' ', $classes);

            return "<a href='{$href}' class='{$class}'>{$label}</a>";
        });
    }

    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Laravel\Dusk\DuskServiceProvider::class);
        }
    }
}
