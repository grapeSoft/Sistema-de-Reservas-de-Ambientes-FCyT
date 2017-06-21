<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateConfigCalendario;
use App\Model\Calendario;
use App\Model\Fecha;
use App\Model\Horas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use App\Model\Reserva;
use App\Model\Usuario;
use App\Model\PeriodoExamen;
class CalendarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('autentificado', [
            'except' => ['login', 'logear', 'recuperarContrasea', 'enviarContrasea', ]
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = Reserva::all();
        $eventosCalendario = array();
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
        // Feriados
        $feriados = Fecha::where('tipo','feriado')->get();
        $feriadosArray = array();       
        foreach ($feriados as $key => $feriado) {
            $feriadosArray[$key]['title'] = $feriado->descripcion;
            $feriadosArray[$key]['start'] = $feriado->id_fecha;
            $feriadosArray[$key]['end'] = $feriado->id_fecha;
            $feriadosArray[$key]['rendering'] = 'background';
            $feriadosArray[$key]['color'] = '#FFCDD2';
            $feriadosArray[$key]['textColor'] = '#D50000';
        }
        // Gestion Academica (solo funciona para una gestion a la vez)
        $gestiones = Calendario::all();
        $gestionesIniArray = array();
        foreach ($gestiones as $key => $gestion) {
                $gestionesIniArray[$key]['title'] = 'Inicio de Gestión '.$gestion->gestion;
                $gestionesIniArray[$key]['start'] = $gestion->fecha_inicio;
                $gestionesIniArray[$key]['end'] = $gestion->fecha_inicio;
                $gestionesIniArray[$key]['rendering'] = 'background';
                $gestionesIniArray[$key]['color'] = '#C5CAE9';
                $gestionesIniArray[$key]['textColor'] = '#1A237E';
        }
        $gestionesFinArray = array();
        foreach ($gestiones as $key => $gestion) {
                $gestionesFinArray[$key]['title'] = 'Final de Gestión '.$gestion->gestion;
                $gestionesFinArray[$key]['start'] = $gestion->fecha_fin;
                $gestionesFinArray[$key]['end'] = $gestion->fecha_fin;
                $gestionesFinArray[$key]['rendering'] = 'background';
                $gestionesFinArray[$key]['color'] = '#C5CAE9';
                $gestionesFinArray[$key]['textColor'] = '#1A237E';
        }        
        // Periodos de Examen
        $examenes = PeriodoExamen::all();
        $examenesBackgroundrray = array();       
        foreach ($examenes as $key => $examen) {
            $examenesBackgroundrray[$key]['title'] = "";
            $examenesBackgroundrray[$key]['start'] = $examen->fecha_inicio;
            $examenesBackgroundrray[$key]['end'] = $examen->fecha_fin;
            $examenesBackgroundrray[$key]['rendering'] = 'background';
            $examenesBackgroundrray[$key]['color'] = '#C8E6C9';
        }
        $examenesIniArray = array();       
        foreach ($examenes as $key => $examen) {
            $examenesIniArray[$key]['title'] = 'Inicio '.$examen->nombre;
            $examenesIniArray[$key]['start'] = $examen->fecha_inicio;
            $examenesIniArray[$key]['end'] = $examen->fecha_inicio;
            $examenesIniArray[$key]['rendering'] = 'background';
            $examenesIniArray[$key]['color'] = '#C8E6C9';
            $examenesIniArray[$key]['textColor'] = '#1B5E20';
        }
        $examenesFinArray = array();       
        foreach ($examenes as $key => $examen) {
            $examenesFinArray[$key]['title'] = 'Fin '.$examen->nombre;
            $examenesFinArray[$key]['start'] = $examen->fecha_fin;
            $examenesFinArray[$key]['end'] = $examen->fecha_fin;
            $examenesFinArray[$key]['rendering'] = 'background';
            $examenesFinArray[$key]['color'] = '#C8E6C9';
            $examenesFinArray[$key]['textColor'] = '#1B5E20';
        }

        $eventosCalendarioFeriados = array_merge($eventosCalendario, $feriadosArray, $gestionesIniArray, $gestionesFinArray, $examenesBackgroundrray, $examenesIniArray, $examenesFinArray);  
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
    
    public function config()
    {
        return view('calendario.config');
    }
    public function updateConfig(UpdateConfigCalendario $request)
    {
        $calendario = Calendario::updateOrcreate(
            ['gestion' => $request->gestion],
            ['fecha_inicio' => $request->fecha_inicial,
            'fecha_fin' => $request->fecha_final,
        ]);

        $fechaInicio = Carbon::createFromFormat('Y-m-d', $request->fecha_inicial, 'Etc/GMT-4');
        $fechaFin = Carbon::createFromFormat('Y-m-d', $request->fecha_final, 'Etc/GMT-4');
        $fechaActual = $fechaInicio;


        foreach($calendario->fechas as $fecha){
            $fecha->horas()->detach();
        }

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

        foreach(Fecha::where('id_calendario', $calendario->id_calendario)->get() as $fecha)
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
