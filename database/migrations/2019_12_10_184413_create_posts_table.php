<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->string('email', 50)->nullable();
            $table->string('asunto', 20)->nullable();
            $table->string('descripcion', 256)->nullable(); 
            $table->integer('idmascota')->unsigned();
            $table->timestamps();

            $table->foreign('idmascota')->references('id')->on('mascotas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
