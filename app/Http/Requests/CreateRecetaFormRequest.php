<?php

namespace Nevera\Http\Requests;

use Nevera\Http\Requests\Request;

class CreateRecetaFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|alpha_spaces',
            'descripcion' => 'required',
            'duracion' => 'required|integer|min:1',
            'dificultad' => 'required|integer|between:1,5',
            'personas' => 'integer|min:1',
            'fuente' => 'url',
            'categorias' => 'required',
        ];
    }
}
