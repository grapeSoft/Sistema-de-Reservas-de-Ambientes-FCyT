<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Model\Grupo;
use App\Model\TipoReserva;

class UpdateReserva extends FormRequest
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
        $rules = [
            'noAutorizado' => 'required',
        ];

        $minNroParticipantes = TipoReserva::where('tipo', 'examen')->first()->min_nro_participantes;
        $max_nro_periodos = TipoReserva::where('tipo', 'examen')->first()->max_nro_periodos;
        $ids_usuario_materia = $ids_usuario_materia = request()->input('ids_usuario_materias');
        $horas = request()->input('ids_horas');

        $condicionNroInscritos = $this->verificarNroInscritos($minNroParticipantes, $ids_usuario_materia);



            if(auth()->user()->esDocente()){
                if($condicionNroInscritos){
                    $rules =  [
                    ];
                }
            }
            //Si no es usuario autorizado
            else{
                $rules =  [
                    'descripcion' => 'required|min:4|max:32',
                ];
            }

        return $rules; //Unica regla requerida es ids_horas required xq ya se estan verificando las demas condiciones
    }

    private function verificarNroInscritos($minNroParticipantes, $ids_usuario_materia)
    {
        $totalInscritos = 0;
        $r = false;
        if($ids_usuario_materia !== null)
            foreach($ids_usuario_materia as $id)
                $totalInscritos += Grupo::findOrFail($id)->numero_inscritos;
        if($totalInscritos >= $minNroParticipantes)
            $r =true;
        return $r;
    }
}
