<?php namespace GestorBiblioteca\Http\Controllers\Validacion;

use GestorBiblioteca\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use GestorBiblioteca\Http\Requests\IniciarSesionRequest;
use GestorBiblioteca\Usuario;
use Validator;
use Auth;

class ValidacionController extends Controller {


	
	public function __construct()
	{
		
		$this->middleware('guest', ['except' => 'getSalida']);
	}

 
	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegistro()
	{
		return view('validacion.registro');
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegistro(Request $request)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		Auth::login($this->create($request->all()));

		return redirect($this->redirectPath());
	}

	/**
	 * Show the application login form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getInicio()
	{
		return view('validacion.inicio');
	}

	/**
	 * Handle a login request to the application.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postInicio(IniciarSesionRequest $request)
	{
		$credentials = $request->only('email', 'password');

		if (Auth::attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getFailedLoginMessage(),
					]);
	}

	/**
	 * Get the failed login message.
	 *
	 * @return string
	 */
	protected function getFailedLoginMessage()
	{
		return 'email o contraseña incorrectos';
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getSalida()
	{
		Auth::logout();

		return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/');
	}

	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		if (property_exists($this, 'redirectPath'))
		{
			return $this->redirectPath;
		}

		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/inicio';
	}

	/**
	 * Get the path to the login route.
	 *
	 * @return string
	 */
	public function loginPath()
	{
		return property_exists($this, 'loginPath') ? $this->loginPath : '/validacion/inicio';
	}

	public function validator(array $data)
	{
		return Validator::make($data, [
			
			'nombre' => 'required|max:255',
			'apellido' => 'required|max:255',
			'rut' => 'required|max:255',
			'telefono' => 'required|max:255',
			'email' => 'required|email|max:255|unique:usuarios',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return Usuario::create([
			
			'nombre' => $data['nombre'],
			'apellido' => $data['apellido'],
			'rut' => $data['rut'],
			'telefono' => $data['telefono'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}

	
