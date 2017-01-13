app.controller('ProductosController',function($scope,$http, API_URL,$location)
{
	$scope.listarProductos = function()
	{
		$http({
			method 	: "GET",
			url 	: API_URL + "/inventario/producto",
			headers : {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        	'Content-Type': 'application/json'
	    	}
		}).then(function successCallback(response) {
				console.log(response.data[0]);
				$scope.categoriasResponse 		= response.data[0];
				$scope.subCategoriasResponse 	= response.data[1];
				$scope.UnidadesResponse 		= response.data[3];
				$scope.marcasResponse 			= response.data[2];
				$scope.productosResponse 		= response.data[4];
				$scope.bodegasResponse 			= response.data[5];
				//$scope.productosResponse = angular.fromJson(response.data);
			
		}, function errorCallback(response) {
			console.log("error");
		});                                                                                                                                                    
	};
	$scope.listarProductos();



	$scope.toggle = function(modalstate,id)
	{
		$("#formProductoID").show();
		$("#formStockID").hide();
		$scope.modalstate = modalstate;
		switch(modalstate){
			case 'agregarProducto':
				$scope.titulo_table 				= "Agregar Nuevo Producto";
				$scope.idProductoModel 				= '';
				$scope.selectEstadoModel 			= '';
				$scope.selectUnidadModel 			= '';
				$scope.selectMarcaModel 			= '';
				$scope.codBarraModel 				= '';
				$scope.nombreProductoModel 			= '';
				$scope.inputValorModel 				= '';
				$scope.inputValorMayoristaModel 	= '';
				break;
			case 'editarProducto':
				$scope.titulo_table = "Editar Producto";
				$scope.id = id;
				$http({
					method: 'GET',
					url: API_URL+"/inventario/producto/"+id
				}).then(function successCallback(response) {
					$scope.idProductoModel 				= response.data.pp_id;
					//$scope.selectEstadoModel 			= response.data.pp_estado;
					//$scope.selectCategoriaModel 		= response.data.pc_id;
					//$scope.selectSubCategoriaModel 		= response.data.ps_id;
					//$scope.selectUnidadModel 			= response.data.pv_unidad_pu_id;
					//$scope.selectMarcaModel 			= response.data.pv_marca_pm_id;
					$("#selectEstadoModel option[value='"+response.data.pp_estado+"'").prop('selected','selected'); 
					$("#selectCategoriaModel option[value='"+response.data.pv_categoria_pc_id+"'").prop('selected','selected');
					$("#selectSubCategoriaModel option[value='"+response.data.pv_subcategoria_ps_id+"'").prop('selected','selected');
					$("#selectUnidadModel option[value='"+response.data.pv_unidad_pu_id+"'").prop('selected','selected');
					$("#selectMarcaModel option[value='"+response.data.pv_marca_pm_id+"'").prop('selected','selected');
					console.log(response);
					$scope.codBarraModel 				= response.data.pp_barcod;
					$scope.nombreProductoModel 			= response.data.pp_producto;
					$scope.inputValorModel 				= response.data.pp_valor;
					$scope.inputValorMayoristaModel 	= response.data.pp_valor_mayorista;

				});
				break;
			default:
			break;
		}
		$("#myModal").modal('show');
	}

	$scope.mostrarModal = function(modalstate,id)
	{
		$("#formStockID").show();
		$("#formProductoID").hide();
		$scope.modalstate = modalstate;
		switch(modalstate){
			case 'editarStock':
				$scope.titulo_table = "Editar Stock de Producto";
				$scope.id = id;
				$http({
					method: 'GET',
					url: API_URL+"/inventario/inventario/"+id
				}).then(function successCallback(response) {
					$scope.bodegasProdResponse = response;

					$("#selectBodegaModel option[value='"+response.data.pv_bodega_pb_id+"'").prop('selected','selected'); 
					$scope.stockModel 			= response.data.pbp_cantidad;
					$scope.stockMinimoModel 	= response.data.pbp_cantidad_minima;

				});
				break;
			default:
			break;
		}
		$("#myModal").modal('show');
	}

	$scope.save = function(modalstate,id)
	{
		var url = API_URL + "/inventario/producto";
		if(modalstate === 'editarProducto')
		{
			url += "/"+id;
		}
		$http({
			method  : "POST",
			url 	: url,
			data 	: $.param({
				selectEstadoModel 			:$("#selectEstadoModel").val()
				//selectEstadoModel 			:$scope.selectEstadoModel
				,selectCategoriaModel 		:$("#selectCategoriaModel").val()
				,selectSubCategoriaModel	:$("#selectSubCategoriaModel").val()
				,selectUnidadModel			:$("#selectUnidadModel").val()
				,selectMarcaModel			:$("#selectMarcaModel").val()
				,codBarraModel				:$scope.codBarraModel 		
				,nombreProductoModel		:$scope.nombreProductoModel 
				,inputValorModel			:$scope.inputValorModel 	
				,inputValorMayoristaModel 	:$scope.inputValorMayoristaModel
			}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response){
			console.log(response);
			$scope.listarProductos();
			$("#showAlertSi").show();
		}), function errorCallback(response) {
			console.log("error: "+response);
			$("#showAlertNo").show();
		};
	}

	$scope.saveStock = function(modalstate,id)
	{
		console.log("EntraSaveStock");
		//IDINVENTARIO
		//IDPRODUCTO
		//IDBODEGA
		//STOCK1
		//STOCK2
		var url = API_URL + "/inventario/inventario";
		if(modalstate === 'editarStock')
		{
			url += "/"+id;
		}
		$http({
			method  : "POST",
			url 	: url,
			data 	: $.param({
				bodegaIdModel				:$scope.bodegaIdModel 		
				,stockModel					:$scope.stockModel 		
				,stockMinimoModel			:$scope.stockMinimoModel 		
			}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response){
			$("#myModal").modal('close');
		}), function errorCallback(response) {
			console.log("error: "+response);
		};
	}

	$scope.confirmarDelete = function(id)
	{
		var isConfirmDelete = confirm('Esta seguro de eliminar el registro?');
		if(isConfirmDelete)
		{
			$http({
				method: "DELETE",
				url: API_URL + "/inventario/producto/"+id,
			}).then(function(response){
				$scope.listarProductos();
				$("#showAlertSi").show();
			});
		}else{
			return false;
		}
	}

});