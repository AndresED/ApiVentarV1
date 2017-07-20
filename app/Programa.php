<?php

namespace apiIdecap;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $fillable = [
        'id','nombre','estado','sincronizado'
    ];
    public function matriculas()
{
    
        return $this->hasMany('apiIdecap\Matricula');
    
}
}
