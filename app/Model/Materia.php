<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materia';
    protected $primaryKey = 'id_materia';
    public $timestamps = false;

//    public $fillable = [
//        'id_usuario', 'nombre_materia', 'horas_materia',
//        'nivel'
//    ];

    public function perteneceUsuario()
    {
    	return $this->belongsTo('app/Model/Usuario');
    }

    public function grupos(){
        return $this->hasMany('App\Model\Grupo', 'id_materia');
    }
}
