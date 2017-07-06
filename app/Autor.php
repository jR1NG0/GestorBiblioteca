<?php

namespace GestorBiblioteca;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
   

    protected $table = 'autores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'nombre', 'apellido',
    ];

    

    //funcion un autor puede tener muchos libros
    public function libros()
    {
    	return $this->hasMany('GestorBiblioteca\Libro');
    }

}