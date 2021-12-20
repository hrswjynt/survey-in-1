<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JenisFasos;
use App\Models\DataSurvey;

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
            'data_surveys_id' => $this->faker->randomElement(DataSurvey::pluck('id')),
            'jenis_fasos_id' => $this->faker->randomElement(JenisFasos::pluck('id')),
            'koordinat_fasos' => $this->faker->longitude($min = -180, $max = 180),
            'foto' => "https://source.unsplash.com/random"
        ];
    }
}
