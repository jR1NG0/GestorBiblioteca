<?php

namespace GestorBiblioteca\Http\Controllers\Api;

use GestorBiblioteca\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GestorBiblioteca\Http\Requests\EjemplarRequest; // request personalizado creado para la validacion de datos del formulario
//uso de modelos
use GestorBiblioteca\Ejemplar;   
use GestorBiblioteca\Genero;
use GestorBiblioteca\Estado;
use GestorBiblioteca\Usuario;
use GestorBiblioteca\Libro;

//uso de componentes
use Redirect; // redireccionamiento a otra ruta
use Session;    // comunicador de mensajes hacia el cliente

class EjemplarApiController extends Controller
{   

    // Constructor
    public function __construct()
    {   
        // utiliza el middleware auth
        // $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Ejemplar::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *
     *Se implementa un Request propio para las validaciones de los datos el request
     *Revisar GestorBiblioteca\Http\Requests\Ejemplar.php*/
    public function store(Ejemplar  $request)
    {
        // creacion y a su vez validacion si el recurso se creo correctamente
        $Ejemplar = Ejemplar::create($request->all());
        if (!isset($ejemplar)) { 
            $datos = [
            'errors' => true,
            'msg' => 'No se creo Ejemplar',
            ];
            $ejemplar = \Response::json($datos, 404);
        }         
        // se retorna a la ruta 
        return $ejemplar;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $ejemplar = Ejemplar::find($id);
        if (!isset(ejemplar)) {
            $datos = [
            'errors' => true,
            'msg' => 'No se encontró la Ejemplar con ID = ' . $id,
            ];
            $Ejemplar = \Response::json($datos, 404);
        }
        return $ejemplar;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ejemplar = Ejemplar::find($id); // busqueda de la Ejemplar a actualizar
        $ejemplar->fill($request->all()); // se rellenaran los atributos del objeto con sus respectivos datos
        $ejemplar = $ejemplar->save();
        // se guardan los cambios
        if (isset($Ejemplar)) {
            $ejemplar = \Response::json($ejemplar, 200);
        } else {
           $ejemplar = \Response::json(['error' => 'No se ha podido actualizar la Ejemplar'], 404);
        }
        return $ejemplar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ejemplar = Ejemplar::find($id); // se busca la Ejemplar

        if ($ejemplar->delete()) {  // se elimina
            $ejemplar = \Response::json(['delete' => true, 'id' => $id], 200);
        } else {
           $ejemplar = \Response::json(['error' => 'No se ha podido eliminar la Ejemplar'], 403);
        }
        return $ejemplar;
    }
}|