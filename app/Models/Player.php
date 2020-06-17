<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['name'];

    public function team()
    {
        return $this->belongsTo(Team::class, 'player_id', 'id');
    }
}
