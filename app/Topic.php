<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Topic extends Model
{
    use Searchable;

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

    protected $casts = [
        'user_id' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('filtered', function (Builder $builder) {
            $builder->whereNull('hidden_at');
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function presentations()
    {
        return $this->hasMany(TopicPresentation::class);
    }

    public function shouldBeSearchable()
    {
        return empty($this->hidden_at);
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();

        unset($array['id']);
        unset($array['includes_mentoring']);
        unset($array['willing_to_present']);
        unset($array['user_id']);

        return $array;
    }
}
