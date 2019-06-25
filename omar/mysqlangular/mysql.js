	

var app=	angular.module("listarRegistros",[]);
	app.controller("postresController",function($scope,$http){
		$http.get("mysql.php")
			.then(function(response) {scope.names = response.data.records});


		});
