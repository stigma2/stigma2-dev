define(['./module'],
    function(app) {
        'use strict';

        app.controller('ConfigurationHostCreationCtrl', [
            '$scope', '$state', 'ConfigurationHostFactory',
            function($scope, $state, ConfigurationHostFactory) {
                $scope.hostData = {};

                $scope.saveCommand = function() {
                    ConfigurationHostFactory.save($scope.hostData)
                        .success(function(data) {
                            $state.go('configurationHostList');
                        })
                        .error(function(data) {
                            console.log(data);
                        });
                };

                $scope.cancel = function() {
                    $state.go('configurationHostList');
                };

                ConfigurationHostFactory.create()
                    .then(function(data) {
                        $scope.use = data.use;
                        $scope.unused = data.unused;
                    });
            }
        ]);
    }
);