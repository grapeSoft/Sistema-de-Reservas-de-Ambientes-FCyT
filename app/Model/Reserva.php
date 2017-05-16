<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table = 'reserva';
    protected $primaryKey = 'id_reserva';
    public $timestamps = false;

    public $fillable = [
        'fecha', 'horaIni', 'horaFin',
        'materia', 'titulo', 'id_usuario',
    ];

    public function peteneceUsuario()
    {
    	return $this->belongsTo('App\Model\Usuario','id_reserva');
    }

    public function eventos()
    {
        return $this->hasMany('App\Model\Evento','id_reserva');
    }

    public function horarios()
    {
        return $this->belongsToMany('App\Model\Horas', 'HORARIO', 'id_reserva', 'id_horas')
            ->withPivot('estado', 'id_fecha');
    }
}
