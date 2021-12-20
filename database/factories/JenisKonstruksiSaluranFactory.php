<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JenisKonstruksiSaluranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis' => $this->faker->randomElement(['Cor Beton','Batu Kali','Sheet Pile','Tanah','Uditch'])
        ];
    }
}
