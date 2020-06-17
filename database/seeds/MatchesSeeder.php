<?php

use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Seeder;

class MatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamsInSeason = Team::whereHas('seasons', function (Builder $query) {
            $query->where('season_id', 1);
        })->get()->toArray();

        for ($i = 0; $i < count($teamsInSeason); $i++) {
            $selected = $teamsInSeason[$i];

            for ($j = 0; $j < count($teamsInSeason); $j++) {
                $parsed = $teamsInSeason[$j];

                if ($selected['id'] !== $parsed['id']) {
                    $match_data = [
                        'season_id' => 1,
                        'home_team_id' => $selected['id'],
                        'away_team_id' => $parsed['id'],
                        'date' => \Carbon\Carbon::now()->addDays(rand(5,3))
                    ];

                    $match = \App\Models\Match::create($match_data);

                    $match->score()->create([]);

                }

            }
        }
    }
}
