<?php

namespace Database\Factories;

use App\Models\User;
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
        $kecamatan = Kecamatan::with('detailSurvey')->get();
        $user = User::with('detailSurvey')->get();
        return [
            'users_id' => $this->faker->randomElement($user),
            'kecamatan_id' => $this->faker->randomElement($kecamatan),
            'tanggal' => $this->faker->date(),
            'target' => 10,
            'selesai' => mt_rand(1, 10)
        ];
    }
}
