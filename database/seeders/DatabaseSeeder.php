<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Fasos;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\DataSurvey;
use App\Models\JenisFasos;
use App\Models\LampiranFoto;
use App\Models\JenisLampiran;
use App\Models\RiwayatSurvey;
use Illuminate\Database\Seeder;
use App\Models\JenisKonstruksiJalan;
use App\Models\JenisKonstruksiSaluran;


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
        User::factory(20)->create();
        JenisLampiran::factory(10)->create();
        Provinsi::factory(10)->create();
        Kabupaten::factory(10)->create();
        Kecamatan::factory(10)->create();
        JenisFasos::factory(10)->create();
        JenisKonstruksiJalan::factory(10)->create();
        JenisKonstruksiSaluran::factory(10)->create();
        DataSurvey::factory(10)->create();
        LampiranFoto::factory(10)->create();
        Fasos::factory(10)->create();
        RiwayatSurvey::factory(20)->create();
    }
}
