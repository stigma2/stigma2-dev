require.config({
    baseUrl: 'scripts',
    paths: {
        'angular': '/bower_components/angular/angular.min',
        'ui.router': '/bower_components/angular-ui-router/release/angular-ui-router.min',
        'cryptojslib': '/bower_components/cryptojslib/rollups/hmac-sha256',
    },
    shim: {
        'angular': {
            exports: 'angular'
        },
        'ui.router': {
            deps: ['angular']
        },
        'cryptojslib': {
            exports: 'CryptoJS'
        },
    }
});

define(['require', 'angular', 'app', 'routes'],
    function(require, angular) {
        'use strict';

        angular.bootstrap(document, ['app']);
    }
);
