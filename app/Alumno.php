<?php

namespace apiIdecap;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'dni','nombresyapellidos','email','departamento','provincia','direccion','fecha_nacimiento','grado','profesion','trabajo','sincronizado','telefono'
    ];

}


