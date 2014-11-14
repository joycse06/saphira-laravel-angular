'use strict';

angular.module('Saphira', [
        'Saphira.system',
        'Saphira.users',
        'satellizer'
    ])

.config(['$locationProvider','$httpProvider', function($locationProvider, $httpProvider) {
        $locationProvider.hashPrefix('!');
        $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest"
    }])
    .run(['$rootScope',function($rootScope){ // put the event handlers here
        $rootScope.$on('$stateChangeStart',function(event, toState, toParams, fromState, fromParams){
            console.log('$stateChangeStart to '+toState.to+'- fired when the transition begins. toState,toParams : \n',toState, toParams);
        });

        $rootScope.$on('$stateChangeError',function(event, toState, toParams, fromState, fromParams){
            console.log('$stateChangeError - fired when an error occurs during transition.');
            console.log(arguments);
        });

        $rootScope.$on('$stateChangeSuccess',function(event, toState, toParams, fromState, fromParams){
            console.log('$stateChangeSuccess to '+toState.name+'- fired once the state transition is complete.');
        });

        $rootScope.$on('$viewContentLoaded',function(event){
            console.log('$viewContentLoaded - fired after dom rendered',event);
        });

        $rootScope.$on('$stateNotFound',function(event, unfoundState, fromState, fromParams){
            console.log('$stateNotFound '+unfoundState.to+'  - fired when a state cannot be found by its name.');
            console.log(unfoundState, fromState, fromParams);
        });
    }])
    .controller('NavbarCtrl',['$scope', '$auth', function($scope, $auth) {
        $scope.isAuthenticated = function() {
//            console.log('Hello This is from isAuthenticated.', $auth.isAuthenticated());
            return $auth.isAuthenticated();
        };
    }]);
