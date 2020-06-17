<?php


namespace App\Helpers;


use App\Models\Season;

class SeasonHelper
{
    static $season = null;

    public static function getSeasonId()
    {
        $season = self::getSeason();

        if (!$season) {
            abort(404);
        }

        return $season->id;
    }

    public static function getSeason()
    {
        if (request()->has('season_id')) {
            $season = Season::findOrFail(request()->season_id);
        } else {
            $season = Season::latest()->first();
        }

        return static::$season = $season;
    }
}
