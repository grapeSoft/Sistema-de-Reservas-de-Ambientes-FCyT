<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PeriodoExamen extends Model
{
    protected $table = 'periodo_examen';
    protected $primaryKey = 'periodo_examen_id';
    public $timestamps = false;

    public $fillable = [
        'nombre', 'fecha_inicio', 'fecha_fin',
    ];
}
