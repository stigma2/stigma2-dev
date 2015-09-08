define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerServiceShowCtrl', [
            '$scope', '$state', 'ServerServiceFactory',
            function($scope, $state, ServerServiceFactory) {
                $scope.cancel = function() {
                    $state.go('serverServiceList');
                };

                ServerServiceFactory.show($state.params.service_name)
                    .then(function(data) {
                        $scope.service = data;
                    });
            }
        ]);
    }
);