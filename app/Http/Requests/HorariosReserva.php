<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HorariosReserva extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    protected $redirectRoute = 'reservas.create';

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
            'fecha' => [
                'date',
                'required',
                Rule::exists('fecha', 'id_fecha')->where(function ($query) {
                    $query->where('tipo', 'Normal');
                }),'after_or_equal:today'
            ],
            'ambiente' => 'required',
        ];

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'fecha.after_or_equal' => 'El campo fecha debe ser una fecha posterior o igual a la fecha de hoy.',
            'fecha.exists'  => 'No existen horarios disponibles para la fecha ingresada, revise el calendario academico.',
        ];
    }
}
