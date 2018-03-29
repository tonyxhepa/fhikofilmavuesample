<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use Sluggable;

    protected $fillable = [
        'genre_type',
        'genre_description',
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'genre_type'
            ]
        ];
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class)
            ->withTimestamps();
    }

    public function setGenreTypeAttribute($value)
    {
        $this->attributes['genre_type'] = ucfirst($value);
    }
}
