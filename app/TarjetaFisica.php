<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarjetaFisica extends Model
{
    public function tarjetahabienteempresa(){
        return $this->belongsTo('App\TarjetaHabienteEmpresa','tarj_hab_empr_id');
    }
}
