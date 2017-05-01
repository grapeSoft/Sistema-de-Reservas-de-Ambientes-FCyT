<?php

namespace App\Http\Controllers;
use App\Http\Requests\HorariosReserva;
use App\Http\Requests\StoreReserva;
use App\Model\Fecha;
use App\Model\Horario;
use Illuminate\Http\Request;
use App\Model\Reserva;
use App\Model\Ambiente;
/*use DB;*/
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$reservas = Reserva::getReservas()//reservas del usuario;
        $reservas = null;
        /*$usuarioAdmin = auth()->user();
        $id_us = $usuarioAdmin->id_usuario;
        $reservas = DB::table('USUARIO')
            ->join('reserva', 'USUARIO.id_usuario', '=', 'reserva.id_usuario')
            ->join('evento' , 'reserva.id_reserva', '=', 'evento.id_reserva')
            ->join('ambiente', 'evento.id_ambiente', '=', 'ambiente.id_ambiente')
            ->join('disponibilidad', 'ambiente.id_ambiente', '=', 'disponibilidad.id_ambiente')
            ->join('horario', 'disponibilidad.id_horario', '=', 'horario.id_horario')
            ->join('fecha', 'disponibilidad.id_fecha', '=', 'fecha.id_fecha')
            ->select('fecha.id_fecha', 'horario.hora_inicio', 'horario.hora_fin', 'reserva.id_reserva')
            ->where('USUARIO.id_usuario', '=', $id_us)
            ->get();*/
        return view('Reservas.index', compact('reservas'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservas.create.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReserva $request)
    {
        $reserva = new Reserva();
        $reserva->id_usuario = auth()->user()->id_usuario;
        $reserva->save();

        $ambiente = Ambiente::findOrFail(1);
        $ambiente->setFecha($request->id_fecha);
        $ids_horas = $request->except('_token');

        foreach ($ids_horas as $id){
            $ambiente->horarios()->updateExistingPivot($id,['id_reserva' => $reserva->id_reserva , 'estado' => 'Ocupado' ]);
        }

        return redirect()
            ->route('eventos.oferta', $reserva->id_reserva)
            ->with('mensaje', 'Se han registrado los horarios para la reserva');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resultado = DB::table('reserva')->select('id_usuario','id_reserva')->first();
             
        return view('reservas.vista.view', compact('resultado'));
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

    public function horarios(HorariosReserva $request)
    {
        $ambiente = $request->ambiente;
        $fecha = $request->fecha;
        $ambiente = Ambiente::findOrFail($ambiente);
        $ambiente->setFecha($fecha);
        $horarios = $ambiente->horarios;
        return view('reservas.horarios', compact('horarios', 'ambiente', 'fecha'));
    }
}
