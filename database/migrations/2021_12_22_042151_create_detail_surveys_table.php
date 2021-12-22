<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_surveys', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->foreignId('kecamatan_id');
            $table->date('tanggal');
            $table->integer('target');
            $table->integer('selesai');
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('kecamatan_id')->references('id')->on('kecamatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_surveys');
    }
}
