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
        /*foreach ($reservas as $reserva){
            $eventos[] = $reserva->eventos;
        }*/
        $calendarioReserva= null;
        foreach ($reservas as $key => $reserva){
            $id = $reserva->id_reserva;
            $title = $reserva->usuario->nombre.' '.$reserva->usuario->apellido_paterno.' '.$reserva->usuario->apellido_materno;
            $start = $reserva->horarios->first()->pivot->id_fecha.' '.$reserva->horarios->first()->hora_inicio;
            $end = $reserva->horarios->first()->pivot->id_fecha.' '.$reserva->horarios->last()->hora_fin;
            $color = "#009688";
            
            $calendarioReserva[$key]["id"] = $id;
            $calendarioReserva[$key]['title'] = $title;
            $calendarioReserva[$key]['start'] = $start;
            $calendarioReserva[$key]['end'] = $end;
            $calendarioReserva[$key]['color'] = $color;
        }
        /*$json = json_encode($calendarioReserva);
        return Response()->json($calendarioReserva);*/
        /*return $calendarioReserva;*/
        /*return $calendarioReserva->toJson();*/
        $datos = Collection::make($calendarioReserva);
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
}
