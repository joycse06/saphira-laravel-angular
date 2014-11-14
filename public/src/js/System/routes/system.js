'use strict';

// Set up the home page route

angular.module('Saphira.system')
    .config(['$stateProvider', '$urlRouterProvider',
        function($stateProvider, $urlRouterProvider) {
          $urlRouterProvider.otherwise('/');
            $stateProvider
                .state('home', {
                    url: '/',
                    templateUrl: '/dist/templates/System/views/home.html',
                    controller: 'SystemController'
                })
        }
    ]);