@extends('template')
@section('page_title', 'Edición de local')
@section('content')
	<h3 class="text-center">Edición de noticia</h3>
	<form action="/editar_noticia" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Título de la noticia</label>
					<input id="txt_titulo" name="txt_titulo" type="text" class="form-control" maxlength="120" value="{{ $noticia->titulo }}" required/>
					<input id="txt_id" name="txt_id" type="hidden" value="{{ $noticia->id }}"/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Resumen</label>
					<input id="txt_resumen" name="txt_resumen" type="text" class="form-control" maxlength="120" value="{{ $noticia->resumen }}" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Fecha de inicio</label>
					<div class="input-group">
					  <input id="txt_fech_inicio" name="txt_fech_inicio" class="datetime form-control" type="text" class="form-control" value="{{ $noticia->fecha_inicio }}" required/>
					  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Fecha de fin</label>
					<div class="input-group">
					  <input id="txt_fech_fin" name="txt_fech_fin" class="datetime form-control" type="text" class="form-control" value="{{ $noticia->fecha_fin }}" required/>
					  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label>Noticia</label>
					<textarea id="txt_noticia" name="txt_noticia" class="form-control" maxlength="500" required>{{ $noticia->noticia }}</textarea>
				</div>
			</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">
			<a href="#" class="thumbnail" title="Imagen actual">
			  <img src="{{ $noticia->img_small }}{{ $noticia->id }}.png">
			</a>
		  </div>
		  <div class="col-md-4">
			<a href="#" class="thumbnail" title="Imagen actual">
			  <img src="{{ $noticia->img_large }}{{ $noticia->id }}.png">
			</a>
		  </div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Imagen pequeña</label>
					<input id="file_img_small" name="file_img_small" type="file" />
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
					<input id="file_img_large" name="file_img_large" type="file" />
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
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Guardar</button>
					<a href="/noticias" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Atrás</a>
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
	<style>
	img{
		width: 40%;
		height: auto;
	}
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
	<br/><br/>
@endsection