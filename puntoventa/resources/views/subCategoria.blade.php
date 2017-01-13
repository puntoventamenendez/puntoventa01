@extends ('configuracion')

@section('titulo','Sub Categoria')

@section('iconoClase','glyphicon glyphicon-tag')

@section('contenidoConfiguracion')


<div class="alert alert-success alert-dismissible fade in" role="alert" id="showAlertSi" style="display: none;"> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	Sub-Categoria procesada correctamente
</div>

<div class="alert alert-danger" role="alert" ng-show="showAlertNo" id="showAlertNo" style="display: none;">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	Sub-Categoria al procesar la caja, favor solicitar soporte.
</div>

<div class="panel panel-default" ng-controller="SubCategoriasController">
		<div class="container" style="width: 100%; text-align: right;margin:5px;">
			<button class="btn btn-success" ng-click="toggle('agregarSubCategoria',0)">Agregar Sub-Categoria</button>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Id</th>
					<th>Categoria</th>
					<th>Sub-Categoria</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="subcat in subCategoriasResponse">
					<td>@{{subcat.ps_id}}</td>
					<td>@{{subcat.pc_categoria}}</td>
					<td>@{{subcat.ps_subcategoria}}</td>
					<td>
						<button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('editarSubCategoria',subcat.ps_id)">
						<span class="glyphicon glyphicon-edit"></span>
						</button>
						<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmarDelete(subcat.ps_id)">
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
					<form name="formSubCategoria" class="form-horizontal" novalidate="">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">
						<div class="form-group">
							<label class="col-sm-3 control-label">Id</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="idSubCategoriaModel" name="idSubCategoriaModel" value="@{{idSubCategoriaModel}}" ng-model="idSubCategoriaModel"  disabled="disabled">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Categoria</label>
							<div class="col-sm-9">
								<select class="form-control" ng-model="selectCategoriaModel" id="selectCategoriaModel" name="selectCategoriaModel">
									<option value="@{{categoria.pc_id}}"  ng-repeat="categoria in categoriasResponse">@{{categoria.pc_categoria}}</option>
								</select>
								<!--<input type="text" class="form-control" id="nombreSubCategoriaModel" name="nombreSubCategoriaModel" value="@{{nombreSubCategoriaModel}}" ng-model="nombreSubCategoriaModel" ng-required="true">
								<span ng-show="formSubCategoria.selectCategoriaModel.$invalid && formSubCategoria.selectCategoriaModel.$touched">La Categoria es obligatoria</span>-->
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Sub-Categoria</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="nombreSubCategoriaModel" name="nombreSubCategoriaModel" value="@{{nombreSubCategoriaModel}}" ng-model="nombreSubCategoriaModel" ng-required="true">
								<span ng-show="formSubCategoria.nombreSubCategoriaModel.$invalid && formSubCategoria.nombreSubCategoriaModel.$touched">La Sub-Categoria es obligatoria</span>
							</div>
						</div>

					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="formSubCategoria.$invalid">Guardar Cambios</button>
				</div>
			</div>
		</div>
	</div>

</div>

@endsection