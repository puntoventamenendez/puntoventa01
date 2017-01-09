app.controller('CategoriasController',function($scope,$http, API_URL,$location)
{
	$scope.listarCategorias = function()
	{
		$http({
			method 	: "GET",
			url 	: API_URL + "/configuracion/categoria",
			headers : {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        	'Content-Type': 'application/json'
	    	}
		}).then(function successCallback(response) {
			console.log(response);
			$scope.categoriasResponse = angular.fromJson(response.data);
		}, function errorCallback(response) {
			console.log("error");
		});                                                                                                                                                    
	};
	$scope.listarCategorias();
	//$http.jsonp( API_URL + "configuracion/unidad/" );

	$scope.toggle = function(modalstate,id)
	{
		$scope.modalstate = modalstate;
		switch(modalstate){
			case 'agregarCategoria':
				$scope.titulo_table = "Agregar Nueva Categoria";
				$scope.idCategoriaModel 		= '';
				$scope.nombreCategoriaModel 	= '';
				break;
			case 'editarCategoria':
				$scope.titulo_table = "Editar Categoria";
				$scope.id = id;
				$http({
					method: 'GET',
					url: API_URL+"/configuracion/categoria/"+id
				}).then(function successCallback(response) {
					console.log(response.data.pc_categoria);
					$scope.idCategoriaModel 		= response.data.pc_id;
					$scope.nombreCategoriaModel 	= response.data.pc_categoria;
				});
				break;
			default:
			break;
		}
		$("#myModal").modal('show');
	}

	$scope.save = function(modalstate,id)
	{
		var url = API_URL + "/configuracion/categoria";
		if(modalstate === 'editarCategoria')
		{
			url += "/"+id;
		}
		$http({
			method  : "POST",
			url 	: url,
			data 	: $.param({nombreCategoriaModel: $scope.nombreCategoriaModel}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response){
			console.log(response);
			$scope.listarCategorias();
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
				$scope.listarCategorias();
				$("#showAlertSi").show();
			});
		}else{
			return false;
		}
	}

});