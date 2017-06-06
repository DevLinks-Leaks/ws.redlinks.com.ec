<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TarjetaFisica;
use App\TarjetaHabienteEmpresa;
use File;

class TarjetaHabienteEmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $the = TarjetaHabienteEmpresa::find($request->id);
        $the->campo_1 = $request->campo_1;
        $the->campo_2 = $request->campo_2;
        $the->campo_3 = $request->campo_3;
        $the->campo_4 = $request->campo_4;
        $the->campo_5 = $request->campo_5;
        $the->campo_6 = $request->campo_6;
        $the->campo_7 = $request->campo_7;
        $the->campo_8 = $request->campo_8;
        $the->campo_9 = $request->campo_9;
        $the->campo_10 = $request->campo_10;
        $the->save();

        /*Eliminar los rechazados*/
        TarjetaFisica::where('tarj_hab_empr_id',$request->id)->where('estado','R')->update(['estado'=>'I']);

        $tf = new TarjetaFisica();
        $tf->tarj_hab_empr_id = $the->id;
        $tf->estado = 'P';
        $tf->save();

        $data = str_replace('data:image/jpeg;base64,', '', $request->foto);
        $data = str_replace(' ', '+', $data);
        $data = base64_decode($data);
        $path = public_path().'/img/credenciales/'.$the->empr_id.'/';

        if (!File::exists($path))
            File::makeDirectory($path, 0777, true);

        $path = $path.$tf->id.'.jpeg';
        $success = file_put_contents($path, $data);
        return response()->json(array("result"=>"success"));
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
        //
    }
}
