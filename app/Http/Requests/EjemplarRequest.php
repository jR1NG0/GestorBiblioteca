<?php

namespace GestorBiblioteca\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PeliculaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // se define como autorizado para su implementacion
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {   
        // se definen las reglas para el request entrante a la aplicacion
        return [
            'id' => 'required',
            'libro_id' => 'required|numeric',
            'estado_id' => 'required|numeric',
            'usuario_id' => 'required|numeric',
            'fecha_prestamo' => 'required|date'
            'fecha_devolucion' => 'required|date'
        ];
    }
}
