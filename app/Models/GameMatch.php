<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GameMatch extends Model
{
   protected $fillable = [
    'team_home_id', 'team_away_id', 
    'sets_home', 'sets_away', 
    'day', 'round', 'played',
    'match_time', 'match_label'
];
    public function teamHome()
    {
        return $this->belongsTo(Team::class, 'team_home_id');
    }

    public function teamAway()
    {
        return $this->belongsTo(Team::class, 'team_away_id');
    }

    public function getPointsHome(): array
    {
        if (!$this->played) return [0, 0];

        if ($this->sets_home == 2 && $this->sets_away == 0) return [3, 0];
        if ($this->sets_home == 2 && $this->sets_away == 1) return [2, 1];
        if ($this->sets_home == 1 && $this->sets_away == 2) return [1, 2];
        if ($this->sets_home == 0 && $this->sets_away == 2) return [0, 3];

        return [0, 0];
    }
}