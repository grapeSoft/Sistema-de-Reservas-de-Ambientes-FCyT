<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $table = 'calendario';
    protected $primaryKey = 'id_calendario';

    public $fillable = [
        'gestion_calendario', 'fecha_inicio', 'fecha_fin'
    ];

    public function fechas()
    {
    	return $this->hasMany('app/Model/Fecha');
    }
}
