		

	        angular.module("CustomDirective",[])
	.directive("myAutocomplete",function(){
		function link(scope,element,attrs){
			$(element).autocomplete({
				source: scope(attrs.myAutocomplete),
				select: function(ev,ui){
					ev.preventDefault();
					if(ui.item){
					scope.optionSelected(ui.item.value);
				}
			},	
				focus: function(ev,ui){
					ev.preventDefault();
					$(this).val(ui.item.label);
			}
				
		});
	};
	return {
		link: link
	};
	})
        .directive("backImg",function(){                //Amb .directive creem una nova directiva, retornan el valor de la variable, dels elements i dels atributs.//
                return function($scope,element,attrs){
                        attrs.$observe("backImg",function(value){ //observe es un metodo de las directivas customizadas que envia como parametros el valor de la anterior funcion
                                element.css({
                                        "background": "url("+value+")",
                                        "background-size": "cover",
                                        "background-position": "center"
                                });
                        });
                }
        })
        .controller ("AppCtrl", function($scope,$http){
        $http.get("https://api.github.com/users/omar/repos")
                .then(function(response){
                                $scope.repos = response.data;
				for(var i=data.length -1; i>=0; i--){
					var repo = data[i];
					$scope.repos.push(repo.name);

			}
                });
		$scope.optionSelected = function(){
			$scope.$apply(function){
				$scope.main_repo = data;
			}
		}

        });
~                                                                                                     
