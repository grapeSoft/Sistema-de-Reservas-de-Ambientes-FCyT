<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $table = 'fecha';
    protected $primaryKey = 'id_fecha';

    public $fillable = [
        'id_calendario'
    ];

    public function peteneceCalendario()
    {
    	return $this->belongsTo('app/Calendario');
    }

    public function horarios()
    {
    	return $this->hasMany('app/Horario');
    }
}
