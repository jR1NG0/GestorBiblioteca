<?php

namespace GestorBiblioteca;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
   

    protected $table = 'autores';

    protected $primaryKey = 'autor_id';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'apellido',
    ];

    

    //funcion un autor puede tener muchos libros
    public function libros()
    {
    	return $this->hasMany('GestorBiblioteca\Libro');
    }

}