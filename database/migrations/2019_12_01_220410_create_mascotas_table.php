<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idespecie')->unsigned();
            $table->integer('idduenio')->unsigned();
            $table->string('nombre', 100);
            $table->string('imagen')->nullable();
            $table->integer('telefono');
            $table->string('lugar', 100);
            $table->string('descripcion', 256)->nullable();
            $table->boolean('condicion')->default(1);
            $table->timestamps();

            $table->foreign('idespecie')->references('id')->on('especies');
            $table->foreign('idduenio')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mascotas');
    }
}
