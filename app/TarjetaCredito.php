<?php

namespace apiIdecap;

use Illuminate\Database\Eloquent\Model;

class TarjetaCredito extends Model
{
    protected $fillable = [
        'id','tipo','banco','numero','mes','anio','sincronizado'
    ];
    public function matriculas()
    {
        return $this->hasMany('apiIdecap\Matricula');
    }
}
