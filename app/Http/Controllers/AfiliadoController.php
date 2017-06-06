<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Afiliado;

class AfiliadoController extends Controller
{
	public function store(Request $request)
	{ $existe = Afiliado::where('num_identificacion',$request->num_identificacion)->first();
		if ($existe){
		  $existe->tipo = $request->tipo;
		  $existe->num_identificacion = $request->num_identificacion;
		  $existe->correo = $request->correo;
		  $existe->telefono = $request->telefono;
		  $existe->nombres = $request->nombres;
		  $existe->apellidos = $request->apellidos;
		  $existe->razon_social = $request->razon_social;
		  $existe->direccion = $request->direccion;
		  $existe->contacto = $request->contacto;
		  if(!$existe->save()){
			return json_encode(array("state" => "error"));
		  }
		  else{
			return json_encode(array("state" => "success"));
		  }
		}
		else{
		  $afiliado = new Afiliado();
		  $afiliado->tipo = $request->tipo;
		  $afiliado->num_identificacion = $request->num_identificacion;
		  $afiliado->correo = $request->correo;
		  $afiliado->telefono = $request->telefono;
		  $afiliado->nombres = $request->nombres;
		  $afiliado->apellidos = $request->apellidos;
		  $afiliado->razon_social = $request->razon_social;
		  $afiliado->direccion = $request->direccion;
		  $afiliado->contacto = $request->contacto;

		  if(!$afiliado->save()){
			return json_encode(array("state" => "error"));
		  }
		  else{
			return json_encode(array("state" => "success"));
		  }
		}
	}
}
