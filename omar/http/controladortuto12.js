	
	angular.module("MyFirstApp",[])
	.controller("FirstController",function($scope, $http){
		$scope.posts = [];
		$scope.loading = false; 
		$http.get("http://jsonplaceholder.typicode.com/posts")
			.then(function(response){
				$scope.posts = response.data;
		});

	});
