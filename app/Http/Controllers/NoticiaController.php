<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;
use App\Noticia;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        return view('noticias',compact('noticias'));
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
    {	$this->validate($request, [
			'txt_fech_inicio' =>'before:txt_fech_fin',
			'txt_fech_fin' =>'after:txt_fech_inicio',
			'file_img_small' => 'image',
			'file_img_large' => 'image',
		]);
		
		$noticia = new Noticia();
		$noticia->titulo = $request->txt_titulo;
		$noticia->resumen = $request->txt_resumen;
		$noticia->noticia = $request->txt_noticia;
		$noticia->fecha_inicio = $request->txt_fech_inicio;
		$noticia->fecha_fin = $request->txt_fech_fin;
		$noticia->img_small = 'http://'.config("app.subdomain").'.redlinks.com.ec/img/noticias/small/';
		$noticia->img_large = 'http://'.config("app.subdomain").'.redlinks.com.ec/img/noticias/large/';
		$noticia->save();
		$id = $noticia->id;
		$request->file('file_img_small')->storeAs('noticias/small/',$id.'.png');
		$request->file('file_img_large')->storeAs('noticias/large/',$id.'.png');
		return redirect('/noticias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = Noticia::find($id);
		return view('noticia_editar',compact('noticia'));
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
        Noticia::find($id)->delete();
		return redirect('/noticias');
    }
	
	public function get_noticias()
	{	$hoy = Carbon::now()->toDateString();
		$noticias = Noticia::where('fecha_inicio','<=',$hoy)
							 ->where('fecha_fin','>=',$hoy)
							 ->get();
		return response()->json($noticias);
	}
	public function editar_noticia (Request $request){
		$this->validate($request, [
			'txt_fech_inicio' =>'before:txt_fech_fin',
			'txt_fech_fin' =>'after:txt_fech_inicio',
			'file_img_small' => 'image',
			'file_img_large' => 'image',
		]);
		
		$noticia = Noticia::find($request->txt_id);
		$noticia->titulo = $request->txt_titulo;
		$noticia->resumen = $request->txt_resumen;
		$noticia->noticia = $request->txt_noticia;
		$noticia->fecha_inicio = $request->txt_fech_inicio;
		$noticia->fecha_fin = $request->txt_fech_fin;		
		$noticia->save();
		$id = $noticia->id;
		 
		 if ($request->hasFile('file_img_small'))
			$request->file('file_img_small')->storeAs('noticias/small/',$id.'.png');
		
		 if ($request->hasFile('file_img_large'))
			$request->file('file_img_large')->storeAs('noticias/large/',$id.'.png');
	 
		 return redirect('/noticias');
	}
}
