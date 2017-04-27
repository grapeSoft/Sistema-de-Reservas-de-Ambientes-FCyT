<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table = 'materia';
    protected $primaryKey = 'id_materia';

    public $fillable = [
        'id_usuario', 'nombre_materia', 'horas_materia',
        'nivel'
    ];

    public function grupo()
    {
    	return $this->hasMany('app/Model/Grupo');
    }

    public function perteneceUsuario()
    {
    	return $this->belongsTo('app/Model/Usuario');
    }
}