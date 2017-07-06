<?php

namespace GestorBiblioteca;

use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
   

    protected $table = 'ejemplares';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'libro_id', 'estado_id','usuario_id','fecha_prestamo','fecha_devolucion',
    ];



    /**
    *@utor jR1NG0
    *
    * funciones ralaciones para libro.
    */


    //_-----------funcion: ejemplar pertenece a un estado-----------------------
    public function estado()
    {
    	return $this->belongsTo('GestorBiblioteca\Estado');
    }

     //_-----------funcion: ejemplar pertenece a un libro-----------------------
    public function libro()
    {
    	return $this->belongsTo('GestorBiblioteca\Libro');
    }
}