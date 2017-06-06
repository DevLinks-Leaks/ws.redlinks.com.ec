<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
	public function empresa(){
		return $this->belongsTo('App\Beneficio');
	}
}
