	
	


        angular.module("mainModule",[])
        .filter("removeHtml",function(){
                return function(texto){
                        return String(texto).replace(/<[^>]+>/gm,'');
}


})
        .controller ("filtersController",function($scope){
        $scope.mi_html = {};
        $scope.mi_html.title = "Hola";
        $scope.mi_html.body = "Hola mundo";
        $scope.costo = 2 ;


});
~                                                                                       
~     
