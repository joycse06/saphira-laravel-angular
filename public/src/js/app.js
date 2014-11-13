'use strict';

angular.module('Saphira', [
        'Saphira.system',
        'Saphira.users'
    ])

.config(['$locationProvider', function($locationProvider) {
        $locationProvider.hashPrefix('!');
    }]);