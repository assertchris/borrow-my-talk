<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Topic;
use TopicPresentationFeedback;

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

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function feedback()
    {
        return $this->hasMany(TopicPresentationFeedback::class);
    }
}
