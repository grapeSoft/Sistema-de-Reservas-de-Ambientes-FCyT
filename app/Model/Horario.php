<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'horario';
    protected $primaryKey = 'id_horario';
    public $timestamps = false;

    public $fillable = [
        'hora_inicio', 'hora_fin'
    ];

    public function disponibilidad()
    {
    	return $this->hasMany('app/Model/Disponibilidad');
    }

    public function fechaHorario()
    {
    	return $this->hasMany('app/Model/Fecha_Horario');
    }
}
