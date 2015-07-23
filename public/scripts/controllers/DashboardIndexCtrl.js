define(['./module'],
    function(app) {
        'use strict';

        app.controller('DashboardIndexCtrl', [
            '$scope', '$state',
            function($scope, $state) {
                alert('test');
            }
        ]);
    }
);