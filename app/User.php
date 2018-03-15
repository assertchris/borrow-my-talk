<?php

namespace App;

use App\Events\CreatingUser;
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
        'twitter_id',
        'twitter_token',
        'twitter_token_secret',
        'twitter_auth_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'twitter_id',
    ];

    protected $dispatchesEvents = [
        'creating' => CreatingUser::class,
    ];

    public function topics()
    {
        return $this->hasMany(Topic::class)->whereNull('hidden_at');
    }

    public function everyTopic($limit = null)
    {
        $query = Topic::where('user_id', $this->id)->orderBy('name', 'asc')->withoutGlobalScope('filtered');

        if ($limit) {
            return $query->paginate($limit);
        }

        return $query->get();
    }

    public function getRouteKeyName()
    {
        return 'handle';
    }
}
