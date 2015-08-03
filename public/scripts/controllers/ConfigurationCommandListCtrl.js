define(['./module'],
    function(app) {
        'use strict';

        app.controller('ConfigurationCommandListCtrl', [
            '$scope', '$state', 'ConfigurationCommandFactory',
            function($scope, $state, ConfigurationCommandFactory) {
                ConfigurationCommandFactory.list()
                    .then(function(data) {
                        $scope.commands = data;
                    });
            }
        ]);
    }
);