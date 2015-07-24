define(['./module'],
    function(app) {
        'use strict';

        app.controller('TopBarDemoCtrl', [
            '$scope', '$state',
            function($scope, $state) {
                alert('TopBarDemoCtrl alert');
            }
        ]);
    }
);