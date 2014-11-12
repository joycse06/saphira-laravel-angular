angular.module('Saphira')
.controller('LoginCtrl', ['$scope','$alert','$auth', function($scope, $alert, $auth) {
        $scope.login = function() {
            $auth.login({email: $scope.email, password: $scope.password})
                .then(function() {
                    $alert({
                        content: 'You have successfully Logged in',
                        animation: 'fadeZoomFadeDown',
                        type : 'material',
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
    }]);
