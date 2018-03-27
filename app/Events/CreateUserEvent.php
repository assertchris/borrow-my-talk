<?php

namespace App\Events;

use Atrox\Haikunator;

class CreateUserEvent
{
    public function __construct($user)
    {
        if (!$user->handle) {
            $user->handle = Haikunator::haikunate(["delimiter" => "."]);
        }
    }
}
