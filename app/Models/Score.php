<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $table = 'match_scores';

    protected $fillable = ['id', 'match_id', 'home_team_score', 'away_team_score'];

    public function match()
    {
        return $this->belongsTo(Match::class, 'match_id', 'id');
    }
}
