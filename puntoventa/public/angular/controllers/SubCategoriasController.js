app.controller('SubCategoriasController',function($scope,$http, API_URL,$location)
{
	$scope.listarSubCategorias = function()
	{
		$http({
			method 	: "GET",
			url 	: API_URL + "/configuracion/subcategoria/",
			headers : {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        	'Content-Type': 'application/json'
	    	}
		}).then(function successCallback(response) {
			console.log(response);
			$scope.subCategoriasResponse = angular.fromJson(response.data);
		}, function errorCallback(response) {
			console.log("error");
		});                                                                                                                                                    
	};
	$scope.listarSubCategorias();
	//$http.jsonp( API_URL + "configuracion/unidad/" );

	$scope.getCategorias = function(){
		$http({
			method 	: "GET",
			url 	: API_URL + "/configuracion/categoria",
			headers : {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        	'Content-Type': 'application/json'
	    	}
		}).then(function successCallback(response){
			//console.log(response);
			$scope.categoriasResponse = angular.fromJson(response.data);
		}),function errorCallback(response)
		{
			console.log("Error: "+response);
		};
	}

	$scope.getCategorias();

	$scope.toggle = function(modalstate,id)
	{
		$scope.modalstate = modalstate;
		switch(modalstate){
			case 'agregarSubCategoria':
				$scope.titulo_table = "Agregar Nueva Sub-Categoria";
				$scope.idSubCategoriaModel 		= '';
				$scope.nombreSubCategoriaModel 	= '';
				break;
			case 'editarSubCategoria':
				$scope.titulo_table = "Editar Sub-Categoria";
				$scope.id = id;
				$http({
					method: 'GET',
					url: API_URL+"/configuracion/subcategoria/"+id
				}).then(function successCallback(response) {
					console.log(response.data.ps_subcategoria);
					$scope.idSubcategoriaModel 		= response.data.ps_id;
					$scope.nombreSubCategoriaModel 	= response.data.ps_subcategoria;
				});
				break;
			default:
			break;
		}
		$("#myModal").modal('show');
	}

	$scope.save = function(modalstate,id)
	{
		var url = API_URL + "/configuracion/subcategoria/";
		if(modalstate === 'editarSubCategoria')
		{
			url += "/"+id;
		}
		$http({
			method  : "POST",
			url 	: url,
			data 	: $.param({
					nombreSubCategoriaModel : $scope.nombreSubCategoriaModel,
					selectCategoriaModel 	: $scope.selectCategoriaModel
				}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response){
			console.log(response);
			$scope.listarSubCategorias();
			$("#showAlertSi").show();
		}), function errorCallback(response) {
			console.log("error: "+response);
			$("#showAlertNo").show();
		};
	}

	$scope.confirmarDelete = function(id)
	{
		var isConfirmDelete = confirm('Esta seguro de eliminar el registro?');
		if(isConfirmDelete)
		{
			$http({
				method: "DELETE",
				url: API_URL + "/configuracion/categoria/"+id,
			}).then(function(response){
				$scope.listarSubCategorias();
				$("#showAlertSi").show();
			});
		}else{
			return false;
		}
	}

});