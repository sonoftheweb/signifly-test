<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Traits\ApiRequestModelRelBinding;
use App\Http\Controllers\Traits\ApiResponse;
use App\Http\UseCase\ScoreObj;
use App\Models\Score;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ScoreController extends Controller
{
    use ApiResponse, ApiRequestModelRelBinding;

    protected $available_relationships = [
        'match'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
     * @param Score $gameScore
     * @return Response
     */
    public function show(Score $gameScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Score $gameScore
     * @return Response
     */
    public function update(Request $request, Score $score, ScoreObj $scoreObj)
    {
        $scoreObj->updateScore($score);

        return $this->respondWithSuccess();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Score $gameScore
     * @return Response
     */
    public function destroy(Score $gameScore)
    {
        //
    }
}
