<?php

namespace App\Models;

class Match extends ScopableModel
{
    protected $table = 'matches';

    protected $fillable = [
        'season_id',
        'home_team_id',
        'away_team_id',
        'date',
        'total_points'
    ];

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id', 'id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id', 'id');
    }

    public function season()
    {
        return $this->belongsTo(Season::class, 'season_id', 'id');
    }

    public function score()
    {
        return $this->hasOne(Score::class, 'match_id', 'id');
    }
}
