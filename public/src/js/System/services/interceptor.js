//angular.module('Saphira.system')
//    .factory('httpInterceptor', ['$q', '$state','$alert',
//        function($q, $state, $alert) {
//            var canceller = $q.defer();
//
//            return {
//                'request' : function(config){
//                    config.timeout = canceller.promise;
//                    return config;
//                },
//                'response' : function(response) {
//                    return response;
//                },
//                'responseError' : function(rejection) {
//                    if(rejection.status === 401) {
//                        canceller.resolve('Unauthorized');
//                        $alert({
//                            content: 'You are not authorized to access this page',
//                            animation: 'fadeZoomFadeDown',
//                            type: 'material',
//                            duration: 3
//                        });
//                        $state.go('session.signin');
//                    }
//
//                    if(rejection.status === 403){
//                        canceller.resolve('Forbidden');
//                        $alert({
//                            content: "You don't have permission to access this page.",
//                            animation: 'fadeZoomFadeDown',
//                            type: 'material',
//                            duration: 3
//                        });
//                        $state.go('home');
//                    }
//                    return $q.reject(rejection);
//                }
//            }
//        }])
//    .config(['$httpProvider', function($httpProvider){
//        $httpProvider.interceptors.push('httpInterceptor');
//    }])
//;