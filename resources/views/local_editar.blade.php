@extends('template')
@section('page_title', 'Edición de local')
@section('content')
	<h3 class="text-center">Edición de establecimiento afiliado</h3>
	<form action="/editar_local" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Ruc</label>
					<input id="txt_ruc" name="txt_ruc" type="text" class="form-control" maxlength="15" value="{{ $local->ruc }}"/>
					<input id="txt_id" name="txt_id" type="hidden" value="{{ $local->id }}"/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Razón social</label>
					<input id="txt_razon_soc" name="txt_razon_soc" type="text" class="form-control" maxlength="100" value="{{ $local->razon_social }}" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Nombre comercial</label>
					<input id="txt_nombre_com" name="txt_nombre_com" type="text" class="form-control" maxlength="100" value="{{ $local->nombre_comercial }}" required/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Beneficio</label>
					<input id="txt_beneficio" name="txt_beneficio" type="text" class="form-control" maxlength="50" value="{{ $local->beneficio }}" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Categoría</label>
					<select id="sel_categoria" name="sel_categoria" class="form-control">
					@foreach ($categorias as $categoria)
						<option value="{{ $categoria->id}}" {{ ( $local->categoria_id==$categoria->id ? 'selected': '' ) }}>{{ $categoria->nombre}}</option>
					@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Dirección</label>
					<textarea id="txt_direccion" name="txt_direccion" class="form-control" maxlength="150" required>{{ $local->direccion }}</textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Teléfono</label>
					<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
					  <input id="txt_telefono" name="txt_telefono" class="form-control" type="text" class="form-control" value="{{ $local->telefono }}" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Correo</label>
					<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
					  <input id="txt_correo" name="txt_correo" class="form-control" type="text" class="form-control" value="{{ $local->correo }}" maxlength="50"/>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Twitter</label>
					<div class="input-group">
					  <span class="input-group-addon">@</span>
					  <input id="txt_twitter" name="txt_twitter" class="form-control" type="text" class="form-control" value="{{ $local->twitter }}" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Facebook</label>
					<div class="input-group">
					  <span class="input-group-addon">@</span>
					  <input id="txt_facebook" name="txt_facebook" class="form-control" type="text" class="form-control" value="{{ $local->facebook }}" maxlength="100"/>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Instagram</label>
					<div class="input-group">
					  <span class="input-group-addon">@</span>
					  <input id="txt_instagram" name="txt_instagram" class="form-control" type="text" class="form-control" value="{{ $local->instagram }}" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Sitio web</label>
					<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
					  <input id="txt_website" name="txt_website" class="form-control" type="text" class="form-control" value="{{ $local->website }}" maxlength="50"/>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		  <div class="col-md-4 col-md-offset-2">
			<a href="#" class="thumbnail" title="Imagen actual">
			  <img src="{{ $local->ruta_img_small }}{{ $local->id }}.png">
			</a>
		  </div>
		  <div class="col-md-4">
			<a href="#" class="thumbnail" title="Imagen actual">
			  <img src="{{ $local->ruta_img_large }}{{ $local->id }}.png">
			</a>
		  </div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Logotipo con fondo</label>
					<input id="file_img_small" name="file_img_small" type="file"/>
					<p>
						<div class="alert alert-warning" role="alert">
							Tamaño máximo 128x128, mínimo 64x64
						</div>
					</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Logotipo sin fondo</label>
					<input id="file_img_large" name="file_img_large" type="file"/>
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
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
					<a href="/locales/LA" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Atrás</a>
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
		$('#txt_ruc').focus();
	</script>
	<br/><br/>
@endsection