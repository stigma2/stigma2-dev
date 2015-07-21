require.config({
    baseUrl: 'scripts',
    paths: {
        'angular': '/bower_components/angular/angular.min',
        'ui.router': '/bower_components/angular-ui-router/release/angular-ui-router.min',
    },
    shim: {
        'angular': {
            exports: 'angular'
        },
        'ui.router': {
            deps: ['angular']
        },
    }
});

define(['require', 'angular', 'app'],
    function(require, angular) {
        'use strict';

        angular.bootstrap(document, ['app']);
    }
);
