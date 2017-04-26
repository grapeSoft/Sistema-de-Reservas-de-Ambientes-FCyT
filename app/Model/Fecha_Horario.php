<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fecha_Horario extends Model
{
    protected $table = 'fecha_horario';

    public $fillable = [
        'id_fecha', 'id_horario'
    ];

    public function peteneceHorario()
    {
    	return $this->belongsTo('app/Model/Horario');
    }

    public function peteneceFecha()
    {
    	return $this->belongsTo('app/Model/Fecha');
    }
}
