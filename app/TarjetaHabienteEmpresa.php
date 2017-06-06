<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarjetaHabienteEmpresa extends Model
{
    public function empresa(){
        return $this->belongsTo('App\Empresa','empr_id');
    }
    public function tarjetahabiente(){
        return $this->belongsTo('App\TarjetaHabiente','tarj_hab_id');
    }
    public function tarjetafisicas(){
        return $this->hasMany('App\TarjetaFisica','tarj_hab_empr_id');
    }
}
