define(['./module'],
    function(app) {
        'use strict';

        app.controller('ConfigurationCommandListCtrl', [
            '$scope', '$state', 'ConfigurationCommandFactory',
            function($scope, $state, ConfigurationCommandFactory) {
                function getList(scope) {
                    ConfigurationCommandFactory.list()
                        .then(function(data) {
                            scope.commands = data;
                        });
                };

                $scope.createCommand = function() {
                    $state.go('configurationCommandCreation');
                };

                $scope.editCommand = function(uuid) {
                    $state.go('configurationCommandEdit', {uuid: uuid});
                };

                $scope.deleteCommand = function(uuid) {
                    ConfigurationCommandFactory.remove(uuid)
                        .success(function(data) {
                            getList($scope);
                        });
                };

                getList($scope);
            }
        ]);
    }
);