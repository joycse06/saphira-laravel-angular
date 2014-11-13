'use strict';

angular.module('Saphira.users')
    .controller('SessionSigninController', ['$scope', '$rootScope', '$auth', '$alert', '$state',
        function($scope, $rootScope, $auth, $alert, $state) {

            console.log('Hello This is a test from controller');
            $scope.user = {};
            $scope.errors = [];
            $scope.authenticate = function (provider) {
                $auth.authenticate(provider)
                    .then(function() {
                        $alert({
                            content: 'You have successfully logged in',
                            animation: 'fadeZoomFadeDown',
                            type: 'material',
                            duration: 3
                        });

                    })
                    .catch(function(response){
                        $alert({
                            content: response.data.message,
                            animation: 'fadeZoomFadeDown',
                            type: 'material',
                            duration: 3
                        });
                    });
            };
        }
    ])
    .controller('SessionRegisterController', ['$rootScope', '$scope', '$auth', '$alert',
        function($rootScope, $scope, $auth, $alert){

            console.log('Hello This is a test from controller');
            $scope.signup = function() {
                $auth.signup({
                    displayName: $scope.displayName,
                    username: $scope.username,
                    email: $scope.email,
                    password: $scope.password,
                    password_confirmation: $scope.password_confirmation
                }).catch(function(response){
                        $alert({
                            content: response.data.message,
                            animation: 'fadeZoomFadeDown',
                            type: 'material',
                            duration: 3
                        });
                });
            };
        }
    ])
    .controller('SessionSignoutController', ['$auth', '$alert',
        function($auth, $alert) {
            if(!$auth.isAuthenticated()){
                return;
            }

            $auth.logout()
                .then(function() {
                    $alert({
                        content: 'You have been logged out',
                        animation: 'fadeZoomFadeDown',
                        type: 'material',
                        duration: 3
                    });
                });
        }
    ])
    .controller('SessionForgotPasswordController', ['$scope', '$state', 'Users',
        function($scope, $state, Users) {
            $scope.user = {};
            $scope.errors = [];
            $scope.save = function() {
                Users.forgot($scope.user).then(
                    function(data) {
                        if(data.success) {
                            $state.go('session.forgot-thanks')
                        }
                    }
                );
            }
        }
    ])
;