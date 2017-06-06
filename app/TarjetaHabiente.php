<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TarjetaHabiente extends Model
{
    public function tarjetahabienteempresa(){
        return $this->hasmany('App\TarjetaHabienteEmpresa','tarj_hab_id');
    }
}