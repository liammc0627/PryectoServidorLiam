<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = [
        'name',
        'age',
        'position',
        'picture',
        'description',
        'twitter',
        'instagram',
        'twitch',
        'visible',
    ];

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_player');
    }
}
