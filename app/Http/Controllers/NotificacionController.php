<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Notificaciones;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Http\Client\Common\HttpMethodsClient as HttpClient;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use OneSignal\Config;
use OneSignal\Devices;
use OneSignal\OneSignal;

class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$notificaciones = Notificaciones::all();
        return view('notificaciones',compact('notificaciones'));
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
    {	$notificacion = new Notificaciones();
		$notificacion->titulo = $request->txt_titulo;
		$notificacion->descripcion = $request->txt_notificacion;
		$notificacion->save();
		/*if ($notificacion->save()){
			//Arreglo
			$json_content = array("en"=>$request->txt_notificacion,"es"=>$request->txt_notificacion,"content_available"=>"1");
			$json_notificacion = array("app_id"=>"845b69af-a12c-4d77-b6d3-ffef0c36fa91", "included_segments"=>'["All"]', "contents"=>$json_content);
			$headers = ['Content-Type'=>'application/json; charset=utf-8', 'Authorization'=>'Basic YTE4NDI4YjMtMWY1NS00OWIzLWFkNDMtNTgyNmE5OGI3YTY5'];
			$client = new Client([
				'base_uri' => 'https://onesignal.com/api/v1/'
			]);
			$response = $client->request('POST', 'notifications', [
				'body' => json_encode($json_notificacion),
				'headers' => $headers
			]);
			var_dump($response);
		}*/
		
		$config = new Config();
		$config->setApplicationId('845b69af-a12c-4d77-b6d3-ffef0c36fa91');
		$config->setApplicationAuthKey('YTE4NDI4YjMtMWY1NS00OWIzLWFkNDMtNTgyNmE5OGI3YTY5');
		$config->setUserAuthKey('NTNlYTY2MTktYzkzNi00NWJiLWJjOWQtZTNiNTZkMzMzZjhl');

		$guzzle = new GuzzleClient([
			// ..config
		]);

		$client = new HttpClient(new GuzzleAdapter($guzzle), new GuzzleMessageFactory());
		$api = new OneSignal($config, $client);
		//$notifications = $api->notifications->getAll();
		
		
		// Do not combine targeting parameters
		$api->notifications->add([
			'contents' => [
				'es' => $request->txt_notificacion,
				'en' => $request->txt_notificacion
			],
			'included_segments' => ['All'],
			'data' => ['foo' => 'bar'],
			//'isChrome' => true,
			//'send_after' => new \DateTime('1 minute'),
			/*'filters' => [
				[
					'field' => 'tag',
					'key' => 'is_vip',
					'relation' => '!=',
					'value' => 'true',
				],
				[
					'operator' => 'OR',
				],
				[
					'field' => 'tag',
					'key' => 'is_admin',
					'relation' => '=',
					'value' => 'true',
				],
			],*/
			// ..other options
		]);

		//$api->notifications->open('notification_id');
		//$api->notifications->cancel('notification_id');
		return redirect('/notificaciones');
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
	
	public function view()
    {
        $notificaciones = Notificaciones::orderBy('id','desc')->get();
		return json_encode($notificaciones);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
