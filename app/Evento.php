<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    protected $primaryKey = 'id_evento';

    public $fillable = [
        'id_reserva', 'id_ambiente'
    ];

    public function peteneceUsuario()
    {
    	return $this->belongsTo('app/Ambiente');
    }

    public function peteneceReserva()
    {
    	return $this->belongsTo('app/Reserva');
    }

    public function tipoEvento()
    {
    	return $this->hasMany('app/TipoEvento');
    }
}
