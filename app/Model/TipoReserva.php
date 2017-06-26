<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TipoReserva extends Model
{
    protected $table = 'tipo_reserva';
    protected $primaryKey = 'id_tipo_reserva';
    public $timestamps = false;

    public $fillable = [
        'tipo', 'max_nro_periodos', 'min_nro_participantes', 'numero_reservas_materias',
    ];
}
