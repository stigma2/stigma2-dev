define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerServiceListCtrl', [
            '$scope', '$state', 'ServerServiceFactory',
            function($scope, $state, ServerServiceFactory) {
                ServerServiceFactory.list()
                    .then(function(data) {
                        $scope.services = data;
                    });
            }
        ]);
    }
);