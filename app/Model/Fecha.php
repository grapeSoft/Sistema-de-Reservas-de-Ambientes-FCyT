<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $table = 'fecha';
    protected $primaryKey = 'id_fecha';
    public $timestamps = false;
    public $incrementing = false;

    public $fillable = [
        'id_fecha', 'id_calendario', 'tipo', 'descripcion'
    ];

    public function peteneceCalendario()
    {
    	return $this->belongsTo('app/Model/Calendario');
    }

    public function horas()
    {
        return $this->belongsToMany('App\Model\Horas', 'horario', 'id_fecha', 'id_horas');
    }

    public function reservas(){
        return $this->belongsToMany('App\Model\Reserva', 'horario', 'id_fecha', 'id_reserva');
    }
}
