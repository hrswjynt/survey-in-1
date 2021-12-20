<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasos', function (Blueprint $table) {
            $table->foreignId('data_surveys_id');
            $table->foreignId('jenis_fasos_id');
            $table->string('koordinat_fasos');
            $table->string('foto');

            $table->foreign('data_surveys_id')->references('id')->on('data_surveys');
            $table->foreign('jenis_fasos_id')->references('id')->on('jenis_fasos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fasos');
    }
}
