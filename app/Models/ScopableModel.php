<?php

namespace App\Models;

use App\Helpers\SeasonHelper;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ScopableModel extends Model
{
    protected static function booted()
    {
        // gets and checks the season id either from request or latest season
        $season_id = SeasonHelper::getSeasonId();

        static::addGlobalScope('season_id', function (Builder $builder) use ($season_id) {
            $builder->where('season_id', $season_id);
        });
    }
}
