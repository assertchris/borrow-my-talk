<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicPresentationLink extends Model
{
    protected $fillable = [
        'type',
        'link',
        'topic_presentation_id',
    ];

    public function presentations()
    {
        return $this->belongsTo(TopicPresentation::class);
    }
}
