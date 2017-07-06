<?php namespace GestorBiblioteca\Http\Controllers;

class EstadoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex()
	{
		return 'mostrando estado ejemplar a usuario';
	}
	
	public function getCrearEstado()
	{
		return 'Formulario crear Estado';
	}

	public function postCrearEstado()
	{
		return 'Almacenar Estado';
	}

	public function getActualizarEstado()
	{
		return ' Formulario actualizar Estado';
	}

	public function postActualizarEstado()
	{
		return ' actualizar Estado';
	}

	public function getEliminarEstado()
	{
		return ' Formulario Eliminar Estado';
	}

	public function postEliminarEstado()
	{
		return ' Eliminar Estado';
	}

	public function missingMethod($parameters = array())
	{
		abort(404);
	}

}
