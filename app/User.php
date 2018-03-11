<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'handle',
        'from_under_represented_group',
        'from_under_represented_group_additional',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function topics()
    {
        return $this->hasMany(Topic::class)->whereNull('hidden_at');
    }
}
