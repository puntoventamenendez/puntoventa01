app.controller('FormaPagoController',function($scope,$http, API_URL,$location)
{
	$scope.listarFormasPago = function()
	{
		$http({
			method 	: "GET",
			url 	: API_URL + "/configuracion/formapago",
			headers : {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        	'Content-Type': 'application/json'
	    	}
		}).then(function successCallback(response) {
			$scope.FormaPagoResponse = angular.fromJson(response.data);
		}, function errorCallback(response) {
			console.log("error");
		});                                                                                                                                                    
	};
	$scope.listarFormasPago();
	//$http.jsonp( API_URL + "configuracion/unidad/" );

	$scope.toggle = function(modalstate,id)
	{
		$scope.modalstate = modalstate;
		switch(modalstate){
			case 'agregarFormaPago':
				$scope.titulo_table = "Agregar Nueva Forma de pago";
				$scope.idFormaPagoModel 		= '';
				$scope.nombreFormaPagoModel 	= '';
				break;
			case 'editarFormaPago':
				$scope.titulo_table = "Editar Forma de pago";
				$scope.id = id;
				$http({
					method: 'GET',
					url: API_URL+"/configuracion/formapago/"+id
				}).then(function successCallback(response) {
					console.log(response.data.pfp_id);
					$scope.idFormaPagoModel 		= response.data.pfp_id;
					$scope.nombreFormaPagoModel 	= response.data.pfp_forma_pago;
				});
				break;
			default:
			break;
		}
		$("#myModal").modal('show');
	}

	$scope.save = function(modalstate,id)
	{
		var url = API_URL + "/configuracion/formapago";
		if(modalstate === 'editarFormaPago')
		{
			url += "/"+id;
		}
		$http({
			method  : "POST",
			url 	: url,
			data 	: $.param({nombreFormaPagoModel: $scope.nombreFormaPagoModel}),
			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
		}).then(function(response){
			console.log(response);
			$scope.listarFormasPago();
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
				url: API_URL + "/configuracion/formapago/"+id,
			}).then(function(response){
				$scope.listarFormasPago();
				$("#showAlertSi").show();
			});
		}else{
			return false;
		}
	}

});