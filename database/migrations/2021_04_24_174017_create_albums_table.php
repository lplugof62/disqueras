<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreAlbum','70');
            $table->year('anioPublicacion');
            $table->unsignedInteger('idArtistaFK');
            $table->foreign('idArtistaFK')->references('id')->on('artistas');
            $table->unsignedInteger('idGeneroFK');
            $table->foreign('idGeneroFK')->references('id')->on('generos');
            $table->string('estadoAlbum','10');
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
        Schema::dropIfExists('albums');
    }
}
