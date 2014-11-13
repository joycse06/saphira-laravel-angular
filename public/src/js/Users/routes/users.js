'use strict';

angular.module('Saphira.users')
    .config(['$stateProvider', function($stateProvider){

        console.log('Console.log from users routes.');
        // states for Users
        $stateProvider
            .state('users',{
                abstract: true,
                templateUrl: '/dist/templates/users/views/users.html',
                resolve: {
                    isloggedin: function(Sessions){
                        return Sessions.isLoggedIn();
                    }
                }
            })
            .state('users.account', {
                url: '/user/account/:id',
                templateUrl: '/dist/templates/users/views/account',
                resolve: {
                    user: function(Users, $stateParams) {
                        return Users.get($stateParams.id)
                    }
                },
                controller: 'UserAccountController'
            })
            .state('users.password', {
                url: '/user/password/:id',
                templateUrl: '/dist/templates/users/views/password.html',
                resolve: {
                    user: function(Users, $stateParams) {
                        return Users.get($stateParama.id)
                    }
                },
                controller: 'UserPasswordController'

            })


    }
    ]);