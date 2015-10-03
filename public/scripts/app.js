define(['angular', 'mm.foundation', 'ui.router', './controllers/index', './services/index', 'modernizr'],
    function(angular) {
        'use strict';

        return angular.module('app', [
            'mm.foundation',
            'ui.router',
            'app.controllers',
            'app.services',
        ]);
    }
);
