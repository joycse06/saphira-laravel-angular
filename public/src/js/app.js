angular.module('Saphira', [
        'ngResource',
        'ngMessages',
        'ui.router',
        'mgcrea.ngStrap',
        'satellizer'
    ])

.config(['$stateProvider','$urlRouterProvider','$authProvider',function($stateProvider, $urlRouterProvider, $authProvider) {
       $stateProvider
           .state('home', {
               url: '/',
               templateUrl: '/dist/templates/home/index.html'
           })
           .state('login', {
               url: '/login',
               templateUrl: '/dist/templates/users/login.html',
               controller: 'LoginCtrl'
           })
           .state('signup',{
               url: '/signup',
               templateUrl: '/dist/templates/users/signup.html',
               controller: 'SignupCtrl'
           })
           .state('logout', {
               url: '/logout',
               template: null,
               controller: 'LogoutCtrl'
           })
           .state('profile', {
               url: '/profile',
               templateUrl: '/dist/templates/users/profile',
               controller: 'ProfileCtrl',
               resolve: {
                   authenticated: ['$location', '$auth', function($location, $auth){
                       if(!$auth.isAuthenticated()){
                           return $location.path('/login');
                       }
                   }]
               }
           });

        $urlRouterProvider.otherwise('/');

    }]);