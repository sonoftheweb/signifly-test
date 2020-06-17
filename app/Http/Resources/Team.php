<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;

class Team extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (is_a($this->whenLoaded('matchesAsHome'), Collection::class)) {
            $winsLossesHome = $this->matchesWinsLosses($this->matchesAsHome);
            $winsLossesAway = $this->matchesWinsLosses($this->matchesAsAway, false);
        }

        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'players' => Player::collection($this->whenLoaded('players')),
            'matches_as_home' => $this->whenLoaded('matchesAsHome')
        ];

        if (is_a($this->whenLoaded('matchesAsHome'), Collection::class)) {
            $data['wins'] = $winsLossesHome['wins'] + $winsLossesAway['wins'];
            $data['losses'] = $winsLossesHome['losses'] + $winsLossesAway['losses'];
            $data['points'] = ($winsLossesHome['wins'] + $winsLossesAway['wins']) * 3;
        }

        return $data;
    }

    protected function matchesWinsLosses($matches, $home = true)
    {
        $aggr = ['wins' => 0, 'losses' => 0];

        foreach ($matches as $match) {
            if ($home) {
                if ($match->score->home_team_score > $match->score->away_team_score)
                    $aggr['wins'] += 1;

                if ($match->score->away_team_score > $match->score->home_team_score)
                    $aggr['losses'] += 1;
            } else {
                if ($match->score->away_team_score > $match->score->home_team_score)
                    $aggr['wins'] += 1;

                if ($match->score->home_team_score > $match->score->away_team_score)
                    $aggr['losses'] += 1;
            }
        }

        return $aggr;
    }
}
