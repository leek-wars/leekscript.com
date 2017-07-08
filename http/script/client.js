var leekscript = angular.module('leekscript', ['ngRoute'])

String.prototype.ucfirst = function() {
    return this.charAt(0).toUpperCase() + this.substr(1)
}

leekscript.config(function($routeProvider, $locationProvider) {
	$routeProvider

	.when('/', {
		templateUrl : 'view/home.html',
		controller  : 'home_controller'
	})
	.when('/documentation', {
		templateUrl : 'view/documentation.html',
		controller  : 'documentation_controller'
	})
	.when('/presentation', {
		templateUrl : 'view/presentation.html',
		controller  : 'presentation_controller'
	})
	.when('/faq', {
		templateUrl : 'view/faq.html',
		controller  : 'faq_controller'
	})
	.when('/operations', {
		templateUrl : 'view/operations.html',
		controller  : 'operations_controller'
	})

	$locationProvider.html5Mode(true)
})
