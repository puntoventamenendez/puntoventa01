@extends ('configuracion')

@section('titulo','Marcas')

@section('iconoClase','glyphicon glyphicon-tag')

@section('contenidoConfiguracion')

@if(session('data')=="OK" || isset($editData) == "OK")
	<div class="alert alert-success alert-dismissible fade in" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  		</button>
  		Marca procesada correctamente
  	</div>
@elseif(session('data')=='ERROR' || isset($editData) == "ERROR")
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
  		</button>
		Error al procesar la Marca, favor solicitar soporte.
	</div>
@endif

<div class="panel panel-default" ng-controller="MarcasController">

		<div class="container" style="text-align:right;width:100%;margin:5px">
			<button align="right" ng-click="toggle('agregarMarca', 0)" class="btn btn-success">Nueva Marcas</button>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Marca</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="marca in marcasResponse">
					<td>@{{marca.pm_id}}</td>
					<td>@{{marca.pm_marca}}</td>
					<td>
						<button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('editarMarca',marca.pm_id)">
						<span class="glyphicon glyphicon-edit"></span>
						</button>
						<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmarDelete(marca.pm_id)">
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
					<form name="formMarca" class="form-horizontal" novalidate="">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">
						<div class="form-group">
							<label class="col-sm-3 control-label">Id</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="idMarca" name="idMarca" value="@{{idMarcaModel}}" ng-model="idMarcaModel" disabled="disabled">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Marca</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="nombreMarcaModel" name="nombreMarcaModel" value="@{{nombreMarcaModel}}" ng-model="nombreMarcaModel" ng-required="true">
								<span ng-show="formMarca.nombreMarcaModel.$invalid && formMarca.nombreMarcaModel.$touched">La Marca es obligatoria</span>
							</div>
						</div>

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btn-save" ng-click="saveMarca(modalstate, id)" ng-disabled="formMarca.$invalid">Guardar Cambios</button>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection