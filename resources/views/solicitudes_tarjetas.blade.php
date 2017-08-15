@extends('template')
@section('page_title', 'Solicitudes')
@section('content')
	<h3 class="text-center">Solicitudes de tarjetas</h3>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<table id="tbl_solicitudes" class="display">
				<thead>
					<tr>
						<th width="10%">Foto</th>
						<th width="20%">Empresa</th>
						<th width="30%">Usuario</th>
						<th width="25%">Fecha</th>
						<th width="15%"></th>
					</tr>
				</thead>
				<tbody>
				@foreach ($tarjetas as $tarjeta)
					<tr>
						<td><img title="" class="thumbnail zoom" src="{{ asset('/img/credenciales') }}/{{ $tarjeta->tarjetahabienteempresa->empresa->id }}/{{ $tarjeta->id }}.jpg" /></td>
						<td>{{ $tarjeta->tarjetahabienteempresa->empresa->razon_social }}</td>
						<td>{{ $tarjeta->tarjetahabienteempresa->tarjetahabiente->nombre_1 }} {{ $tarjeta->tarjetahabienteempresa->tarjetahabiente->apellido_1 }}</td>
						<td>{{ $tarjeta->created_at }}</td>
						<td>
							<div class="btn-group btn-group-sm" role="group">
								<a class="btn btn-default" title="Descargar foto" target="_blank" href="{{ asset('/img/credenciales') }}/{{ $tarjeta->tarjetahabienteempresa->empresa->id }}/{{ $tarjeta->id }}.jpg"><span class="glyphicon glyphicon-save"></span></a>
								<a class="btn btn-default" title="Rechazar" href="observacion/{{ $tarjeta->id }}"><span class="glyphicon glyphicon-remove"></span></a>
								<a class="btn btn-default" title="Aprobar" href="{{ $tarjeta->id }}/A/cambiarEstado"><span class="glyphicon glyphicon-ok"></span></a>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="btn-group" role="group">
				<a href="/" class="btn btn-danger"><span class="glyphicon glyphicon-home"></span> Regresar a menú principal</a>
			</div>
		</div>
	</div>
	<style>
		div.dataTables_length { display: none !important; }
		td>img{
			width:50%; height:auto;
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
			"ordering": false,
			"pageLength": 10,
            "language": {url: '//cdn.datatables.net/plug-ins/1.10.8/i18n/Spanish.json'},

            /*initComplete: function () {
                this.api().columns().every( function () {
                    var column = this;
                    var select = $('<select><option value=""></option></select>')
                        .appendTo( $(column.header()).empty() )
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            column
                                .search( val ? '^'+val+'$' : '', true, false )
                                .draw();
                        } );

                    column.data().unique().sort().each( function ( d, j ) {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    } );
                } );
            }*/
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