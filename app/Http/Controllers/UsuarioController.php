<?php

namespace GestorBiblioteca\Http\Controllers;

use Illuminate\Http\Request;
use GestorBiblioteca\Http\Requests\LibroRequest; 
use GestorBiblioteca\Usuario;    



use Redirect; 
use Session;   

class UsuarioController extends Controller
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
        $usuarios = Usuario::all(); // se obtiene la totalidad de Libroes existentes en la BD
        $datos = array ();
        $contador = 0;

        // se obtenendran los valores de cada usuario y se almacenaran en un array para ser retornados hacia la vista
        foreach ($usuarios as $usuario) {
            
            $datos[$contador]["id"] = $usuario->usuario_id;
            $datos[$contador]["nombre"] = $usuario->nombre;
            $datos[$contador]["apellido"]= $usuario->apellido;
             $datos[$contador]["rut"] = $usuario->rut;
            $datos[$contador]["telefono"] = $usuario->telefono;
        

            $contador++;
        }
      
        return view("/usuarios", compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
              
        
   
        return view("/crearUsuario");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     */
    public function store(UsuarioRequest  $request)
    {
        
         if (Usuario::create($request->all())) { 
             Session::flash('message-success','nuevo usuario se creó exitosamente');
        } else {
            Session::flash('message-error','No se ha podido crear usuario');
        }
        
      
        return Redirect::to('/usuarios');
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
        $usuarios = Usuario::find($id);
        
     

        // se retorna la vista  y los datos
        return view('editUsuario', compact('nombre','apellido','rut','telefono'));
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
        $usuario = Usuario::find($id); 
        $usuario->fill($request->all()); 

        if ($usuario->save()) {
            Session::flash('message-success','se actualizó usuario exitosamente');
        } else {
           Session::flash('message-error','No se ha podido actualizar usuario');
        }
        
        return Redirect::to('/usuarios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id); // se busca la usuario

        if ($usuario->delete()) {  // se elimina
            Session::flash('message-success','se eliminó el usuario exitosamente');
        } else {
           Session::flash('message-error','No se ha podido eliminar usuario');
        }
        return Redirect::to('/usuarios');
    }

    public function missingMethod($parameters = array())
	{
		abort(404);
	}

}


	
