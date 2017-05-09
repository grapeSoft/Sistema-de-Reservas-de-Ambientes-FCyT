<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    protected $primaryKey = 'id_evento';
    public $timestamps = false;

    public $fillable = [
        'id_reserva', 'tipo', 'descripcion', 'id_usuario_materia'
    ];

    public function peteneceAmbiente()
    {
    	return $this->belongsTo('app/Model/Ambiente');
    }

    public function peteneceReserva()
    {
    	return $this->belongsTo('App\Model\Reserva','id_evento');
    }
}
