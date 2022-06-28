<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function homeTeam()
    {
        return $this->belongsTo(Team::class,'home_team_id')->withDefault();
    }


    public function awayTeam()
    {
        return $this->belongsTo(Team::class,'away_team_id')->withDefault();
    }


    public function player()
    {
        return $this->belongsTo(Player::class)->withDefault();
    }

    public function author()
    {
        return $this->belongsTo(Player::class, 'author')->withDefault();
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}

