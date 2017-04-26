<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $table = 'fecha';
    protected $primaryKey = 'id_fecha';

    public $fillable = [
        'id_calendario', 'tipo'
    ];

    public function peteneceCalendario()
    {
    	return $this->belongsTo('app/Model/Calendario');
    }

    public function fechaHorario()
    {
    	return $this->hasMany('app/Model/Fecha_Horario');
    }
}
