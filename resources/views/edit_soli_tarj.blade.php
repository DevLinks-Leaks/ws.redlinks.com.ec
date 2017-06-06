@extends('template')
@section('page_title', 'Observación')
@section('content')
	<h3 class="text-center">Ingreso de observación de rechazo</h3>
	<form action="{{ $id }}/save" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label>Observación</label>
					<textarea id="txt_observacion" name="txt_observacion" class="form-control" maxlength="200" required></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
					<a href="/tarjetas/pendientes" class="btn btn-danger"><span class="glyphicon glyphicon-arrow-left"></span> Atrás</a>
				</div>
			</div>
		</div>
	</form>
	<script>
        $('#txt_observacion').focus();
	</script>
@endsection