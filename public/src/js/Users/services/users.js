'use strict';

// Users service used for users Rest Endpoint

angular.module('Saphira.users')
//    .config(['Restangular', function(Restangular){
//        Restangular.setBaseUrl('/api/v1');
//    }])
    .factory('Users', ['Restify', function(Restify) {
        function Users() {

            this.account = function(id){
                return this.one(id).one('account');
            };
            this.password = function(id){
                return this.one(id).one('password');
            };

            this.forgot = function(data){
                return this.all('users/forgot').post(data);
            };
            this.suspend = function(id){
                return this.one(id).one('suspend');
            };
            this.unsuspend = function(id){
                return this.one(id).one('unsuspend');
            };
            this.ban = function(id){
                return this.one(id).one('ban');
            };
            this.unban = function(id){
                return this.one(id).one('unban');
            };
        }

        return angular.extend(Restify('users'), new Users());
    }]);