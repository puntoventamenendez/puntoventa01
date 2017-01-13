@extends ('configuracion')

@section('titulo','Forma Pago')

@section('iconoClase','glyphicon glyphicon-tag')

@section('contenidoConfiguracion')


<div class="alert alert-success alert-dismissible fade in" role="alert" id="showAlertSi" style="display: none;"> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	Forma de pago procesada correctamente
</div>

<div class="alert alert-danger" role="alert" ng-show="showAlertNo" id="showAlertNo" style="display: none;">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	Error al procesar la Forma de pago, favor solicitar soporte.
</div>

<div class="panel panel-default" ng-controller="FormaPagoController">
		<div class="container" style="width: 100%; text-align: right;margin:5px;">
			<button class="btn btn-success" ng-click="toggle('agregarFormaPago',0)">Agregar Forma de pago</button>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Forma de pago</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="fpago in FormaPagoResponse">
					<td>@{{fpago.pfp_id}}</td>
					<td>@{{fpago.pfp_forma_pago}}</td>
					<td>
						<button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('editarFormaPago',fpago.pfp_id)">
						<span class="glyphicon glyphicon-edit"></span>
						</button>
						<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmarDelete(fpago.pfp_id)">
							<span class="glyphicon glyphicon-trash"></span>
						</button>

					</td>
				</tr>
			</tbody>
		</table>

	<!-- show modal  -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">@{{titulo_table}}</h4>
				</div>
				<div class="modal-body">
					<form name="formFormaPago" class="form-horizontal" novalidate="">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">
						<div class="form-group">
							<label class="col-sm-3 control-label">Id</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="idFormaPagoModel" name="idFormaPagoModel" value="@{{idFormaPagoModel}}" ng-model="idFormaPagoModel"  disabled="disabled">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Forma Pago</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="nombreFormaPagoModel" name="nombreFormaPagoModel" value="@{{nombreFormaPagoModel}}" ng-model="nombreFormaPagoModel" ng-required="true">
								<span ng-show="formFormaPago.nombreFormaPagoModel.$invalid && formFormaPago.nombreFormaPagoModel.$touched">La Forma de pago es obligatoria</span>
							</div>
						</div>

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="formFormaPago.$invalid">Guardar Cambios</button>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection