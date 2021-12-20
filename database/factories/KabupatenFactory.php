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
        $id_prov = Provinsi::pluck('id_prov');
        return [
            'nama' => $this->faker->city(),
            'id_prov' => $this->faker->randomElement($id_prov)
        ];
    }
}
