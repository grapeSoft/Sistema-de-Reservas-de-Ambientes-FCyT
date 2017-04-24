<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    protected $table = 'HORARIO';
    protected $primaryKey = 'id_horario';
    public $timestamps = false;
}
