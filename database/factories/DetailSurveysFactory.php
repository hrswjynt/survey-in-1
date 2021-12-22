<?php

namespace Database\Factories;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
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
        $kecamatan = Kabupaten::with('kecamatan')->first();
        return [
            'users_id' => 1,
            'kecamatan_id' => $this->faker->randomElement($kecamatan[0]->kabupaten->id),
            'tanggal' => $this->faker->date(),
            'target' => 10,
            'selesai' => mt_rand(1, 10)
        ];
    }
}
