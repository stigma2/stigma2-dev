define(['./module'],
    function(app) {
        'use strict';

        app.controller('IndexCtrl', [
            '$scope', '$state',
            function($scope, $state) {
                $scope.revealIconBar = true;

                $scope.toggleIconBar = function() {
                    $scope.revealIconBar = !$scope.revealIconBar;
                };
            }
        ]);
    }
);