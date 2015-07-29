define(['./module'],
    function(app) {
        'use strict';

        app.controller('TopBarCtrl', [
            '$scope', '$state',
            function($scope, $state) {
                $scope.toggleIconBar = function() {
                    alert('toggleIconBar');
                };
            }
        ]);
    }
);