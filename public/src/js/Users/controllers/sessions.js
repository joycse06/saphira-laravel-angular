'use strict';

angular.module('Saphira.users')
    .controller('SessionSigninController', ['$scope', '$rootScope', '$auth', '$alert', '$state',
        function($scope, $rootScope, $auth, $alert, $state) {

            $scope.user = {};
            $scope.errors = [];

            $scope.login = function() {
                $auth.login({ email: $scope.email, password: $scope.password })
                    .then(function() {
                        $alert({
                            content: 'You have successfully logged in',
                            animation: 'fadeZoomFadeDown',
                            type: 'material',
                            duration: 3
                        });
                    })
                    .catch(function(response) {
                        $alert({
                            content: response.data.message,
                            animation: 'fadeZoomFadeDown',
                            type: 'material',
                            duration: 3
                        });
                    });
            };

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

            $scope.signup = function() {
                $auth.signup({
                    displayName: $scope.displayName,
                    username: $scope.username,
                    email: $scope.email,
                    password: $scope.password,
                    password_confirmation: $scope.confirm_password
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
    .controller('SessionSignoutController', ['$state','$auth', '$alert',
        function($state, $auth, $alert) {
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
                    $state.go('session.signin');
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