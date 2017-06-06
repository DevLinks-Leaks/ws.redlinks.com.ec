@extends('template')
@section('page_title', 'Noticias')
@section('content')
	<h1 class="text-center">Publicación de noticias</h1>
	<form action="/nueva_noticia" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Título de la noticia</label>
					<input id="txt_titulo" name="txt_titulo" type="text" class="form-control" maxlength="120" required/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Resumen</label>
					<input id="txt_resumen" name="txt_resumen" type="text" class="form-control" maxlength="120" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Fecha de inicio</label>
					<div class="input-group">
					  <input id="txt_fech_inicio" name="txt_fech_inicio" class="datetime form-control" type="text" class="form-control" required/>
					  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Fecha de fin</label>
					<div class="input-group">
					  <input id="txt_fech_fin" name="txt_fech_fin" class="datetime form-control" type="text" class="form-control" required/>
					  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label>Noticia</label>
					<textarea id="txt_noticia" name="txt_noticia" class="form-control" maxlength="500" required></textarea>
				</div>
			</div>
		</div>
			
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Imagen pequeña</label>
					<input id="file_img_small" name="file_img_small" type="file" required/>
					<p>
						<div class="alert alert-warning" role="alert">
							Tamaño máximo 128x128, mínimo 64x64
						</div>
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Imagen grande</label>
					<input id="file_img_large" name="file_img_large" type="file" required/>
					<p>
						<div class="alert alert-warning" role="alert">
							Tamaño 320x160
						</div>
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Publicar</button>
					<a href="/" class="btn btn-danger"><span class="glyphicon glyphicon-home"></span> Regresar a menú principal</a>
				</div>
			</div>
		</div>
	</form>
	<p>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
	</p>
	<h3 class="text-center">Historial de noticias</h3>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="display">
				<thead>
					<tr>
						<th width="10%">ID</th>
						<th width="20%">Título</th>
						<th width="25%">Resumen</th>
						<th width="15%">Desde</th>
						<th width="15%">Hasta</th>
						<th width="15%"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($noticias as $noticia)
					<tr>
						<td>{{ $noticia->id }}</td>
						<td>{{ $noticia->titulo }}</td>
						<td>{{ $noticia->resumen }}</td>
						<td>{{ $noticia->fecha_inicio }}</td>
						<td>{{ $noticia->fecha_fin }}</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">	
								<a class="btn btn-default" href="/noticias/{{ $noticia->id }}/editar" title="Editar noticia"><span class="glyphicon glyphicon-pencil"></span></a>
								<a class="btn btn-danger confirmation" title="Eliminar noticia" href="/eliminar_noticia/{{ $noticia->id }}"><span class="glyphicon glyphicon-remove"></span></a>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table><br/><br/>
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
		$('.datetime').datepicker({
			format: 'yyyy-mm-dd',
		});
		$('.confirmation').on('click', function () {
			return confirm('¿Estás seguro?');
		});
	</script>
@endsection