<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'usuario_materia';
    protected $primaryKey = 'id_usuario_materia';

    public function materia(){
        return $this->belongsTo('App\Model\Materia', 'id_materia');
    }
}
