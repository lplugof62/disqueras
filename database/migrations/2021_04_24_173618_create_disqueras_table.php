<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisquerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disqueras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nitDisquera','20');
            $table->string('nombreDisquera','100');
            $table->string('telefonoDisquera','15');
            $table->string('estadoDisquera','15');
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
        Schema::dropIfExists('disqueras');
    }
}
