app.controller('UnidadesController',function($scope,$http, API_URL,$location)
{
	$scope.listarUnidades = function()
	{
		$http({
			method 	: "GET",
			url 	: API_URL + "/configuracion/unidad",
			headers : {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        	'Content-Type': 'application/json'
	    	}
		}).then(function successCallback(response) {
			$scope.unidadResponse = angular.fromJson(response.data);
		}, function errorCallback(response) {
			console.log("error");
		});
	};
	$scope.listarUnidades();
	//$http.jsonp( API_URL + "configuracion/unidad/" );

	$scope.toggle = function(modalstate,id)
	{
		$scope.modalstate = modalstate;
		switch(modalstate){
			case 'agregarUnidad':
				$scope.titulo_table = "Agregar Nueva Unidad";
				$scope.idUnidadModel 		= '';
				$scope.nombreUnidadModel 	= '';
				break;
			case 'editarUnidad':
				$scope.titulo_table = "Editar Unidad";
				$scope.id = id;
				$http({
					method: 'GET',
					url: API_URL+"/configuracion/unidad/"+id
				}).then(function successCallback(response) {
					console.log(response.data.pu_unidad);
					$scope.idUnidadModel 		= response.data.pu_id;
					$scope.nombreUnidadModel 	= response.data.pu_unidad;
				});
				break;
			default:
			break;
		}
		$("#myModal").modal('show');
	}

	$scope.saveUnidad = function(modalstate,id)
	{
		var url = API_URL + "/configuracion/unidad";
		if(modalstate === 'editarUnidad')
		{
			url += "/"+id;
		}
		$http({
			method  : "POST",
			url 	: url,
			data 	: $.param({nombreUnidadModel: $scope.nombreUnidadModel}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response){
			console.log(response);
			$scope.listarUnidades();
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
				url: API_URL + "/configuracion/unidad/"+id,
			}).then(function(response){
				$scope.listarUnidades();
				$("#showAlertSi").show();
			});
		}else{
			return false;
		}
	}

});