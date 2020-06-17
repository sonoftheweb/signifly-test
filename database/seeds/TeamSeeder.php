<?php

use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker  = \Faker\Factory::create();

        factory(\App\Models\Team::class, 8)->create()->each(function ($team) {
            $team->players()->save(factory(\App\Models\Player::class)->make());

            // attach this to season 1
            $team->seasons()->attach(1);
        });
    }
}
