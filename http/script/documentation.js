leekscript.controller('documentation_controller', function($scope, $route, $http) {

	$scope.documentation = {};

	$http.get('documentation.json').success(function(data) {
		$scope.documentation = data;
	})
})
