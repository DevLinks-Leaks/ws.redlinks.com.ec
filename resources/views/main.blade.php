@extends('template')
@section('page_title', 'Administrador')
@section('content')
	<h1 class="text-center">Administración de App móvil Redlinks</h1>
	<h3 class="text-center">¿Qué desea hacer?</h3>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="list-group">
				<a class="list-group-item" href="/noticias"><span class="badge"><span class="glyphicon glyphicon-bullhorn"></span></span> Publicar una noticia</a>
				<a class="list-group-item" href="/notificaciones"><span class="badge"><span class="glyphicon glyphicon-bell"></span></span> Enviar una notificación</a>
				<a class="list-group-item" href="/locales/LA"><span class="badge"><span class="glyphicon glyphicon-tags"></span></span> Administrar establecimientos afiliados</a>
				<a class="list-group-item" href="/locales/CL"><span class="badge"><span class="glyphicon glyphicon-tags"></span></span> Administrar clientes</a>
				<!--<a class="list-group-item" href="/tarjetas/aprobadas"><span class="badge"><span class="glyphicon glyphicon-credit-card"></span></span> Solicitudes <span class="label label-success">aprobadas</span></a>-->
				<a class="list-group-item" href="/tarjetas/pendientes"><span class="badge"><span class="glyphicon glyphicon-credit-card"></span></span> Solicitudes pendientes @if ($cont_pend>0)<span class="label label-danger">{{ $cont_pend }}</span>@endif</a>
				<!--<a class="list-group-item" href="/tarjetas/rechazadas"><span class="badge"><span class="glyphicon glyphicon-credit-card"></span></span> Solicitudes <span class="label label-danger">rechazadas</span></a>
				<a class="list-group-item" href="/tarjetas/eliminadas"><span class="badge"><span class="glyphicon glyphicon-credit-card"></span></span> Solicitudes <span class="label label-default">eliminadas</span></a>-->
			</div>
		</div>
	</div>
	<style>
	body{
		background-image: url('{{ asset('wallpaper.png') }}');
		background-size: 700px 700px;
	}
	</style>
@endsection