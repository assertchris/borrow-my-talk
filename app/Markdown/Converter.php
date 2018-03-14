<?php

namespace App\Markdown;

use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Environment;

class Converter
{
    public function render(string $markdown = null) : string
    {
        if ($markdown === null) {
            return "";
        }

        $converter = new CommonMarkConverter([
            'html_input' => Environment::HTML_INPUT_ESCAPE,
        ]);
        
        return $converter->convertToHtml($markdown);
    }
}
