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
        $id_kab = Kabupaten::pluck('id_kab');
        return [
            'nama' => $this->faker->city(),
            'id_kab' => $this->faker->randomElement($id_kab)
        ];
    }
}
