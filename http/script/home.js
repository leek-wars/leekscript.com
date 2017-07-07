leekscript.controller('home_controller', function($scope, $route, $http) {

	$http.defaults.headers.post["Content-Type"] = "application/x-www-form-urlencoded";

	$scope.Math = window.Math;

	$scope.console = "let n = [1, 2, 3]\nlet carrés = n ~~ x -> x ^ 2\ncarrés.sum()\n\n// or\n\n[1, 2, 3].map(x -> x ^ 2).sum()";

	$scope.keypressed = function(event) {
		if (event.keyCode == 13) {
			$scope.execute();
			event.stopPropagation();
			event.preventDefault();
			return false;
		}
	}



	$scope.execute = function() {
		$http({
	        url: 'https://leekwars.com/api/leekscript/execute',
	        method: 'POST',
	        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
	        transformRequest: function(obj) {
	            var str = [];
	            for (var p in obj) str.push(encodeURIComponent(p) + ' = ' + encodeURIComponent(obj[p]));
	            return str.join('&');
	        },
			cache: false,
	        data: {code: $scope.console, token: 'a'},
	    }).success(function(data) {
			var result = JSON.parse(data.result)
			console.log(result)
			$scope.result = result;
	    })
	}

	$scope.random = function() {
		$http.get('https://leekwars.com/api/leekscript/random').success(function(data) {
			$scope.console = data.code;
		})
	}
})
