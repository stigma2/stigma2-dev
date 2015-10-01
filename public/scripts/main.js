require.config({
    baseUrl: 'scripts',
    paths: {
        'jquery': '/bower_components/jquery/dist/jquery.min',
        'modernizr': '/bower_components/modernizr/modernizr',
        'angular': '/bower_components/angular/angular.min',
        'ui.router': '/bower_components/angular-ui-router/release/angular-ui-router.min',
        'CryptoJS': '/bower_components/cryptojslib/rollups/hmac-sha256',
        'mm.foundation': '/bower_components/angular-foundation/mm-foundation-tpls.min',
        'ngDraggable': '/bower_components/ngDraggable/ngDraggable',
    },
    shim: {
        'jquery': {
            exports: 'jquery'
        },
        'modernizr': {
            deps: ['jquery']
        },
        'angular': {
            exports: 'angular'
        },
        'ui.router': {
            deps: ['angular']
        },
        'mm.foundation': {
            deps: ['angular']
        },
        'ngDraggable': {
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
