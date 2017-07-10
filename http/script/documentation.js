leekscript.controller('documentation_controller', function($scope, $route, $http) {

	$scope.documentation = {}

	$http.get('/data/doc.json').success(function(data) {
		$scope.documentation = data
	})
})
