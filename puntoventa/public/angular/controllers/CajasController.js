app.controller('CajasController',function($scope,$http, API_URL,$location)
{
	$scope.listarCajas = function()
	{
		$http({
			method 	: "GET",
			url 	: API_URL + "/configuracion/caja",
			headers : {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        	'Content-Type': 'application/json'
	    	}
		}).then(function successCallback(response) {
			$scope.cajasResponse = angular.fromJson(response.data);
		}, function errorCallback(response) {
			console.log("error");
		});                                                                                                                                                    
	};
	$scope.listarCajas();
	//$http.jsonp( API_URL + "configuracion/unidad/" );

	$scope.toggle = function(modalstate,id)
	{
		$scope.modalstate = modalstate;
		switch(modalstate){
			case 'agregarCaja':
				$scope.titulo_table = "Agregar Nueva Caja";
				$scope.idCajaModel 		= '';
				$scope.nombreCajaModel 	= '';
				break;
			case 'editarCaja':
				$scope.titulo_table = "Editar Caja";
				$scope.id = id;
				$http({
					method: 'GET',
					url: API_URL+"/configuracion/caja/"+id
				}).then(function successCallback(response) {
					console.log(response.data.pca_caja);
					$scope.idCajaModel 		= response.data.pca_id;
					$scope.nombreCajaModel 	= response.data.pca_caja;
				});
				break;
			default:
			break;
		}
		$("#myModal").modal('show');
	}

	$scope.save = function(modalstate,id)
	{
		var url = API_URL + "/configuracion/caja";
		if(modalstate === 'editarCaja')
		{
			url += "/"+id;
		}
		$http({
			method  : "POST",
			url 	: url,
			data 	: $.param({nombreCajaModel: $scope.nombreCajaModel}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response){
			console.log(response);
			$scope.listarCajas();
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
				url: API_URL + "/configuracion/caja/"+id,
			}).then(function(response){
				$scope.listarCajas();
				$("#showAlertSi").show();
			});
		}else{
			return false;
		}
	}

});