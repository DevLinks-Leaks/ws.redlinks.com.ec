<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';

    public function sucursal(){
        return $this->belongsTo('App\Empresa');
    }
}
