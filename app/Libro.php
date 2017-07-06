<?php

namespace GestorBiblioteca;

use Illuminate\Database\Eloquent\Model;


class Libro extends Model
{
   
    protected $table = 'libros';

    /**
     * 
     *
     * @var array
     */
    protected $fillable = [
       'id', 'titulo','anno','autor_id','genero_id',
    ];


    /**
    *@utor jR1NG0
    *
    * funciones ralaciones para libro.
    */


    //---------funcion un libro puede tener muchos ejemplares---------------
    public function ejemplar()
    {
    	return $this->hasMany('GestorBiblioteca\Ejemplar');
    }

    //_-----------funcion libro pertenece a un genero-----------------------
    public function genero()
    {
    	return $this->belongsTo('GestorBiblioteca\Genero');
    }

     //_-----------funcion libro pertenece a un autor-----------------------
    public function autor()
    {
    	return $this->belongsTo('GestorBiblioteca\Autor');
    }
}
