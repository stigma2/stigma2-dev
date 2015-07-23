define(['angular', 'ui.router', './controllers/index'],
    function(angular) {
        'use strict';

        return angular.module('app', [
            'ui.router',
            'app.controllers',
        ]);
    }
);
