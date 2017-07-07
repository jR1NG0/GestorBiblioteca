<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEjemplares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejemplares', function (Blueprint $table) {
            $table->increments('ejemplar_id');
            $table->integer('libro_id')->unsigned();
            $table->foreign('libro_id')->references('libro_id')->on('libros'); 
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('estado_id')->on('estados');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios');
            $table->date('fecha_prestamo');
            $table->date('fecha_devolucion');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejemplares');
    }
}
