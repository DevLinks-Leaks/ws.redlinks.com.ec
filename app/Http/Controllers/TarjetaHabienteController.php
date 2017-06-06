<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Visita;
use App\Dispositivo;
use App\TarjetaHabiente;

class TarjetaHabienteController extends Controller
{
    public function get_tarjetahabiente($id)
	{
        TarjetaHabiente::find($id);
        $afiliado = TarjetaHabiente::with(['tarjetahabienteempresa'=>function($q1){
            $q1->with(['empresa'=>function($q2){
                $q2->with(['labelempresas'=>function($q4){
                    $q4->select('campo','nombre','editable','empresa_id');
                }]);
                $q2->select('id','razon_social','nombre_comercial','inicio_carnet','fin_carnet','ruta_img_small');
            }]);
            $q1->with(['tarjetafisicas'=>function($q3){
                $q3->select('id','tarj_hab_empr_id','tarj_codigo','motivo_rechazo','valida_desde','valida_hasta','estado','created_at')->where('estado','<>','I');
            }])->select('id','campo_1','campo_2','campo_3','campo_4','campo_5','campo_6','campo_7','campo_8','campo_9','campo_10','tarj_hab_id','empr_id');
        }])->select('id','tipo_id','num_id','nombre_1','nombre_2','apellido_1','apellido_2')->where('id',$id)->first();
		return response()->json($afiliado);
	}

	public function login(Request $request){
        $login = TarjetaHabiente::where('user',$request->user)->where('pass',$request->pass)->first();
        if ($login){
            $device = new Dispositivo;
            $device->tarj_hab_id = $login->id;
            $device->device = $request->device;
            $device->save();
            return response()->json(array("result"=>"success", "tarj_hab_id"=>$login->id));
        }
        else{
            return response()->json(array("result"=>"error"));
        }
    }

    public function logout(Request $request){
        Dispositivo::where('tarj_hab_id',$request->tarj_hab_id)->where('device',$request->device)->update(['estado'=>'I']);
        return response()->json(array("result"=>"success"));
    }

	public function checkin(Request $request)
    {	$visita = new Visita();
		$visita->tarj_hab_id = $request->tarj_hab_id;
		$visita->qr = $request->qr;
		$visita->longitud_map = $request->long;
		$visita->latitud_map = $request->lat;
		if(!$visita->save()){
			return json_encode(array("state" => "error"));
		}
		else{
			return json_encode(array("state" => "success"));
		}
    }
	public function get_visitas($tarj_hab_id)
    {	$visitas = DB::table('visitas')->join('sucursales','sucursales.qr','visitas.qr')->join('empresas', 'sucursales.empresa_id','=','empresas.id')
												->where('visitas.tarj_hab_id',$tarj_hab_id)
												->orderBy('visitas.fecha_visita','desc')
												->select('visitas.fecha_visita','empresas.nombre_comercial','empresas.ruta_img_large','empresas.id')
												->get();
		return response()->json($visitas);
    }
}
