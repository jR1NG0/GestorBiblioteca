<?php

namespace GestorBiblioteca;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
   

    protected $table = 'estado';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'descripcion',
    ];



     /**
    *@utor jR1NG0
    *
    * funciones de ralaciones para estado
    */

    //------funcion un estado puede tener muchos ejemplares-------
    public function ejemplar()
    {
    	return $this->hasMany('GestorBiblioteca\Ejemplar');
    }

}