<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');

            // lokasi
            $table->foreignId('kecamatan_id');
            $table->string('nama_gang');
            $table->string('lokasi');

            // koordinat
            $table->string('no_gps');
            $table->string('no_gps_fasos');
            $table->string('no_gps_lainnya');

            // jalan
            $table->integer('jenis_konstruksi_jalan_id');
            $table->integer('dimensi_jalan_panjang');
            $table->integer('dimensi_jalan_lebar');
            $table->string('status_jalan');

            // saluran
            $table->integer('jenis_konstruksi_saluran_id');

            $table->integer('d_pjg_jalan');
            $table->integer('d_lbr_jalan');
            $table->integer('d_pjg_saluran');
            $table->integer('d_lbr_saluran');
            $table->integer('d_kdlm_saluran');
            $table->string('kondisi_saluran');
            $table->string('luas_fasos');
            $table->string('koordinat_fasos');
            $table->integer('jml_rumah_layak');
            $table->integer('jml_rumah_tdklayak');
            $table->integer('jml_rumah_kosong');
            $table->integer('jml_rumah_developer');
            $table->integer('jml_rumah_swadaya');
            $table->string('pos_jaga');
            $table->enum('ruko_dpn_kiri', ['ada', 'tidak ada']);
            $table->enum('ruko_dpn_kanan', ['ada', 'tidak ada']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_kec')->references('id_kec')->on('kecamatans');
            $table->foreign('id_data')->references('id_data')->on('id_data_surveys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_surveys');
    }
}
