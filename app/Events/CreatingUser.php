<?php

namespace App\Events;

use Atrox\Haikunator;

class CreatingUser
{
    public function __construct($user)
    {
        $user->handle = Haikunator::haikunate(["delimiter" => "."]);
    }
}
