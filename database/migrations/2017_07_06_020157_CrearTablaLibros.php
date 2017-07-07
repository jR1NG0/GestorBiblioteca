<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaLibros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments('libro_id');
            $table->string('titulo');
            $table->date('anno');
            $table->integer('autor_id')->unsigned();
            $table->foreign('autor_id')->references('autor_id')->on('autores');
            $table->integer('id_genero')->unsigned();
            $table->foreign('id_genero')->references('id_genero')->on('generos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
