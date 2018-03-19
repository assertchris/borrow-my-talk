<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicReport extends Model
{
    protected $fillable = [
        'reasons',
        'links',
        'topic_id',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
