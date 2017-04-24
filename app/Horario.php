<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $primaryKey = 'id_horario';

    public $fillable = [
        'id_fecha', 'id_ambiente', 'hora_inicio', 'hora_fin', 'estado'
    ];

    public function peteneceFecha()
    {
    	return $this->belongsTo('app/Fecha');
    }

    public function peteneceAmbiente()
    {
    	return $this->belongsTo('app/Ambiente');
    }
}
