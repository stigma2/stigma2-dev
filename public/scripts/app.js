define(['angular', 'mm.foundation', 'ui.router', './controllers/index', './services/index', 'modernizr'/*, 'ngDraggable'*/],
    function(angular) {
        'use strict';

        return angular.module('app', [
            'mm.foundation',
            'ui.router',
            'app.controllers',
            'app.services',
            // 'ngDraggable',
        ]);
    }
);
