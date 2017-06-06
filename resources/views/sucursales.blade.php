@extends('template')
@section('page_title', 'Sucursales')
@section('content')
	<h3 class="text-center">Nueva sucursal</h3>
	<form action="/nueva_sucursal" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Nombre</label>
					<input id="txt_nombre" name="txt_nombre" type="text" class="form-control" maxlength="100" required/>
					<input id="txt_empresa_id" name="txt_empresa_id" type="hidden" value="{{ $id }}"/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Teléfono</label>
					<input id="txt_telefono" name="txt_telefono" type="text" class="form-control" maxlength="30" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Dirección</label>
					<textarea id="txt_direccion" name="txt_direccion" type="text" class="form-control" maxlength="150" required></textarea>
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
	<h3 class="text-center">Sucursales de {{ $empresa->nombre_comercial }}</h3>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="display">
				<thead>
					<tr>
						<th width="50%">Sucursal</th>
						<th width="20%">QR</th>
						<th width="30%"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($sucursales as $sucursal)
					<tr>
						<td>{{ $sucursal->nombre }}</td>
						<td><span class="glyphicon glyphicon-qrcode"></span> {{ $sucursal->qr }}</td>
						<td class="text-right">
							<div class="btn-group btn-group-sm" role="group">
								@if ($sucursal->estado=="A")
								<a class="btn btn-default" href="/sucursales/{{ $sucursal->id }}/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
								<a class="btn btn-default" href="/sucursales/{{ $sucursal->id }}/I/cambiarEstado" title="Inactivar"><span class="glyphicon glyphicon-remove"></span></a>
								@else
								<a class="btn btn-default" href="/sucursales/{{ $sucursal->id }}/A/cambiarEstado" title="Activar"><span class="glyphicon glyphicon-ok"></span></a>
								@endif
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<style>
		/*div.dataTables_length { display: none !important; }*/
		td>img{
			width:100%; height:auto;
		}
		body{
			background-image: url('{{ asset('wallpaper.png') }}');
			background-size: 700px 700px;
		}
	</style>
	<script>
		$('#txt_nombre').focus();
		$('.display').DataTable({
			"searching": true,
			"pageLength": 5
		});
		$('.datetime').datepicker({
			format: 'yyyy-mm-dd',
		});
	</script>
	<br/><br/>
@endsection