<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{
    protected $table = 'calendario';
    protected $primaryKey = 'id_calendario';
    public $timestamps = false;


    public $fillable = [
        'gestion', 'fecha_inicio', 'fecha_fin'
    ];

    public function fechas()
    {
    	return $this->hasMany('App\Model\Fecha', 'id_calendario');
    }

    public function periodos()
    {
        return $this->hasMany('App\Model\PeriodoExamen', 'id_calendario');
    }

    public function primerCiclo(){
        return $this->periodos()->where('nombre','Primer Ciclo')->first();
    }

    public function segundoCiclo(){
        return $this->periodos()->where('nombre','Segundo Ciclo')->first();
    }
}
