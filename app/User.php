<?php

namespace apiIdecap;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /** 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'dni','nombresyapellidos','username','estado','email','password','telefono','permiso','sincronizado','ruta_foto_perfil'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function matriculas()
    {
        return $this->hasMany('apiIdecap\Matricula');
    }
}
