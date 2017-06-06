@extends('template')
@section('page_title', 'Locales')
@section('content')
	<h3 class="text-center">Nuevo establecimiento afiliado</h3>
	<form action="/nuevo_local" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Ruc</label>
					<input id="txt_ruc" name="txt_ruc" type="text" class="form-control" maxlength="15" required/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Razón social</label>
					<input id="txt_razon_soc" name="txt_razon_soc" type="text" class="form-control" maxlength="100" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Nombre comercial</label>
					<input id="txt_nombre_com" name="txt_nombre_com" type="text" class="form-control" maxlength="100" required/>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Beneficio</label>
					<input id="txt_beneficio" name="txt_beneficio" type="text" class="form-control" maxlength="50" required/>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Categoría</label>
					<select id="sel_categoria" name="sel_categoria" class="form-control">
					@foreach ($categorias as $categoria)
						<option value="{{ $categoria->id}}">{{ $categoria->nombre}}</option>
					@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Dirección</label>
					<textarea id="txt_direccion" name="txt_direccion" class="form-control" maxlength="150" required></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Teléfono</label>
					<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
					  <input id="txt_telefono" name="txt_telefono" class="form-control" type="text" class="form-control" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Correo</label>
					<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
					  <input id="txt_correo" name="txt_correo" class="form-control" type="text" class="form-control" maxlength="50"/>
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
					  <input id="txt_twitter" name="txt_twitter" class="form-control" type="text" class="form-control" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Facebook</label>
					<div class="input-group">
					  <span class="input-group-addon">@</span>
					  <input id="txt_facebook" name="txt_facebook" class="form-control" type="text" class="form-control" maxlength="100"/>
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
					  <input id="txt_instagram" name="txt_instagram" class="form-control" type="text" class="form-control" maxlength="50"/>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Sitio web</label>
					<div class="input-group">
					  <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
					  <input id="txt_website" name="txt_website" class="form-control" type="text" class="form-control" maxlength="50"/>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="form-group">
					<label>Logotipo con fondo</label>
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
					<label>Logotipo sin fondo</label>
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
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
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
	<h3 class="text-center">Establecimientos afiliados</h3>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<table class="display">
				<thead>
					<tr>
						<th width="10%"></th>
						<th width="50%">Local</th>
						<th width="40%"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($locales as $local)
					<tr>
						<td><img title="{{ $local->nombre_comercial }}" class="thumbnail" src="{{ $local->ruta_img_small }}{{ $local->id }}.png" /></td>
						<td>{{ $local->nombre_comercial }}</td>
						<td class="text-right">
							<div class="btn-group btn-group-sm" role="group">							
								@if ($local->estado=="A")
								<a class="btn btn-default" href="/beneficios/{{ $local->id }}/ver" title="Administrar beneficios"><span class="glyphicon glyphicon-gift"></span></a>
								<a class="btn btn-default" href="/sucursales/{{ $local->id }}/ver" title="Administrar sucursales"><span class="glyphicon glyphicon-qrcode"></span></a>
								<a class="btn btn-default" href="/locales/{{ $local->id }}/editar" title="Editar"><span class="glyphicon glyphicon-pencil"></span></a>
								<a class="confirmation btn btn-danger" href="/locales/{{ $local->id }}/I/cambiarEstado" title="Inactivar"><span class="glyphicon glyphicon-remove"></span></a>
								@else
								<a class="confirmation btn btn-success" href="/locales/{{ $local->id }}/A/cambiarEstado" title="Activar"><span class="glyphicon glyphicon-ok"></span></a>
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
		$('#txt_ruc').focus();
		$('.display').DataTable({
			"searching": true,
			"pageLength": 5,
            "language": {url: '//cdn.datatables.net/plug-ins/1.10.8/i18n/Spanish.json'}
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