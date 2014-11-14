angular.module('Saphira.users')
    .factory('Sessions', ['$http', '$auth',
        function($http, $auth) {
            return {
                isLoggedIn: function() {
                    return $auth.isAuthenticated();
                }
            }
        }
    ])