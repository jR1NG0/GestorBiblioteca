<?php

namespace GestorBiblioteca\Http\Controllers;

use Illuminate\Http\Request;
use GestorBiblioteca\Http\Requests\EjemplarRequest; // request personalizado creado para la validacion de datos del formulario
//uso de modelos
use GestorBiblioteca\Ejemplar;   
use GestorBiblioteca\Genero; 
use GestorBiblioteca\Libro;
use GestorBiblioteca\Usuario;
//uso de componentes
use Redirect; // redireccionamiento a otra ruta
use Session;    // comunicador de mensajes hacia el cliente

class EjemplarController extends Controller
{   

    // Constructor
    public function __construct()
    {   
        // utiliza el middleware auth
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ejemplares = Ejemplar::all(); // se obtiene la totalidad de ejemplares existentes en la BD
        $datos = array ();
        $contador = 0;

        // se obtenendran los valores de cada ejemplar y se almacenaran en un array para ser retornados hacia la vista
        foreach ($ejemplares as $ejemplares) {
            $genero = Genero::find($ejemplar->id_genero); // se busca el genero especifico de la ejemplar, buscando el id

            // asigancion de valores
            $datos[$contador]["id"] = $ejemplar->id_ejemplar;
            $datos[$contador]["libro"] = $libro->titulo;
            $datos[$contador]["genero"] = $genero->descripcion;
            $datos[$contador]["usuario"]= $usuario->nombre;
            $datos[$contador]["fecha_prestamo"] = $ejemplar->fecha_prestamo;
            $datos[$contador]["fecha_devolucion"] = $ejemplar->fecha_devolucion;

            $contador++;
        }
        // retorno de vista y datos que listara
        return view("/home", compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $generos = Genero::all(); // se obtiene todos los generos
        
        // retorno de vista y datos que listara
        return view("/createEjemplar",compact('generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     *
     *Se implementa un Request propio para las validaciones de los datos el request
     *Revisar GestorBiblioteca\Http\Requests\ejemplar.php*/
    public function store(EjemplarRequest  $request)
    {
        // creacion y a su vez validacion si el recurso se creo correctamente
         if (Ejemplar::create($request->all())) { 
            // se envia mensaje de confirmacion, (nombre, mensaje) es recivido por alerts.blade.php ubicado en resources/views
            Session::flash('message-success','Se ha creado nuevo Ejemplar se creó exitosamente');
        } else {
            // se envia mensaje de confirmacion, (nombre, mensaje) es recivido por alerts.blade.php ubicado en resources/views
           Session::flash('message-error','No se ha podido crear Ejemplar');
        }
        
        // se retorna a la ruta 
        return Redirect::to('/ejemplares');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ejemplar = ejemplar::find($id); // se busca la ejemplar
        $generos = Genero::all(); // se busca la ejemplar

        // se retorna la vista  y los datos
        return view('editEjemplar', compact('ejemplar','generos'));
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
        $ejemplar = Ejemplar::find($id); // busqueda de la ejemplar a actualizar
        $ejemplar->fill($request->all()); // se rellenaran los atributos del objeto con sus respectivos datos
        
        // se guardan los cambios
        if ($ejemplar->save()) {
            Session::flash('message-success','se actualizó Ejemplar exitosamente');
        } else {
           Session::flash('message-error','No se ha podido actualizar Ejemplar');
        }
        
        return Redirect::to('/ejemplares');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ejemplar = Ejemplar::find($id); // se busca la ejemplar

        if ($ejemplar->delete()) {  // se elimina
            Session::flash('message-success','se eliminó el Ejemplar exitosamente');
        } else {
           Session::flash('message-error','No se ha podido eliminar Ejemplar');
        }
        return Redirect::to('/ejemplares');
    }

    public function missingMethod($parameters = array())
	{
		abort(404);
	}

}


	
