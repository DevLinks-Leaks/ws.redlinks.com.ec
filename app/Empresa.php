<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $appends = ['periodo_activo'];

	public function beneficios(){
		return $this->hasMany('App\Beneficio');
	}
	public function sucursales(){
		return $this->hasMany('App\Sucursal');
	}
	public function labelempresas(){
	    return $this->hasMany('App\LabelEmpresa');
    }
    public function getPeriodoActivoAttribute($value){
	    return (Carbon::now()->toDateString()>=$this->inicio_carnet && Carbon::now()->toDateString()<=$this->fin_carnet ? 1 : 0);
    }
    public function tarjetahabienteempresas(){
        return $this->hasMany('App\TarjetaHabienteEmpresa','empr_id');
    }
}
