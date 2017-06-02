<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection as Collection;
use App\Model\Reserva;

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
            $tipo = $reserva->eventos->first()->tipo;
            $title = $reserva->usuario->apellido_paterno.' '.$reserva->usuario->apellido_materno.' '.$reserva->usuario->nombre.' - '.$tipo;
            $start = $reserva->horarios->first()->pivot->id_fecha.' '.$reserva->horarios->first()->hora_inicio;
            $end = $reserva->horarios->first()->pivot->id_fecha.' '.$reserva->horarios->last()->hora_fin;
            $color = $this->colorRandom();
            
            $eventosCalendario[$key]["id"] = $id;
            $eventosCalendario[$key]['title'] = $title;
            $eventosCalendario[$key]['start'] = $start;
            $eventosCalendario[$key]['end'] = $end;
            $eventosCalendario[$key]['color'] = $color;
        }
        /*$json = json_encode($calendarioReserva);
        return Response()->json($calendarioReserva);*/
        /*return $calendarioReserva;*/
        /*return $calendarioReserva->toJson();*/
        $datos = Collection::make($eventosCalendario);
        /*return $datos->toJson();*/
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
    public function colorRandom()
    {
        $materialColors = array("#F44336", "#E91E63", "#9C27B0", "#673AB7", "#3F51B5", "#2196F3", "#03A9F4", "#00BCD4", "#009688", "#4CAF50", "#558B2F", "#9E9D24", "#FF9800", "#FF5722", "#795548", "#616161", "#607D8B");
        $indice = array_rand($materialColors, 1);
        return $materialColors[$indice];
    }
}
