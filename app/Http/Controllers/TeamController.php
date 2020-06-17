<?php

namespace App\Http\Controllers;

use App\Helpers\SearchSortPaginate;
use App\Helpers\SeasonHelper;
use App\Http\Controllers\Traits\ApiRequestModelRelBinding;
use App\Http\Controllers\Traits\ApiResponse;
use App\Http\Resources\Team as TeamResource;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TeamController extends Controller
{
    use ApiResponse, ApiRequestModelRelBinding;

    protected $available_relationships = [
        'homeTeam.players',
        'awayTeam.players',
        'score',
        'season'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        // get only the teams with home matches first
        $query = Team::whereHas('matchesAsHome', function (Builder $q) {
            $q->where('season_id', SeasonHelper::getSeasonId());
        });

        $query = $this->buildRelationshipsToLoad(request(), $query);

        $searchSortPaginate = new SearchSortPaginate($query, request());

        return TeamResource::collection($searchSortPaginate->searchSortPaginateData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  \App\Models\Team  $team
     * @return Response
     */
    public function update(Request $request, Team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
