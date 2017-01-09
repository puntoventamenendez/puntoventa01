@extends ('configuracion')

@section('titulo','Bodegas')

@section('iconoClase','glyphicon glyphicon-tag')

@section('contenidoConfiguracion')


<div class="alert alert-success alert-dismissible fade in" role="alert" id="showAlertSi" style="display: none;"> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	Bodega procesada correctamente
</div>

<div class="alert alert-danger" role="alert" ng-show="showAlertNo" id="showAlertNo" style="display: none;">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	Error al procesar la Bodega, favor solicitar soporte.
</div>

<div class="panel panel-default" ng-controller="BodegasController">
		<div class="container" style="width: 100%; text-align: right;margin:5px;">
			<button class="btn btn-success" ng-click="toggle('agregarBodega',0)">Agregar Bodega</button>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Bodega</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="bodega in bodegasResponse">
					<td>@{{bodega.pb_id}}</td>
					<td>@{{bodega.pb_bodega}}</td>
					<td>
						<button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('editarBodega',bodega.pb_id)">
						<span class="glyphicon glyphicon-edit"></span>
						</button>
						<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmarDelete(bodega.pb_id)">
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
					<form name="formBodega" class="form-horizontal" novalidate="">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">
						<div class="form-group">
							<label class="col-sm-3 control-label">Id</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="idBodegaModel" name="idBodegaModel" value="@{{idBodegaModel}}" ng-model="idBodegaModel"  disabled="disabled">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Bodega</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="nombreBodegaModel" name="nombreBodegaModel" value="@{{nombreBodegaModel}}" ng-model="nombreBodegaModel" ng-required="true">
								<span ng-show="formBodega.nombreBodegaModel.$invalid && formBodega.nombreBodegaModel.$touched">La Unidad es obligatoria</span>
							</div>
						</div>

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btn-save" ng-click="saveBodega(modalstate, id)" ng-disabled="formBodega.$invalid">Guardar Cambios</button>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection