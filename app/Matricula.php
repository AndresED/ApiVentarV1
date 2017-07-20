<?php

namespace apiIdecap;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $fillable = [
        'id','fecha_matricula','user_id','alumno_id','tarjeta_id','programa_id','sincronizado'
    ];
}
