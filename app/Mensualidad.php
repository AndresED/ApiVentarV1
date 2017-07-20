<?php

namespace apiIdecap;

use Illuminate\Database\Eloquent\Model;

class Mensualidad extends Model
{
   protected $fillable = [
        'id','cantidad','descuento','tipo_descuento','sincronizado','programa_id'
    ];
    public function programas()
	{
		return $this->belongsTo('apiIdecap\Programa');	
	}
}
