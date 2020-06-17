<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $fillable = ['name'];

    public function teams()
    {
        return $this->belongsToMany(Team::class, 'season_teams', 'season_id', 'team_id', 'id');
    }

    public function matches()
    {
        return $this->hasMany(Match::class, 'season_id', 'id');
    }
}
