<?php

namespace App\Http\Controllers;

use App\Helpers\SearchSortPaginate;
use App\Helpers\SeasonHelper;
use App\Http\Controllers\Traits\ApiRequestModelRelBinding;
use App\Http\Controllers\Traits\ApiResponse;
use App\Http\UseCase\SeasonObj;
use App\Models\Season;
use App\Http\Resources\Season as SeasonResource;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class SeasonController extends Controller
{
    use ApiResponse, ApiRequestModelRelBinding;

    protected $available_relationships = [
        'teams',
        'matches'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection|SeasonResource
     */
    public function index()
    {
        if (request()->has('getSeasonData')) {
            return $this->getCurrentSeasonData();
        }

        $query = $this->buildRelationshipsToLoad(request(), Season::query());

        $searchSortPaginate = new SearchSortPaginate($query, request());

        return SeasonResource::collection($searchSortPaginate->searchSortPaginateData());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param SeasonObj $addSeason
     * @return Application|ResponseFactory|Response
     * @throws ValidationException
     */
    public function store(SeasonObj $addSeason)
    {
        $addSeason->addSeason();

        return $this->respondWithSuccess();
    }

    /**
     * Display the specified resource.
     *
     * @param Season $season
     * @return Response
     */
    public function show(Season $season)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Season $season
     * @return Response
     */
    public function update(Request $request, Season $season)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Season $season
     * @return Response
     */
    public function destroy(Season $season)
    {
        //
    }

    private function getCurrentSeasonData()
    {
        $season = SeasonHelper::getSeason();

        $season->load('teams');

        return new SeasonResource($season);
    }
}
