<?php

namespace App\Http\Controllers;

use App\Dispositivo;
use App\TarjetaHabienteEmpresa;
use Illuminate\Http\Request;
use App\TarjetaFisica;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Http\Client\Common\HttpMethodsClient as HttpClient;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use OneSignal\Config;
use OneSignal\Devices;
use OneSignal\OneSignal;

class TarjetaFisicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($estado)
    {
        switch ($estado){
            case "eliminadas":
                $estado = "I";
                break;
            case "pendientes":
                $estado = "P";
            break;
            case "rechazadas":
                $estado = "R";
            break;
            case "aprobadas":
                $estado = "A";
            break;
        }
        $tarjetas = TarjetaFisica::where('estado',$estado)->get();
        return view('solicitudes_tarjetas',compact('tarjetas'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('edit_soli_tarj',compact('id'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save_obs(Request $request, $id)
    {   $tf = TarjetaFisica::find($id);
        $tf->motivo_rechazo = $request->txt_observacion;
        $tf->estado = "R";
        $tf->save();

        $tarj_hab_id = TarjetaHabienteEmpresa::where('id',$tf->tarj_hab_empr_id)->first();
        $devices = Dispositivo::where('tarj_hab_id',$tarj_hab_id->tarj_hab_id)->where('estado','A')->select('device')->get()->toArray();
        $list_devices = array();
        foreach ($devices as $device)
            $list_devices[] = $device["device"];

        if (count($list_devices)>0){
            /*Envío de notificación*/
            $config = new Config();
            $config->setApplicationId('845b69af-a12c-4d77-b6d3-ffef0c36fa91');
            $config->setApplicationAuthKey('YTE4NDI4YjMtMWY1NS00OWIzLWFkNDMtNTgyNmE5OGI3YTY5');
            $config->setUserAuthKey('NTNlYTY2MTktYzkzNi00NWJiLWJjOWQtZTNiNTZkMzMzZjhl');
            $guzzle = new GuzzleClient([]);
            $client = new HttpClient(new GuzzleAdapter($guzzle), new GuzzleMessageFactory());
            $api = new OneSignal($config, $client);
            $api->notifications->add([
                'headings' => [
                    'es'=> 'Redlinks',
                    'en'=> 'Redlinks'
                ],
                'contents' => [
                    'es' => 'Su solicitud de credencial fue rechazada',
                    'en' => 'Su solicitud de credencial fue rechazada'
                ],
                'subtitle' => [
                    'es' => 'Aviso',
                    'en' => 'Aviso'
                ],
                'include_player_ids' => $list_devices
            ]);
            /*Fin de envío de notificación*/
        }

        return redirect('/tarjetas/pendientes');
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

    public function cambiarEstado($id, $estado){
        $tarjeta = TarjetaFisica::find($id);
        switch ($estado){
            case "A":
                $tarjeta->estado = "A";
            break;
            case "R":
                $tarjeta->estado = "R";
            break;
        }
        $tarjeta->save();
        return back();
    }
}