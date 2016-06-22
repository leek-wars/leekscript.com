leekscript.controller('documentation_controller', function($scope, $route, $http) {

	$scope.documentation = {};

	$http.get('/api/documentation/get').success(function(data) {
		$scope.documentation = data.documentation;
	})
})
