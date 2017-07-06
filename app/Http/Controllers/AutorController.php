<?php namespace GestorBiblioteca\Http\Controllers;

class AutorController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex()
	{
		return 'mostrando autor del libros a usuario';
	}
	
	public function getCrearAutor()
	{
		return 'Formulario crear Autor';
	}

	public function postCrearAutor()
	{
		return 'Almacenar Autor';
	}

	public function getActualizarAutor()
	{
		return ' Formulario actualizar Autor';
	}

	public function postActualizarAutor()
	{
		return ' actualizar Autor';
	}

	public function getEliminarAutor()
	{
		return ' Formulario Eliminar Autor';
	}

	public function postEliminarAutor()
	{
		return ' Eliminar Autor';
	}

	public function missingMethod($parameters = array())
	{
		abort(404);
	}

}
