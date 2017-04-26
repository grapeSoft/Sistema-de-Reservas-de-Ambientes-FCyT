<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $table = 'grupo';
    protected $primaryKey = 'id_grupo';

    public $fillable = [
        'id_materia', 'numero'
    ];

    public function peteneceMateria()
    {
    	return $this->belongsTo('app/Model/Materia');
    }
}
