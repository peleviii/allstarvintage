<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'group', 'logo', 'photo'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function homeMatches()
    {
        return $this->hasMany(GameMatch::class, 'team_home_id');
    }

    public function awayMatches()
    {
        return $this->hasMany(GameMatch::class, 'team_away_id');
    }
}