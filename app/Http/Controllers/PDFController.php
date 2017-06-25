<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HorariosReserva;
use App\Model\Fecha;
use App\Model\Horario;
use App\Model\TipoReserva;
use App\Model\Reserva;
use App\Model\Evento;
use Illuminate\Support\Facades\DB;
use App\Model\Usuario;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;

class PDFController extends Controller
{
    public function crearpdf($id)
    {
    	$reservas = Reserva::findOrFail($id);
        $usuario = $reservas->usuario;
        $eventos =  $reservas->eventos;
        $horarios =  $reservas->horarios;       
        $date=date('Y-m-d');

        $view=\View::make('reservas.pdf.pdfadministrador', compact('usuario','eventos','horarios', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('reserva');
    }

    public function descargarpdf($id)
    {
        $reservas = Reserva::findOrFail($id);
        $usuario = $reservas->usuario;
        $eventos =  $reservas->eventos;
        $horarios =  $reservas->horarios;       
        $date=date('Y-m-d');

        $view=\View::make('reservas.pdf.pdfadministrador', compact('usuario','eventos','horarios', 'date'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('reserva.pdf');
    }
}
