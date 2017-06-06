<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beneficio;
use App\Empresa;

class BeneficioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $beneficios = Beneficio::where('empresa_id',$id)->get();
		$empresa = Empresa::find($id);
		return view('beneficios',compact('beneficios','id','empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $beneficio = new Beneficio();
		$beneficio->descripcion = $request->txt_descripcion;
		$beneficio->empresa_id = $request->txt_empresa_id;
		$beneficio->save();
		return redirect('/beneficios/'.$request->txt_empresa_id.'/ver');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
		$beneficio = Beneficio::find($id);
        $beneficio->delete();
		return redirect('/beneficios/'.$beneficio->empresa_id.'/ver');
    }
}
