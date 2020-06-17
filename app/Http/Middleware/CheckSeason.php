<?php

namespace App\Http\Middleware;

use App\Helpers\SeasonHelper;
use App\Models\Season;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckSeason
{
    /**
     * Check the request for "season_id" sets a season based on the request params
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        SeasonHelper::getSeasonId();

        return $next($request);
    }
}
