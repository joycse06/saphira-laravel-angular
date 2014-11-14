'use strict';

angular.module('Saphira.users', ['ui.router', 'mgcrea.ngStrap', 'satellizer','restangular'])
.constant('PAGINATOR', {size: 2, range: 5});
//    .config(['Restangular', function(Restangular){
//        Restangular.setBaseUrl('/api/v1');
//    }]);