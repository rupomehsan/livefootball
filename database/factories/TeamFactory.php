<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "tournament_id"=>$this->faker->numberBetween(1,5),
            "group_id"=>$this->faker->numberBetween(1,5),
            "team_name"=>$this->faker->country(),
            "description"=>$this->faker->paragraph,
            "couch_name"=>$this->faker->name(),
            "image"=>$this->faker->imageUrl,
        ];
    }
}
