<?php

namespace App\Http\Controllers;

use App\Model\Calendario;
use App\Model\Fecha;
use App\Model\Horas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use App\Model\Reserva;
use App\Model\Usuario;

class CalendarioController extends Controller
{
    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();
        $eventosCalendario= null;
        foreach ($reservas as $key => $reserva){
            $id = $reserva->id_reserva;
            $usuario = $reserva->usuario;
            $eventos = $reserva->eventos;
            $title = $usuario->apellido_paterno.' '.$usuario->apellido_materno.' '.$usuario->nombre;
            $type = $eventos->first()->tipo;
            if($usuario->esAutorizado()){
                $descripcion = $reserva->eventos->first()->descripcion;
                $eventInfo = '<strong>Descripción: </strong>'.$descripcion;
            }
            if($usuario->esDocente()){
                $eventInfo = "";
                foreach ($eventos as $evento) {
                    $grupo = $evento->grupo->grupo;
                    $materia = $evento->grupo->materia->nombre;
                    $materiaGrupos[] = 'Materia: '.$materia.' '.' Grupo: '.$grupo;
                    if ($eventInfo === "") {
                        $eventInfo = '<strong>Materia: </strong>'.$materia.' '.'<strong>Grupo: </strong>'.$grupo;
                    }
                    $eventInfo = $eventInfo.'<br>'.'<strong>Materia: </strong>'.$materia.' '.'<strong>Grupo: </strong>'.$grupo;
                }
            }
            $start = $reserva->horarios->first()->pivot->id_fecha.' '.$reserva->horarios->first()->hora_inicio;
            $end = $reserva->horarios->first()->pivot->id_fecha.' '.$reserva->horarios->last()->hora_fin;
            $color = $this->colorRandom();

            $eventosCalendario[$key]["id"] = $id;
            $eventosCalendario[$key]['title'] = $title;
            $eventosCalendario[$key]['type'] = $type;
            $eventosCalendario[$key]['eventInfo'] = $eventInfo;
            $eventosCalendario[$key]['start'] = $start;
            $eventosCalendario[$key]['end'] = $end;
            $eventosCalendario[$key]['color'] = $color;
        }
        // Arreglo para probar como se llenaran los feriados
        $feriadosArray = array(array('nombre' => 'feriado 1', 'fecha' => '2017-06-05'),array('nombre' => 'feriado 2', 'fecha' => '2017-06-10'));
        $feriados = null;
        foreach ($feriadosArray as $key => $feriado) {
            $feriados[$key]['title'] = $feriadosArray[$key]['nombre'];
            $feriados[$key]['start'] = $feriadosArray[$key]['fecha'];
            $feriados[$key]['end'] = $feriadosArray[$key]['fecha'];
            $feriados[$key]['rendering'] = 'background';
            $feriados[$key]['color'] = '#ff9f89';
        }
        $eventosCalendarioFeriados = array_merge($eventosCalendario, $feriados);  
        $datos = Collection::make($eventosCalendarioFeriados);
        return view('calendario.index', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function feriado()
    {
        return view('calendario.feriado');
    }

    public function updateFeriado(Request $request)
    {

    }

    public function config()
    {
        return view('calendario.config');
    }
    public function updateConfig(Request $request)
    {
        $calendario = Calendario::updateOrcreate(
            ['gestion' => $request->gestion],
            ['fecha_inicio' => $request->fecha_inicial,
            'fecha_fin' => $request->fecha_final,
        ]);

        $fechaInicio = Carbon::createFromFormat('Y-m-d', $request->fecha_inicial, 'Etc/GMT-4');
        $fechaFin = Carbon::createFromFormat('Y-m-d', $request->fecha_final, 'Etc/GMT-4');
        $fechaActual = $fechaInicio;

        Fecha::where('id_calendario', $calendario->id_calendario)->delete();

        while($fechaActual <= $fechaFin ){
            if(!$fechaActual->isSunday())
                $calendario->fechas()->Create([
                    'id_fecha' => $fechaActual->toDateString(),
                    'tipo' => "Normal",
                ]);
            $fechaActual->addDay(1);
        }

        $periodo1 = $calendario->periodos()->updateOrcreate([
            'nombre' => "Primer Ciclo"],[
            'fecha_inicio' => $request->primer_parcial_ini,
            'fecha_fin' => $request->primer_parcial_fin,
        ]);

        $periodo2 = $calendario->periodos()->updateOrcreate([
            'nombre' => "Segundo Ciclo"],[
            'fecha_inicio' => $request->segundo_parcial_ini,
            'fecha_fin' => $request->segundo_parcial_fin,
        ]);

        foreach($calendario->fechas as $fecha)
        {
            foreach(Horas::all() as $hora) {
                $fecha->horas()->attach($hora->id_horas, ['id_ambiente' => 1, 'estado' => "Libre"]);
            }
        }

        return redirect()->route('calendario.index', compact('calendario', 'periodo1', 'periodo2'))->with('mensaje', 'Se ha configurado correctamente el calendario academico');
    }

    public function colorRandom()
    {
        $materialColors = array("#F44336", "#E91E63", "#9C27B0", "#673AB7", "#3F51B5", "#2196F3", "#03A9F4", "#00BCD4", "#009688", "#4CAF50", "#558B2F", "#9E9D24", "#FF9800", "#FF5722", "#795548", "#616161", "#607D8B");
        $indice = array_rand($materialColors, 1);
        return $materialColors[$indice];
    }
}
