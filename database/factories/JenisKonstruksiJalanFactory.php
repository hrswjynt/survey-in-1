<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JenisKonstruksiJalanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis' => $this->faker->randomElement(['Aspal','Beton','Tanah Liat','Tanah Berbatu'])
        ];
    }
}
