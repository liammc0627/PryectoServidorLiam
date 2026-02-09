<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name',
        'date',
        'description',
        'location',
        'map',
        'hour',
        'type',
        'tags',
        'visible',
        'picture',
    ];

    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }

    public function players()
    {
        return $this->belongsToMany(Player::class, 'event_player');
    }
}
