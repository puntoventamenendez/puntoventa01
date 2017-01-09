app.controller('BodegasController',function($scope,$http, API_URL,$location)
{
	$scope.listarBodegas = function()
	{
		$http({
			method 	: "GET",
			url 	: API_URL + "/configuracion/bodega",
			headers : {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        	'Content-Type': 'application/json'
	    	}
		}).then(function successCallback(response) {
			$scope.bodegasResponse = angular.fromJson(response.data);
		}, function errorCallback(response) {
			console.log("error");
		});                                                                                                                                                    
	};
	$scope.listarBodegas();
	//$http.jsonp( API_URL + "configuracion/unidad/" );

	$scope.toggle = function(modalstate,id)
	{
		$scope.modalstate = modalstate;
		switch(modalstate){
			case 'agregarBodega':
				$scope.titulo_table = "Agregar Nueva Bodega";
				$scope.idBodegaModel 		= '';
				$scope.nombreBodegaModel 	= '';
				break;
			case 'editarBodega':
				$scope.titulo_table = "Editar Bodega";
				$scope.id = id;
				$http({
					method: 'GET',
					url: API_URL+"/configuracion/bodega/"+id
				}).then(function successCallback(response) {
					console.log(response.data.pb_bodega);
					$scope.idBodegaModel 		= response.data.pb_id;
					$scope.nombreBodegaModel 	= response.data.pb_bodega;
				});
				break;
			default:
			break;
		}
		$("#myModal").modal('show');
	}

	$scope.saveBodega = function(modalstate,id)
	{
		var url = API_URL + "/configuracion/bodega";
		if(modalstate === 'editarBodega')
		{
			url += "/"+id;
		}
		$http({
			method  : "POST",
			url 	: url,
			data 	: $.param({nombreBodegaModel: $scope.nombreBodegaModel}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response){
			console.log(response);
			$scope.listarBodegas();
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
				url: API_URL + "/configuracion/bodega/"+id,
			}).then(function(response){
				$scope.listarBodegas();
				$("#showAlertSi").show();
			});
		}else{
			return false;
		}
	}

});