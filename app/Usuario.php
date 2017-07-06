<?php 

namespace GestorBiblioteca;

use Illuminate\Database\Eloquent\Model;


class Usuario extends Model {

	
	protected $table = 'usuarios';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'id', 'nombre', 'apellido', 'rut','telefono',];


	/**
    *@utor jR1NG0
    *
    * funciones ralaciones para libro.
    */

    //funcion: un usuario puedes pedir muchos ejemplares
     public function ejemplar()
    {
        return $this->hasMany('GestorBiblioteca\Ejemplar');
    }
}
