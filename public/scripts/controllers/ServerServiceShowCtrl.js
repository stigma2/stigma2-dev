define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerServiceShowCtrl', [
            '$scope', '$state', 'ServerServiceFactory',
            function($scope, $state, ServerServiceFactory) {
                $scope.cancel = function() {
                    $state.go('serverServiceList');
                };

                ServerServiceFactory.show($state.params.name, $state.params.servicedescription)
                    .then(function(response) {
                        console.log(response);
                        $scope.service = response.data.service;
                    });
            }
        ]);
    }
);