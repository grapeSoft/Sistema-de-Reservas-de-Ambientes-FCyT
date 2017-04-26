<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table = 'AMBIENTE';
    protected $primaryKey = 'id_ambiente';
    public $timestamps = false;
    private $fecha;

    public $fillable = [
        'nombre_ambiente', 'ubicacion_ambiente'
    ];

    public function disponibilidad()
    {
        return $this->hasMany('app/Model/Disponibilidad');
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function horarios()
    {
            return $this->belongsToMany('App\Model\Horario', 'DISPONIBILIDAD', 'id_ambiente', 'id_horario')
            ->withPivot('estado')
            ->wherePivot('id_fecha', $this->fecha);

    public function eventos()
    {
    	return $this->hasMany('app/Model/Evento');
    }
}
