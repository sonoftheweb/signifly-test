<?php

namespace App\Http\UseCase;

use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Validation\ValidatesRequests;

class SeasonObj
{
    use ValidatesRequests;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    # region Handlers

    /**
     * Handles the whole process of adding seasons "fluently"
     *
     * @return mixed
     * @throws ValidationException
     */
    public function addSeason()
    {
        return $this->validateSeason()->persistSeasonData();
    }

    # endregion





    # region Protected

    /**
     * Validates the data sent in for new and edit sessions
     *
     * @return $this
     * @throws ValidationException
     */
    protected function validateSeason()
    {
        $rules = [
            'name' => 'required|unique:seasons,name'
        ];

        $this->validate($this->request, $rules);

        return $this;
    }

    /**
     * Adds a season and sends back the season data
     *
     * @return mixed
     */
    protected function persistSeasonData()
    {
        return Season::create([
            'name' => $this->request->name
        ]);
    }

    # endregion
}
