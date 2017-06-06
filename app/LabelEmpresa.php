<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabelEmpresa extends Model
{
    public function empresa(){
        return $this->belongsTo('App\Empresa');
    }
}
