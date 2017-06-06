@extends('template')
@section('page_title', 'Edición de sucursal')
@section('content')
	<h3 class="text-center">Edición de sucursal</h3>
	<form action="/editar_sucursal" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Nombre</label>
					<input id="txt_nombre" name="txt_nombre" type="text" class="form-control" maxlength="100" value="{{ $sucursal->nombre }}" required/>
					<input id="txt_id" name="txt_id" type="hidden" value="{{ $id }}"/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Teléfono</label>
					<input id="txt_telefono" name="txt_telefono" type="text" class="form-control" maxlength="30" value="{{ $sucursal->telefono }}" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Dirección</label>
					<textarea id="txt_direccion" name="txt_direccion" type="text" class="form-control" maxlength="150" required>{{ $sucursal->direccion }}</textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
					<a href="/sucursales/{{ $sucursal->empresa_id }}/ver" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Atrás</a>
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
		body{
			background-image: url('{{ asset('wallpaper.png') }}');
			background-size: 700px 700px;
		}
	</style>
	<script>
		$('#txt_nombre').focus();
	</script>
	<br/><br/>
@endsection