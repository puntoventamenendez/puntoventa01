app.controller('MarcasController',function($scope,$http, API_URL,$location)
{

	$scope.listarMarcas = function()
	{

		$http({
			method 	: "GET",
			url 	: API_URL + "/configuracion/marca",
			headers : {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        	'Content-Type': 'application/json'
	    	}
		}).then(function successCallback(response) {
			$scope.marcasResponse = angular.fromJson(response.data);
		}, function errorCallback(response) {
			console.log("error");
		});
	};
	$scope.listarMarcas();
	//$http.jsonp( API_URL + "configuracion/marca/" );


	$scope.toggle = function(modalstate,id)
	{
		$scope.modalstate = modalstate;
		switch(modalstate){
			case 'agregarMarca':
				$scope.titulo_table 		= "Agregar Nueva Marca";
				$scope.idMarcaModel 		= '';
				$scope.nombreMarcaModel 	= '';
				break;
			case 'editarMarca':
				$scope.titulo_table = "Editar Marca";
				$scope.id = id;
				$http({
					method: 'GET',
					url: API_URL+"/configuracion/marca/"+id
				}).then(function successCallback(response) {
					console.log(response.data.pm_marca);
					$scope.idMarcaModel 		= response.data.pm_id;
					$scope.nombreMarcaModel 	= response.data.pm_marca;
				});
				break;
			default:
			break;
		}
		$("#myModal").modal('show');
	}

	$scope.saveMarca = function(modalstate,id)
	{
		var url = API_URL + "/configuracion/marca";
		if(modalstate === 'editarMarca')
		{
			url += "/"+id;
		}
		$http({
			method  : "POST",
			url 	: url,
			data 	: $.param({nombreMarcaModel: $scope.nombreMarcaModel}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response){
			console.log(response);
			$scope.listarMarcas();
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
				url: API_URL + "/configuracion/marca/"+id,
			}).then(function(response){
				$scope.listarMarcas();
			});
		}else{
			return false;
		}
	}

});