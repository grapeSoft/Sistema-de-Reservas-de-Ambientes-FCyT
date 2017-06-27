<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UpdateFeriado;
use App\Model\Fecha;
use App\Model\Reserva;

class FeriadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feriados = Fecha::where('tipo','feriado')->get();
        return view('calendario.feriado.index', compact('feriados'));
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
    public function store(UpdateFeriado $request)
    {
        
        $feriado = Fecha::findOrFail($request->input('fecha'));
        $reservas_en_feriado =  $feriado->reservas;
        if ($reservas_en_feriado->isEmpty()) {
            $feriado->descripcion = $request->titulo;
            $feriado->tipo = "feriado";
            $feriado->save();
        }
        else{
            return redirect()->route('feriado.index')->withErrors(['feriado' => 'No se puede crear un feriado en una fecha que contenga reservas']);
        }        
        return redirect()->route('feriado.index')->with('mensaje', 'Se ha creado correctamente el feriado en el calendario academico');
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
        $feriado = Fecha::findOrFail($id);
        $feriado->descripcion = null;
        $feriado->tipo = "Normal";
        $feriado->save();
        return redirect()->route('feriado.index')->with('mensaje', 'Se ha eliminado corectamente el feriado');
    }
}
