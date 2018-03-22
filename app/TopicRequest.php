<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'type',
        'when',
        'additional',
        'wants_mentoring',
        'topic_id',
    ];

    protected $casts = [
        'wants_mentoring' => 'boolean',
        'topic_id' => 'integer',
    ];

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }
}
