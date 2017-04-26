<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Disponibilidad extends Model
{
    protected $table = 'disponibilidad';

    public $fillable = [
        'id_ambiente', 'id_horario', 'id_fecha', 'estado'
    ];

    public function peteneceAmbiente()
    {
    	return $this->belongsTo('app/Model/Ambiente');
    }

    public function peteneceHorario()
    {
    	return $this->belongsTo('app/Model/Horario');
    }

    public function peteneceFecha()
    {
    	return $this->belongsTo('app/Model/Fecha');
    }
}
