<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table = 'ambiente';
    protected $primaryKey = 'id_ambiente';

    public $fillable = [
        'nombre_ambiente', 'ubicacion_ambiente'
    ];

    public function horarios()
    {
    	return $this->hasMany('app/Horario');
    }

    public function eventos()
    {
    	return $this->hasMany('app/Evento');
    }
}
