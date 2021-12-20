<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fasos;
use App\Models\User;
use App\Models\RiwayatSurvey;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Fasos::factory(10)->create();
        User::factory(20)->create();
        RiwayatSurvey::factory(20)->create();
    }
}
