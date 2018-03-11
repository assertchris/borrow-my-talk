<?php

namespace App\Markdown;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;

class Converter
{
    public function render(string $markdown) : string
    {
        $converter = new CommonMarkConverter([
            'html_input' => Environment::HTML_INPUT_ESCAPE,
        ]);
        
        return $converter->convertToHtml($markdown);
    }
}
