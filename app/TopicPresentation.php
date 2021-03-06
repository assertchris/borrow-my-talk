<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicPresentation extends Model
{
    protected $fillable = [
        'medium',
        'name',
        'year',
        'month',
        'additional',
        'was_enjoyed',
        'was_first_time_presenting_topic',
        'topic_id',
    ];

    protected $casts = [
        'year' => 'integer',
        'month' => 'integer',
        'was_enjoyed' => 'boolean',
        'was_first_time_presenting_topic' => 'boolean',
        'topic_id' => 'integer',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function links()
    {
        return $this->hasMany(TopicPresentationLink::class);
    }
}
