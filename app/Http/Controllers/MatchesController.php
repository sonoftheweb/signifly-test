<?php

namespace App\Http\Controllers;

use App\Helpers\SearchSortPaginate;
use App\Http\Controllers\Traits\ApiRequestModelRelBinding;
use App\Http\Controllers\Traits\ApiResponse;
use App\Http\Resources\Match as MatchResource;
use App\Models\Match;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class MatchesController extends Controller
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
        $query = $this->buildRelationshipsToLoad(request(), Match::query());

        $searchSortPaginate = new SearchSortPaginate($query, request());

        return MatchResource::collection($searchSortPaginate->searchSortPaginateData());
    }
}
