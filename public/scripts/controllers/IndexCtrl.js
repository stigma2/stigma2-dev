define(['./module', 'foundation'],
    function(app) {
        'use strict';

        app.controller('IndexCtrl', [
            '$scope', '$state',
            function($scope, $state) {
                $scope.openIndexConfigArea = function() {
                    $('div#indexConfigArea').foundation('reveal', 'open');
                };
            }
        ]);
    }
);