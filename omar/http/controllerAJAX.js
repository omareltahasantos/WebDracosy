
var app = angular.module('MyFirstApp',[]);
app.controller('FirstController',function($scope){
$scope.nombre= "Uriel";
$scope.nuevoComentario = {};
$scope.comentarios = [
	{
	comentario: "Buen tutorial",
	username:"Omar"
	},
	{
	comentario: "Mal tutorial",
	username: "Marc"
	}
];
$scope.agregarComentario = function(){
	$scope.comentarios.push($scope.nuevoComentario);
	$scope.nuevoComentario = {};
}

});
