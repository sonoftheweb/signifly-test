<?php


namespace App\Http\UseCase;

use App\Models\Score;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class ScoreObj
{
    use ValidatesRequests;

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function updateScore(Score $score)
    {
        return $this->validateScore()->update($score);
    }

    protected function validateScore()
    {
        $rules = [
            'home_team_score' => 'required|numeric',
            'away_team_score' => 'required|numeric',
        ];

        $this->validate($this->request, $rules);

        return $this;
    }

    protected function update(Score $score)
    {
        $score->home_team_score = $this->request->home_team_score;
        $score->away_team_score = $this->request->away_team_score;
        $score->save();

        return $score;
    }
}
