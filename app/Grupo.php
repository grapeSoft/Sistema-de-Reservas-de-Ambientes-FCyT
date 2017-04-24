<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupo';
    protected $primaryKey = 'id_grupo';

    public $fillable = [
        'id_materia', 'nro_grupo'
    ];

    public function peteneceMateria()
    {
    	return $this->belongsTo('app/Materia');
    }
}
