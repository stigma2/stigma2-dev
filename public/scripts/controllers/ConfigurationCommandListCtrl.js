define(['./module'],
    function(app) {
        'use strict';

        app.controller('ConfigurationCommandListCtrl', [
            '$scope', '$state', 'ConfigurationCommandFactory',
            function($scope, $state, ConfigurationCommandFactory) {
                $scope.createCommand = function() {
                    $state.go('configurationCommandCreation');
                };
                
                ConfigurationCommandFactory.list()
                    .then(function(data) {
                        $scope.commands = data;
                    });
            }
        ]);
    }
);