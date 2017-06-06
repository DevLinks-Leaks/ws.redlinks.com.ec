<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sucursal;
use App\Empresa;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {	$sucursales = Sucursal::where('empresa_id',$id)->get();
		$empresa = Empresa::find($id);
        return view('sucursales',compact('sucursales','id','empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sucursal = new Sucursal();
		$sucursal->nombre = $request->txt_nombre;
		$sucursal->direccion = $request->txt_direccion;
		$sucursal->telefono = $request->txt_telefono;
		$sucursal->empresa_id = $request->txt_empresa_id;
		$sucursal->longitud_map = 0;
		$sucursal->latitud_map = 0;
		$sucursal->save();
		return redirect('/sucursales/'.$request->txt_empresa_id.'/ver');
    }
	public function editar_sucursal(Request $request)
    {
        $sucursal = Sucursal::find($request->txt_id);
		$sucursal->nombre = $request->txt_nombre;
		$sucursal->direccion = $request->txt_direccion;
		$sucursal->telefono = $request->txt_telefono;
		$sucursal->longitud_map = 0;
		$sucursal->latitud_map = 0;
		$sucursal->save();
		return redirect('/sucursales/'.$sucursal->empresa_id.'/ver');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sucursal = Sucursal::find($id);
		return view('sucursal_editar',compact('sucursal','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
	public function cambiar_estado_sucursal ($sucursal_id, $estado){
		 $sucursal = Sucursal::find($sucursal_id);
		 $sucursal->estado = $estado;
		 $sucursal->save();
		 return redirect('/sucursales/'.$sucursal->empresa_id.'/ver');
	}
}
