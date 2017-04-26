<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ambiente extends Model
{
    protected $table = 'ambiente';
    protected $primaryKey = 'id_ambiente';

    public $fillable = [
        'nombre_ambiente', 'ubicacion_ambiente'
    ];

    public function disponibilidad()
    {
    	return $this->hasMany('app/Model/Disponibilidad');
    }

    public function eventos()
    {
    	return $this->hasMany('app/Model/Evento');
    }
}
