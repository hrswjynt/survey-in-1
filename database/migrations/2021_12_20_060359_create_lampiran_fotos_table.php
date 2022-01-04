<?php

use App\Models\DataSurvey;
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
            $table->foreignIdFor(DataSurvey::class);
            $table->foreignId('jenis_lampirans_id');
            $table->string('foto');

            $table->foreign('jenis_lampirans_id')->references('id')->on('jenis_lampirans')->onDelete('cascade');
            $table->softDeletes();
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
