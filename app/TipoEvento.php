<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEvento extends Model
{
    protected $table = 'tipo_evento';
    protected $primaryKey = 'id_evento_tipo';

    public $fillable = [
        'id_evento'
    ];

    public function peteneceEvento()
    {
    	return $this->belongsTo('app/Evento');
    }
}
