<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User;

class Usuario extends User
{
    protected $table = 'USUARIO';
    protected $primaryKey = 'id_usuario';

    public $fillable = [
        'nombre', 'apellido_paterno', 'apellido_materno',
        'email', 'username', 'password',
        'tipo','foto'
    ];

    public function setPasswordAttribute($value)
    {
        if($value !== null)
            $this->attributes['password'] = bcrypt($value);
    }

    public function getNombreCompletoAttribute()
    {
        return $this->attributes['nombre'] . ' ' .
        $this->attributes['apellido_paterno'] . ' ' .
        $this->attributes['apellido_materno'];
    }

    public function esAdministrador()
    {
        return $this->attributes['tipo'] === 'administrador';
    }

    public function esAutorizado()
    {
        return $this->attributes['tipo'] === 'autorizado';
    }
    public function id(){
        return $this->attributes['id_usuario'];
    }

    public function reserva()
    {
        return $this->hasMany('app/Model/Reserva');
    }

    public function materias()
    {
        return $this->belongsToMany('App\Model\Materia', 'USUARIO_MATERIA', 'id_usuario', 'id_materia')
            ->withPivot('grupo', 'id_usuario_materia');
    }
}