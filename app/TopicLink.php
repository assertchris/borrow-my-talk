<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicLink extends Model
{
    protected $fillable = [
        'type',
        'link',
        'topic_id',
    ];

    protected $casts = [
        'topic_id' => 'integer',
    ];

    public function topics()
    {
        return $this->belongsTo(Topic::class);
    }
}
