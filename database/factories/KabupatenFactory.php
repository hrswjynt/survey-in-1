<?php

namespace Database\Factories;

use App\Models\Provinsi;
use Illuminate\Database\Eloquent\Factories\Factory;

class KabupatenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $provinsi_id = Provinsi::pluck('id');
        return [
            'provinsi_id' => $this->faker->randomElement($provinsi_id),
            'nama' => $this->faker->city()
        ];
    }
}
