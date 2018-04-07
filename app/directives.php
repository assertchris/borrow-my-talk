<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

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

        \$classes = ['text-brand-light no-underline'];

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

Blade::directive('svg', function ($expression) {

    // strip single quotes
    if (Str::startsWith($expression, "'")) {
        $expression = substr($expression, 1, -1);
    }

    // strip double quotes
    if (Str::startsWith($expression, '"')) {
        $expression = substr($expression, 1, -1);
    }

    // this is copied from Illuminate\View\Compilers\Concerns\CompilesIncludes
    return "<?php echo trim(\$__env->make('includes.icons.{$expression}', array_except(get_defined_vars(), array('__data', '__path')))->render()); ?>";

});
