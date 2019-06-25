

	var app = angular.module('MyFirstApp',[]);
app.controller('FirstController',function($scope){
	$scope.posts = [];
	$http.get("https://jsonplaceholder.typicode.com/posts")
	.then(function(response){
	console.log(response.data);
	$scope.posts = response.data;
	},function(err){
	console.log(err);
	});
	 });                                                                              
~                                                                                       
~                                
