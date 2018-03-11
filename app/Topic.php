<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name',
        'abstract',
        'additional',
        'slides',
        'video',
        'includes_mentoring',
        'willing_to_present',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function presentations()
    {
        return $this->hasMany(TopicPresentation::class);
    }
}
