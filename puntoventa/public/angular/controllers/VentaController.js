app.controller('VentasController',function($scope,$http, API_URL,$location)
{

	$("#codigoBarraModel").focus();
	$scope.getProducto = function()
	{
		var id = $scope.codigoBarraModel;
		$http({
			method 	: "GET",
			url 	: API_URL + "/venta/"+id,
			headers : {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	        	'Content-Type': 'application/json'
	    	}
		}).then(function successCallback(response) {
			//console.log(response.data);
			if(response.data.length > 0)
			{
				console.log(response.data[0]);
				$scope.ventasResponse = angular.fromJson(response.data);
			}
		}, function errorCallback(response) {
			console.log("error");
		});                                                                                                                                                    
	};

});