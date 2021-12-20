<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLampiranFotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lampiran_fotos', function (Blueprint $table) {
            $table->foreignId('data_surveys_id');
            $table->foreignId('jenis_lampirans_id');
            $table->string('foto');

            $table->foreign('data_surveys_id')->references('id')->on('data_surveys');
            $table->foreign('jenis_lampirans_id')->references('id')->on('jenis_lampirans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lampiran_fotos');
    }
}
