<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FasosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'data_surveys_id' => mt_rand(1, 20),
            'jenis_fasos_id' => mt_rand(1, 20),
            'koordinat_fasos' => $this->faker->longitude($min = -180, $max = 180),
            'foto' => "https://source.unsplash.com/random"
        ];
    }
}
