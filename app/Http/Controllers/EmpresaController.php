<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empresa;
use App\Categoria;
use App\TarjetaHabienteEmpresa;
use Chumper\Zipper\Facades\Zipper;
use Illuminate\Support\Facades\File;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tipo)
    {
		$locales = Empresa::where('tipo',$tipo)->get();
		$categorias = Categoria::all();
        return view(($tipo == "LA" ? 'locales' : 'clientes'),compact('locales','categorias'));
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
        $local = Empresa::find($id);
		$categorias = Categoria::all();
        return view('local_editar',compact('local','categorias'));
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
	
	public function get_locales($categoria_id)
	{
		$locales = Empresa::with('beneficios')
							->with(['sucursales' => function ($query){
								$query->where('estado','A');
							}])
							->where('categoria_id',$categoria_id)
							->where('tipo','LA')
							->where('estado','A')
							->orderBy('orden','asc')
							->select('id','nombre_comercial', 'beneficio', 'direccion', 'telefono', 'correo', 'facebook', 'instagram', 'twitter', 'website','ruta_img_small','ruta_img_large')
							->get();
		return response()->json($locales);
	}
	
	public function agregar_local_afiliado (Request $request){
		$this->validate($request, [
			'file_img_small' => 'image',
			'file_img_large' => 'image',
		]);
		 $local_afiliado = new Empresa();
		 $local_afiliado->ruc = $request->txt_ruc;
		 $local_afiliado->razon_social = $request->txt_razon_soc;
		 $local_afiliado->beneficio = $request->txt_beneficio;
		 $local_afiliado->nombre_comercial = $request->txt_nombre_com;
		 $local_afiliado->categoria_id = $request->sel_categoria;
		 $local_afiliado->direccion = $request->txt_direccion;
		 $local_afiliado->telefono = $request->txt_telefono;
		 $local_afiliado->correo = $request->txt_correo;
		 $local_afiliado->twitter = $request->txt_twitter;
		 $local_afiliado->facebook = $request->txt_facebook;
		 $local_afiliado->instagram = $request->txt_instagram;
		 $local_afiliado->website = $request->txt_website;
		 $local_afiliado->ruta_img_small = 'http://'.config('app.subdomain').'.redlinks.com.ec/img/locales/small/';
		 $local_afiliado->ruta_img_large = 'http://'.config('app.subdomain').'.redlinks.com.ec/img/locales/large/';
		 $local_afiliado->tipo = 'LA';
		 $local_afiliado->save();
		 $id = $local_afiliado->id;
		 $request->file('file_img_small')->storeAs('locales/small/',$id.'.png');
		 $request->file('file_img_large')->storeAs('locales/large/',$id.'.png');
		 return redirect('/locales/LA');
	}
	public function editar_local_afiliado (Request $request){
		 $local_afiliado = Empresa::find($request->txt_id);
		 $local_afiliado->ruc = $request->txt_ruc;
		 $local_afiliado->razon_social = $request->txt_razon_soc;
		 $local_afiliado->beneficio = $request->txt_beneficio;
		 $local_afiliado->nombre_comercial = $request->txt_nombre_com;
		 $local_afiliado->categoria_id = $request->sel_categoria;
		 $local_afiliado->direccion = $request->txt_direccion;
		 $local_afiliado->telefono = $request->txt_telefono;
		 $local_afiliado->correo = $request->txt_correo;
		 $local_afiliado->twitter = $request->txt_twitter;
		 $local_afiliado->facebook = $request->txt_facebook;
		 $local_afiliado->instagram = $request->txt_instagram;
		 $local_afiliado->website = $request->txt_website;
		 $local_afiliado->save();
		 $id = $local_afiliado->id;
		 
		 if ($request->hasFile('file_img_small'))
			$request->file('file_img_small')->storeAs('locales/small/',$id.'.png');
		
		 if ($request->hasFile('file_img_large'))
			$request->file('file_img_large')->storeAs('locales/large/',$id.'.png');
	 
		 return redirect('/locales/LA');
	}
	public function cambiar_estado_local ($local_id, $estado){
		 $local_afiliado = Empresa::find($local_id);
		 $local_afiliado->estado = $estado;
		 $local_afiliado->save();
		 return redirect('/locales/LA');
	}
    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $empresa = Empresa::find($id);
        $the = TarjetaHabienteEmpresa::where('empr_id',$id)->get();
        $array_fotos = array ();
        foreach ($the as $the_row){
            $tf = $the_row->tarjetafisicas->where('estado','P');
            foreach ($tf as $tf_row){
                $array_fotos[] = 'img/credenciales/' . $id . '/' . $tf_row->id . '.jpeg';
            }
        }
        if (count($array_fotos)>0){
            File::delete($empresa->razon_social.'.zip');
            Zipper::make($empresa->razon_social.'.zip')->folder($id)->add($array_fotos)->close();
            return response()->download($empresa->razon_social.'.zip');
        }else{
            return "No hay fotos";
        }
    }
}
