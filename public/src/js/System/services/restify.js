angular.module('Saphira.system')
        .factory('Restify', ['Restangular', function(Restangular) {
            return function(route) {
                console.log('REstangular');
                var elements = Restangular.all(route);

                return {
                    get: function (id) {
                        return Restangular.one(route, id).get();
                    },
                    getList: function() {
                        return elements.getList();
                    },
                    post: function(data) {
                        return elements.post(data);
                    },

                    copy: function(original) {
                        return Restangular.copy(original);
                    },
                    all : function(route) {
                        return Restangular.all(route);
                    },
                    one : function(id) {
                        return Restangular.one(route, id);
                    },
                    getElements : function() {
                        return elements;
                    }

                }
            }
        }]);