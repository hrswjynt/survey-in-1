<?php

namespace Database\Factories;

use App\Models\Kabupaten;
use Illuminate\Database\Eloquent\Factories\Factory;

class KecamatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kabupaten_id = Kabupaten::pluck('id');
        return [
            'nama' => $this->faker->city(),
            'kabupaten_id' => $this->faker->randomElement($kabupaten_id)
        ];
    }
}
