@extends ('inventario')

@section('titulo','Productos')

@section('iconoClase','glyphicon glyphicon-tag')

@section('contenidoInventario')


<div class="alert alert-success alert-dismissible fade in" role="alert" id="showAlertSi" style="display: none;"> 
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	Producto procesado correctamente
</div>

<div class="alert alert-danger" role="alert" ng-show="showAlertNo" id="showAlertNo" style="display: none;">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	Error al procesar el producto, favor solicitar soporte.
</div>

<div class="panel panel-default" ng-controller="ProductosController">
		<div class="container" style="width: 100%; text-align: right;margin:5px;">
			<button class="btn btn-success" ng-click="toggle('agregarProducto',0)">Agregar Producto</button>
		</div>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Cod. Producto</th>
					<th>Categoria</th>
					<th>Sub Categoria</th>
					<th>Producto</th>
					<th>Stock</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="prod in productosResponse">
					<td>@{{prod.pp_barcod}}</td>
					<td>@{{prod.pc_categoria}}</td>
					<td>@{{prod.ps_subcategoria}}</td>
					<td>@{{prod.pp_producto}}</td>
					<td>
						<span ng-model="stockProducto">@{{stockProducto}}</span>
						<button class="btn btn-success btn-xs btn-success" ng-click="mostrarModal('editarStock',prod.pp_id)">
							<span class="glyphicon glyphicon-plus"></span>
						</button>
					</td>
					<td>
						<button class="btn btn-warning btn-xs btn-detail" ng-click="toggle('editarProducto',prod.pp_id)">
						<span class="glyphicon glyphicon-edit"></span>
						</button>
						<button class="btn btn-danger btn-xs btn-delete" ng-click="confirmarDelete(prod.pp_id)">
							<span class="glyphicon glyphicon-trash"></span>
						</button>

					</td>
				</tr>
			</tbody>
		</table>

	<!-- show modal  -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" style="width:60%">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">@{{titulo_table}}</h4>
				</div>
				<div class="modal-body">
					<!-- FORMULARIO PRODUCTOS -->
					<form name="formProducto" class="form-horizontal" novalidate="" id="formProductoID">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">

						<!--
						<div class="input-group">
						  <span class="input-group-addon" id="sizing-addon2">@</span>
						  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
						</div>-->
						<div class="row form-group">
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2" >Id</span>
									<input type="text" class="form-control" id="idProductoModel" name="idProductoModel" value="@{{idProductoModel}}" ng-model="idProductoModel"  disabled="disabled" aria-describedby="sizing-addon2">
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">Estado</span>
									<select class="form-control" ng-value="selectEstadoModel" ng-model="selectEstadoModel" id="selectEstadoModel" name="selectEstadoModel" aria-describedby="sizing-addon2" >
										<option value="">Seleccione Estado</option>
										<option value="0" >ACTIVO</option>
										<option value="1" >INACTIVO</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">Categoria</span>

									<select class="form-control" ng-model="selectCategoriaModel" id="selectCategoriaModel" name="selectCategoriaModel" aria-describedby="sizing-addon2">
										<option value="">Seleccione Categoria</option>
										<option value="@{{categoria.pc_id}}"  ng-repeat="categoria in categoriasResponse">@{{categoria.pc_categoria}}</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">Sub-Categoria</span>
									<select class="form-control" ng-model="selectSubCategoriaModel" id="selectSubCategoriaModel" name="selectSubCategoriaModel" aria-describedby="sizing-addon2">
										<option value="">Seleccione sub-Categoria</option>
										<option value="@{{subcategoria.ps_id}}"  ng-repeat="subcategoria in subCategoriasResponse">@{{subcategoria.ps_subcategoria}}</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">Unidad</span>
									<select class="form-control" ng-model="selectUnidadModel" id="selectUnidadModel" name="selectUnidadModel" aria-describedby="sizing-addon2">
										<option value="">Seleccione Unidad</option>
										<option value="@{{unidad.pu_id}}"  ng-repeat="unidad in UnidadesResponse">@{{unidad.pu_unidad}}</option>
									</select>
								</div>  	
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">Marca</span>
									<select class="form-control" ng-model="selectMarcaModel" id="selectMarcaModel" name="selectMarcaModel" aria-describedby="sizing-addon2">
										<option value="">Seleccione Marca</option>
										<option value="@{{marca.pm_id}}"  ng-repeat="marca in marcasResponse">@{{marca.pm_marca}}</option>
									</select>
								</div>  
							</div>
						</div>
						<div class="row form-group">
							<div class="col-sm-6">
								 <div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">Codigo Barra</span>
									<input type="text" class="form-control" id="codBarraModel" name="codBarraModel" value="@{{codBarraModel}}" ng-model="codBarraModel" ng-required="true" aria-describedby="sizing-addon2">
									<span ng-show="formProducto.codBarraModel.$invalid && formProducto.codBarraModel.$touched">El codigo de barra es obligatorio</span>
								</div>  
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">Producto</span>
									<input type="text" class="form-control" id="nombreProductoModel" name="nombreProductoModel" value="@{{nombreProductoModel}}" ng-model="nombreProductoModel" ng-required="true"  aria-describedby="sizing-addon2">
									<span ng-show="formProducto.nombreProductoModel.$invalid && formProducto.nombreProductoModel.$touched">El producto es obligatorio</span>
								</div>
							</div>
						</div>
                         <div class="row form-group">
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">Valor Producto</span>
									<input type="text" class="form-control" id="inputValorModel" name="inputValorModel" value="@{{inputValorModel}}" ng-model="inputValorModel" ng-required="true" aria-describedby="sizing-addon2">
									<span ng-show="formProducto.inputValorModel.$invalid && formProducto.inputValorModel.$touched">El valor del producto es obligatorio</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="input-group">
									<span class="input-group-addon" id="sizing-addon2">Valor Mayorista Producto</span>
									<input type="text" class="form-control" id="inputValorMayoristaModel" name="inputValorMayoristaModel" value="@{{inputValorMayoristaModel}}" ng-model="inputValorMayoristaModel" ng-required="true" aria-describedby="sizing-addon2">
									<span ng-show="formProducto.inputValorMayoristaModel.$invalid && formProducto.inputValorMayoristaModel.$touched">El valor Mayorista del producto es obligatorio</span>
								</div>
							</div>
						</div>
                        <div class="row form-group">
							<div class="col-sm-12">
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" id="btn-save" ng-click="save(modalstate, id)" ng-disabled="formProducto.$invalid">Guardar Cambios</button>
								</div>
							</div>
						</div>
					</form>
					<!-- FIN FORMULARIO PRODUCTO -->

					<!-- FORMULARIO STOCK -->
					<form  name="formStock" class="form-horizontal" novalidate="" id="formStockID">
						{{ csrf_field() }}
						<input type="hidden" name="_method" value="PUT">

						<div ng-repeat="bodega in bodegasProdResponse" class="panel panel-primary">
							<div class="panel-heading">@{{bodega.pb_bodega}}</div>
							<input type="hidden" name="bodegaIdModel" id="bodegaIdModel" ng-model="bodegaIdModel" value="bodega.pb_id">
							<input type="hidden" name="productoIdModel" id="productoIdModel" ng-model="productoIdModel" value="@{{productoIdModel}}">
							<div class="panel-body">
								<div class="row form-group">
									<div class="col-sm-6">
										<div class="input-group">
											<span class="input-group-addon" id="sizing-addon2">Stock</span>
											<input type="number" class="form-control" id="stockModel" name="stockModel" value="@{{stockModel}}" ng-model="stockModel" ng-required="true" aria-describedby="sizing-addon2">
											<span ng-show="formStock.stockModel.$invalid && formStock.stockModel.$touched">El stock es obligatorio</span>
										</div>  		
									</div>
									<div class="col-sm-6">
										<div class="input-group">
											<span class="input-group-addon" id="sizing-addon2">Stock Minimo</span>
											<input type="number" class="form-control" id="stockMinimoModel" name="stockMinimoModel" value="@{{stockMinimoModel}}" ng-model="stockMinimoModel" ng-required="true" aria-describedby="sizing-addon2">
											<span ng-show="formStock.stockMinimoModel.$invalid && formStock.stockMinimoModel.$touched">El stock minimo es obligatorio</span>
										</div>  
									</div>
								</div>
								<div class="row form-group">
									<div class="col-sm-6">

									</div>
									<div class="col-sm-6">
										<div class="input-group">
											<button type="button" class="btn btn-primary" id="btn-save" 
											ng-click="saveStock(modalstate, id )" ng-disabled="formStock.$invalid">Guardar Cambios</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</form>

					<!-- FIN FORMULARIO STOCK -->
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
