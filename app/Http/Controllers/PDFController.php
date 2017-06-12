<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HorariosReserva;
use App\Http\Requests\StoreReserva;
use App\Http\Requests\UpdateReserva;
use App\Model\Fecha;
use App\Model\Horario;
use App\Model\TipoReserva;
use App\Model\Reserva;
use App\Model\Ambiente;
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
    	$eventos= DB::table('evento')
            ->where('evento.id_reserva','=',$id)
            ->join('usuario_materia','evento.id_usuario_materia','=','usuario_materia.id_usuario_materia')          
            ->join('materia','usuario_materia.id_materia' ,'=','materia.id_materia')  
            ->select('evento.tipo','evento.descripcion','materia.nombre','usuario_materia.grupo','evento.id_reserva')
            ->get()->toArray(); 

        $datosUsuario= DB::table('evento')
            ->where('evento.id_reserva','=',$id)
            ->join('reserva','evento.id_reserva','=','reserva.id_reserva')
            ->join('USUARIO','reserva.id_usuario','=','USUARIO.id_usuario') 
            ->select('USUARIO.nombre','USUARIO.email','USUARIO.id_usuario','USUARIO.apellido_paterno','USUARIO.apellido_materno','USUARIO.tipo')
            ->first();

		$eventosAutorizado=  DB::table('evento')
            ->where('evento.id_reserva','=',$id)
            ->select('evento.tipo','evento.descripcion','evento.id_reserva')
            ->first(); 

        $date=date('Y-m-d');

        if(auth()->user()->esAutorizado()){
            $view=\View::make('reservas.pdf.pdfautorizado', compact('eventos','eventosAutorizado','datosUsuario', 'date'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->stream('reserva');
        }                
        if(auth()->user()->esDocente()){
            $view=\View::make('reservas.pdf.pdfdocente', compact('eventos','eventosAutorizado','datosUsuario', 'date'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->stream('reserva');
        }
    }

    public function descargarpdf($id)
    {
        $eventos= DB::table('evento')
            ->where('evento.id_reserva','=',$id)
            ->join('usuario_materia','evento.id_usuario_materia','=','usuario_materia.id_usuario_materia')          
            ->join('materia','usuario_materia.id_materia' ,'=','materia.id_materia')  
            ->select('evento.tipo','evento.descripcion','materia.nombre','usuario_materia.grupo','evento.id_reserva')
            ->get()->toArray(); 

        $datosUsuario= DB::table('evento')
            ->where('evento.id_reserva','=',$id)
            ->join('reserva','evento.id_reserva','=','reserva.id_reserva')
            ->join('USUARIO','reserva.id_usuario','=','USUARIO.id_usuario') 
            ->select('USUARIO.nombre','USUARIO.email','USUARIO.id_usuario','USUARIO.apellido_paterno','USUARIO.apellido_materno','USUARIO.tipo')
            ->first();

        $eventosAutorizado=  DB::table('evento')
            ->where('evento.id_reserva','=',$id)
            ->select('evento.tipo','evento.descripcion','evento.id_reserva')
            ->first(); 

        if(auth()->user()->esAutorizado()){
            $view=\View::make('reservas.pdf.pdfautorizado', compact('eventos','eventosAutorizado','datosUsuario'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->download('reserva.pdf');
        }                
        if(auth()->user()->esDocente()){
            $view=\View::make('reservas.pdf.pdfdocente', compact('eventos','eventosAutorizado','datosUsuario'))->render();
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view);
            return $pdf->download('reserva.pdf');
        }
    }
}
