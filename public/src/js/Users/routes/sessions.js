'use strict';

angular.module('Saphira.users')
    .config(['$stateProvider',function($stateProvider) {

        console.log('Console.log from session routes.', $stateProvider
        );
       // States for the session
        $stateProvider
            .state('session', {
                abstract: true,
                templateUrl: '/dist/templates/users/views/session.html',
                resolve: {
                    isloggedin: function(Sessions) {
                        return Sessions.isLoggedIn();
                    }
                }
            })
            .state('session.signin', {
                url: '/user/signin',
                templateUrl: '/dist/templates/users/views/signin.html',
                controller: 'SessionSigninController'
            })
            .state('session.register', {
                url: '/user/register',
                templateUrl: '/dist/templates/users/views/signup.html',
                controller: 'SessionRegisterController'
            })
            .state('session.password', {
                url: '/user/forgot-password',
                templateUrl: '/dist/templates/users/views/forgot-password.html',
                controller: 'SessionForgotPasswordController'
            })
            .state('session.register-thanks', {
                url: '/user/forgot-thanks',
                templateUrl: '/dist/templates/users/views/forgot-thanks.html'
            })
            .state('session.reset-thanks', {
                url: '/user/reset-thanks',
                templateUrl: '/dist/templates/users/views/reset-thanks.html'
            });
    }]
    );