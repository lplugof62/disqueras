<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('noDocumento','20');
            $table->string('tipoDocumento','20');
            $table->string('nombreArtista','50');
            $table->string('apellidoArtista','50')->nullable();
            $table->string('nombreArtistico','50');
            $table->date('fechaNacimArtista','50');
            $table->string('emailArtista','50');
            $table->unsignedInteger('idDisqueraFK');
            $table->foreign('idDisqueraFK')->references('id')->on('disqueras');
            $table->string('estadoArtista','10');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artistas');
    }
}
