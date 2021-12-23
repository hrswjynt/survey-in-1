<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Fasos;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\DataSurvey;
use App\Models\DetailSurveys;
use App\Models\JenisFasos;
use App\Models\LampiranFoto;
use App\Models\JenisLampiran;
use App\Models\DetailSurvey;
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
        User::factory(5)->create();

        // Jenis Lampiran
        JenisLampiran::create([
            'jenis' => 'Gerbang'
        ]);
        JenisLampiran::create([
            'jenis' => 'Ruko Samping Kanan'
        ]);
        JenisLampiran::create([
            'jenis' => 'Ruko Samping Kiri'
        ]);
        JenisLampiran::create([
            'jenis' => 'Kondisi Jalan'
        ]);
        JenisLampiran::create([
            'jenis' => 'Kondisi Saluran Kanan'
        ]);
        JenisLampiran::create([
            'jenis' => 'Kondisi Saluran Kiri'
        ]);
        JenisLampiran::create([
            'jenis' => 'Kondisi Fasos'
        ]);
        JenisLampiran::create([
            'jenis' => 'Tampak Rumah'
        ]);

        Provinsi::factory(10)->create();
        Kabupaten::factory(10)->create();
        Kecamatan::factory(10)->create();

        // Jenis Fasos
        JenisFasos::create([
            'jenis' => 'Masjid'
        ]);
        JenisFasos::create([
            'jenis' => 'Lapangan'
        ]);
        JenisFasos::create([
            'jenis' => 'Kuburan'
        ]);

        DetailSurveys::factory(10)->create();

        // Jenis Konstruksi Saluran
        JenisKonstruksiSaluran::create([
            'jenis' => 'Cor Beton'
        ]);
        JenisKonstruksiSaluran::create([
            'jenis' => 'Batu Kali'
        ]);
        JenisKonstruksiSaluran::create([
            'jenis' => 'Sheet Pile'
        ]);
        JenisKonstruksiSaluran::create([
            'jenis' => 'Tanah'
        ]);
        JenisKonstruksiSaluran::create([
            'jenis' => 'Uditch'
        ]);

        // Jenis Konstruksi Jalan
        JenisKonstruksiJalan::create([
            'jenis' => 'Aspal'
        ]);
        JenisKonstruksiJalan::create([
            'jenis' => 'Beton'
        ]);
        JenisKonstruksiJalan::create([
            'jenis' => 'Tanah Liat'
        ]);
        JenisKonstruksiJalan::create([
            'jenis' => 'Tanah Berbatu'
        ]);

        DataSurvey::factory(10)->create();
        LampiranFoto::factory(10)->create();
        Fasos::factory(10)->create();

        User::create([
            'nama_lengkap' => 'Seli bitri',
            'gender' => 'perempuan',
            'avatar' => "https://source.unsplash.com/random",
            'nomor_telepon' => '082252423199',
            'alamat' => 'Sungai Raya Dalam Arah Kubu Raya ',
            'role' => 'admin',
            'email' => 'selibitri@gmail.com',
            'password' => bcrypt('password')
        ]);
    }
}
