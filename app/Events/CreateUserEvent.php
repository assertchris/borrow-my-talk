<?php

namespace App\Events;

use Atrox\Haikunator;

class CreateUserEvent
{
    public function __construct($user)
    {
        $user->handle = Haikunator::haikunate(["delimiter" => "."]);
    }
}
