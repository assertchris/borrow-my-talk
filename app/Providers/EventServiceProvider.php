<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'App\Events\ReportTopicEvent' => [
            'App\Listeners\ReportTopicListener',
        ],
        'App\Events\RequestTopicEvent' => [
            'App\Listeners\RequestTopicListener',
        ],
    ];
}
