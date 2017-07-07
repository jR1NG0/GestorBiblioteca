<?php

namespace GestorBiblioteca\Http\Controllers;

use Illuminate\Http\Request;
use GestorBiblioteca\Http\Requests\LibroRequest; 
use GestorBiblioteca\Libro;    
use GestorBiblioteca\Autor;
use GestorBiblioteca\Genero;

use Redirect; 
use Session;   

class LibroController extends Controller
{   

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
        $libros = Libro::all(); // se obtiene la totalidad de Libroes existentes en la BD
        $datos = array ();
        $contador = 0;

        // se obtenendran los valores de cada Libro y se almacenaran en un array para ser retornados hacia la vista
        foreach ($libros as $libro) {
            $autor = Autor::find($libro->autor_id);
            $genero = Genero::find($libro->id_genero);
            

            $datos[$contador]["id"] = $libro->libro_id;
            $datos[$contador]["titulo"] = $libro->titulo;
            $datos[$contador]["anno"] = $libro->anno;
            $datos[$contador]["autor"]= $autor->nombre;
            $datos[$contador]["genero"] = $genero->descripcion;
        

            $contador++;
        }
        // retorno de vista y datos que listara
        return view("/libros", compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $autores = Autor::all();
        $generos = Genero::all();
        
        
   
        return view("/crearLibro",compact('autores','generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(LibroRequest  $request)
    {
        
         if (Libro::create($request->all())) { 
             Session::flash('message-success','Se ha creado nuevo Libro se creó exitosamente');
        } else {
            Session::flash('message-error','No se ha podido crear Libro');
        }
        
      
        return Redirect::to('/libros');
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
        $libros = Libro::find($id);
        $autores = Autor::all();
        $generos = Genero::all();
     

        // se retorna la vista  y los datos
        return view('editLibro', compact('titulo','anno','autor','genero'));
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
        $libro = Libro::find($id); 
        $libro->fill($request->all()); 

        if ($libro->save()) {
            Session::flash('message-success','se actualizó Libro exitosamente');
        } else {
           Session::flash('message-error','No se ha podido actualizar Libro');
        }
        
        return Redirect::to('/libros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libro = Libro::find($id); // se busca la Libro

        if ($libro->delete()) {  // se elimina
            Session::flash('message-success','se eliminó el Libro exitosamente');
        } else {
           Session::flash('message-error','No se ha podido eliminar Libro');
        }
        return Redirect::to('/libros');
    }

    public function missingMethod($parameters = array())
	{
		abort(404);
	}

}


	
