<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name'];

    public function seasons()
    {
        return $this->belongsToMany(Season::class, 'season_teams', 'team_id', 'season_id');
    }

    public function players()
    {
        return $this->hasMany(Player::class, 'team_id', 'id');
    }

    public function matchesAsHome()
    {
        return $this->hasMany(Match::class, 'home_team_id', 'id');
    }

    public function matchesAsAway()
    {
        return $this->hasMany(Match::class, 'away_team_id', 'id');
    }
}
