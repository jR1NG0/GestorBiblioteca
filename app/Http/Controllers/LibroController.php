<?php namespace GestorBiblioteca\Http\Controllers;

class LibroController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex()
	{
		return 'mostrando libros a usuario';
	}
	
	public function getCrearLibro()
	{
		return 'Formulario crear libro';
	}

	public function postCrearLibro()
	{
		return 'Almacenar libro';
	}

	public function getActualizarLibro()
	{
		return ' Formulario actualizar libro';
	}

	public function postActualizarLibro()
	{
		return ' actualizar libro';
	}

	public function getEliminarLibro()
	{
		return ' Formulario Eliminar libro';
	}

	public function postEliminarLibro()
	{
		return ' Eliminar libro';
	}

	public function missingMethod($parameters = array())
	{
		abort(404);
	}
}
