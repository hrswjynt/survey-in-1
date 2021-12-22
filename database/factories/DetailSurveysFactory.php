<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetailSurveysFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id' => 1,
            'tanggal' => $this->faker->date(),
            'target' => 10,
            'selesai' => mt_rand(1, 10)
        ];
    }
}
