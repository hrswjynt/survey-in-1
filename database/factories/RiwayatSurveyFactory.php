<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class RiwayatSurveyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'users_id' => $this->faker->randomElement(User::pluck('id')),
            'tanggal' => $this->faker->date(),
            'target' => 10,
            'selesai' => 9
        ];
    }
}
