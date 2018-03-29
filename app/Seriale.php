<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Seriale extends Model
{
    use Sluggable;

    protected $fillable = [
        'title',
        'running_time',
        'release_date',
        'sezoni',
        'serial_description'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function embeds()
    {
        return $this->morphMany(Embed::class, 'embedable');
    }
    public function shikolinks()
    {
        return $this->morphMany(ShikoLink::class, 'shikolinkable');
    }
    public function shkarkolinks()
    {
        return $this->morphMany(ShkarkoLink::class, 'shkarkolinkable');
    }
    public function trailerlinks()
    {
        return $this->morphMany(Trailerlink::class, 'trailerlinkable');
    }

    public function delete()
    {
        // delete all related photos
        $this->photos()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()
        // delete the user
        return parent::delete();
    }


    public function genres()
    {
        return $this->belongsToMany(Genre::class)
            ->withTimestamps();
    }
}
