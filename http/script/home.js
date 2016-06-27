leekscript.controller('home_controller', function($scope, $route, $http) {

	$scope.console = "let n = [1, 2, 3]\nlet carrés = n ~~ x -> x ^ 2\ncarrés.sum()\n\n// or\n\n[1, 2, 3].map(x -> x ^ 2).sum()";

	$scope.keypressed = function(event) {
		console.log("lol", event)
		if (event.keyCode == 13) {
			$scope.execute();
			event.stopPropagation();
			event.preventDefault();
			return false;
		}
	}

	$scope.execute = function() {
		$http.post('/api/code/execute', {code: $scope.console}).success(function(data) {
			var result = JSON.parse(data.result)
			console.log(result)
			$scope.result = result;
		})
	}

	$scope.random = function() {
		$http.get('/api/code/get-random').success(function(data) {
			$scope.console = data.code;
		})
	}
})
