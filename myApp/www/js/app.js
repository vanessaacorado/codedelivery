// Ionic Starter App

// angular.module is a global place for creating, registering and retrieving Angular modules
// 'starter' is the name of this angular module example (also set in a <body> attribute in index.html)
// the 2nd parameter is an array of 'requires'
angular.module('starter', ['ionic', 'starter-controlller', 'angular-oauth2'])

.run(function($ionicPlatform) {
  $ionicPlatform.ready(function() {
    if(window.cordova && window.cordova.plugins.Keyboard) {
      // Hide the accessory bar by default (remove this to show the accessory bar above the keyboard
      // for form inputs)
      cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

      // Don't remove this line unless you know what you are doing. It stops the viewport
      // from snapping when text inputs are focused. Ionic handles this internally for
      // a much nicer keyboard experience.
      cordova.plugins.Keyboard.disableScroll(true);
    }
    if(window.StatusBar) {
      StatusBar.styleDefault();
    }
  });
})

	.config(function($stateProvider, $urlRouterProvider, OAuthProvider, OAuthTokenProvider){
		OAuthProvider.configure({
		  baseUrl: 'http://localhost:8000/',
		  clientId: 'appid01',
		  clientSecret: 'secret', // optional
		  grantPath:'oauth/access_token'
		});
		
		OAuthTokenProvider.configure({
		  name: 'token',
		  options: {
			secure: false
		  }
		});
		$stateProvider.state(
		'login',{
			url:'/login',
			templateUrl:'templates/login.html',
			controller:'loginController'
			})
			.state(
		'home.main',{
			url:'/main',
			templateUrl:'templates/main.html'
			})
			.state(
		'notfound',{
			url:'/notfound',
			templateUrl:'templates/notfound.html'
			});
			$urlRouterProvider.otherwise('/notfound')
		});
	angular.module('starter-controlller',[]).
	controller('loginController',['$scope','OAuth', function($scope, OAuth){
		$scope.login = function(){
			OAuth.getAccessToken($scope.user)
				.then(function(data){
					alert('funfou');
					}, function(responseError){
						
						});
			}
		
	}]);