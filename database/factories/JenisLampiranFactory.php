<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JenisLampiranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jenis' => $this->faker->randomElement([
                'Gerbang', 'Ruko Samping Kanan', 'Ruko Samping Kiri',
                'Kondisi Jalan', 'Kondisi Saluran Kanan',
                'Kondisi Saluran Kiri', 'Kondisi Fasos',
                'Tampak Rumah'
            ])
        ];
    }
}
