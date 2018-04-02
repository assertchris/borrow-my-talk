<?php

function svg($name, $data = []) {
    return trim(app('view')->make("includes.icons.{$name}", $data)->render());
}
