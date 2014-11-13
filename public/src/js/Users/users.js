'use strict';

angular.module('Saphira.users', ['ui.router', 'mgcrea.ngStrap', 'satellizer'])
.constant('PAGINATOR', {size: 2, range: 5})
    .config(function(){
        console.log('This is a test log.');
    });