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
            'date_surveys_id' => mt_rand(1, 20),
            'jenis_fasos_id' => mt_rand(1, 20)
        ];
    }
}
