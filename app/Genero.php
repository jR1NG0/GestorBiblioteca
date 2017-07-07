<?php

namespace GestorBiblioteca;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{   
    
    protected $table = 'generos';
   

    protected $primaryKey = 'id_genero';
   

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $fillable = [
        'descripcion',
    ];
}
