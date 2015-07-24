define(['angular', 'mm.foundation', 'ui.router', './controllers/index'],
    function(angular) {
        'use strict';

        return angular.module('app', [
            'mm.foundation',
            'ui.router',
            'app.controllers',
        ]);
    }
);
