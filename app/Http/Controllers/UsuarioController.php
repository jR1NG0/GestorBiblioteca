<?php namespace GestorBiblioteca\Http\Controllers;

class UsuarioController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}


	
	public function getEditarPerfil()
	{
		return 'Formulario editar perfil';
	}

	public function postEditarPerfil()
	{
		return 'generando actualizacion de perfil';
	}
	
	public function missingMethod($parameters = array())
	{
		abort(404);
	}


}
