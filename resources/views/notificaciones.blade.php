@extends('template')
@section('page_title', 'Notificaciones')
@section('content')
	<h1 class="text-center">Envío de notificaciones</h1>
	<form action="/nueva_notificacion" method="post">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label>Título de la notificación</label>
					<input id="txt_titulo" name="txt_titulo" type="text" class="form-control" maxlength="25" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label>Notificación</label>
					<textarea id="txt_notificacion" name="txt_notificacion" class="form-control" maxlength="100" required></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-send"></span> Enviar</button>
					<a href="/" class="btn btn-danger"><span class="glyphicon glyphicon-home"></span> Regresar a menú principal</a>
				</div>
			</div>
		</div>
	</form>
	<h3 class="text-center">Historial de notificaciones</h3>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="display">
				<thead>
					<tr>
						<th width="10%">ID</th>
						<th width="20%">Título</th>
						<th width="45%">Texto</th>
						<th width="25%">Fecha de envío</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($notificaciones as $notificacion)
					<tr>
						<td>{{ $notificacion->id }}</td>
						<td>{{ $notificacion->titulo }}</td>
						<td>{{ $notificacion->descripcion }}</td>
						<td>{{ $notificacion->updated_at }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<style>
		div.dataTables_length { display: none !important; }
		body{
			background-image: url('{{ asset('wallpaper.png') }}');
			background-size: 700px 700px;
		}
	</style>
	<script>
		$('#txt_titulo').focus();
		$('.display').DataTable({
			"searching": false
		});
	</script>
@endsection