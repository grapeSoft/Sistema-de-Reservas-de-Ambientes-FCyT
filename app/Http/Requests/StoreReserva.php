<?php

namespace App\Http\Requests;

use App\Model\Grupo;
use App\Model\TipoReserva;
use Illuminate\Foundation\Http\FormRequest;

class StoreReserva extends FormRequest
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
        $condicionNroPeridos = $this->verificarNroPeriodos($max_nro_periodos, $horas);
        $condicionReservaContinua = $this->verificarReservaContinua($horas);

        if($condicionNroPeridos && $condicionReservaContinua){
            if(auth()->user()->esDocente()){
                if($condicionNroInscritos){
                    $rules =  [
                        'ids_horas' => 'required',
                    ];
                }
            }
            //Si no es usuario autorizado
            else{
                $rules =  [
                    'ids_horas' => 'required',
                    'descripcion' => 'required|min:4|max:32',
                ];
            }
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

    private function verificarNroPeriodos($max_nro_periodos, $horas){
        $c = 1;
        $r = true;
        if($horas!=null) {
            foreach ($horas as $h) {
                if ($c > $max_nro_periodos) {
                    $r = false;
                }
                $c++;
            }
        }
        return $r;
    }

    private function verificarReservaContinua($horas){
        $i = $horas[0];
        $c = 1;
        $r = true;
        if($horas!=null) {
            foreach ($horas as $h) {
                if ( !($h == $i)) {
                    $r = false;
                }
                $c++;
                $i++;
            }
        }
        return $r;
    }
}
