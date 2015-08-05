define(['./module'],
    function(app) {
        'use strict';

        app.controller('ConfigurationCommandEditCtrl', [
            '$scope', '$state', 'ConfigurationCommandFactory',
            function($scope, $state, ConfigurationCommandFactory) {
                $scope.commandData = {};

                $scope.updateCommand = function(uuid) {
                    ConfigurationCommandFactory.update($scope.commandData, uuid)
                        .success(function(data) {
                            $state.go('configurationCommandList');
                        })
                        .error(function(data) {
                            console.log(data);
                        });
                };

                $scope.cancel = function() {
                    $state.go('configurationCommandList');
                };

                ConfigurationCommandFactory.edit($state.params.uuid)
                    .then(function(data) {
                        $scope.commandData = data;
                    });
            }
        ]);
    }
);