define(['./module'],
    function(app) {
        'use strict';

        app.controller('ConfigurationCommandCreationCtrl', [
            '$scope', '$state', 'ConfigurationCommandFactory',
            function($scope, $state, ConfigurationCommandFactory) {
                $scope.commandData = {};

                $scope.saveCommand = function() {
                    ConfigurationCommandFactory.save($scope.commandData)
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
            }
        ]);
    }
);