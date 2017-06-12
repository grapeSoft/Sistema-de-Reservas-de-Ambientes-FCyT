<?php

namespace App\Http\Requests;

use App\Model\Grupo;
use App\Model\TipoReserva;
use Carbon\Carbon;
use App\Model\PeriodoExamen;
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
        $fecha_reserva = request()->input('id_fecha');
        $minNroParticipantes = TipoReserva::where('tipo', 'examen')->first()->min_nro_participantes;
        $max_nro_periodos = TipoReserva::where('tipo', 'examen')->first()->max_nro_periodos;
        $ids_usuario_materia = $ids_usuario_materia = request()->input('ids_usuario_materias');
        $horas = request()->input('ids_horas');

        $condicionNroInscritos = $this->verificarNroInscritos($minNroParticipantes, $ids_usuario_materia);
        $condicionNroPeridos = $this->verificarNroPeriodos($max_nro_periodos, $horas);
        $condicionReservaContinua = $this->verificarReservaContinua($horas);
        $condicionReservaPeriodoExamen = $this->verificarReservaPeriodoExamen($fecha_reserva);

        if($condicionNroPeridos){
            if($condicionReservaContinua){
                if(auth()->user()->esDocente()){
                    if($condicionNroInscritos){
                        $rules =  [
                            'ids_horas' => 'required',
                        ];
                    }
                    else{
                        $rules = [
                            'inscritos' => 'required',
                        ];
                    }
                }
                //Si no es usuario autorizado
                else{
                    if ($condicionReservaPeriodoExamen) {
                        $rules =  [
                            'reserva_aceptada' => 'required',
                            'ids_horas' => 'required',
                            'descripcion' => 'required|min:4|max:32',
                        ];
                    }
                    else{
                        $rules =  [
                            'ids_horas' => 'required',
                            'descripcion' => 'required|min:4|max:32',
                        ];
                    }
                }
            }
            else{
                $rules = [
                    'continuo' => 'required',
                ];
            }
        }
        else{
            $rules = [
                'periodos' => 'required',
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

    private function verificarReservaPeriodoExamen($fecha_reserva){
        $res = false;
        $fecha_reserva = Carbon::createFromFormat('Y-m-d', $fecha_reserva);
        $periodos_examen = PeriodoExamen::all();
        foreach ($periodos_examen as $periodo_examen) {
            $fechas_ini[] = Carbon::createFromFormat('Y-m-d', $periodo_examen->fecha_inicio);
            $fechas_fin[] = Carbon::createFromFormat('Y-m-d', $periodo_examen->fecha_fin);
        }
        if($fecha_reserva->between($fechas_ini[0], $fechas_fin[0]) || $fecha_reserva->between($fechas_ini[1], $fechas_fin[1])){
            $res = true;
        }
        else{
            $res = false;
        }
        return $res;
    }
}
