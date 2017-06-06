@extends('template')
@section('page_title', 'Beneficios')
@section('content')
	<h3 class="text-center">Nuevo beneficio</h3>
	<form action="/nuevo_beneficio" method="post" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="form-group">
					<label>Beneficio</label>
					<textarea id="txt_descripcion" name="txt_descripcion" type="text" class="form-control" maxlength="150" required></textarea>
					<input id="txt_empresa_id" name="txt_empresa_id" type="hidden" value="{{ $id }}" />
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
	<h3 class="text-center">Beneficios - {{ $empresa->nombre_comercial }}</h3>
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="display">
				<thead>
					<tr>
						<th width="70%">Beneficio</th>
						<th width="30%"></th>
					</tr>
				</thead>
				<tbody>
					@foreach ($beneficios as $beneficio)
					<tr>
						<td>{{ $beneficio->descripcion }}</td>
						<td class="text-right">
							<div class="btn-group btn-group-sm" role="group">
								<a class="btn btn-default confirmation" href="/eliminar_beneficio/{{ $beneficio->id }}" title="Eliminar"><span class="glyphicon glyphicon-remove"></span></a>
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
		$('#txt_descripcion').focus();
		$('.display').DataTable({
			"searching": true,
			"pageLength": 5
		});
		$('.confirmation').on('click', function () {
			return confirm('¿Estás seguro?');
		});
	</script>
	<br/><br/>
@endsection