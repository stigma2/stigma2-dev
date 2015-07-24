require.config({
    baseUrl: 'scripts',
    paths: {
        'angular': '/bower_components/angular/angular.min',
        'ui.router': '/bower_components/angular-ui-router/release/angular-ui-router.min',
        'CryptoJS': '/bower_components/cryptojslib/rollups/hmac-sha256',
        'mm.foundation': '/bower_components/angular-foundation/mm-foundation-tpls.min',
    },
    shim: {
        'angular': {
            exports: 'angular'
        },
        'ui.router': {
            deps: ['angular']
        },
        'mm.foundation': {
            deps: ['angular']
        },
    }
});

define(['require', 'angular', 'app', 'routes'],
    function(require, angular) {
        'use strict';

        angular.bootstrap(document, ['app']);
    }
);
