<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicPageView extends Model
{
    protected $fillable = [
        'country',
        'browser',
        'topic_id',
    ];

    protected $casts = [
        'topic_id' => 'integer',
    ];
}
