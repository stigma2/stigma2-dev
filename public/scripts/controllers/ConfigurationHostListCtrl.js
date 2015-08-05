define(['./module'],
    function(app) {
        'use strict';

        app.controller('ConfigurationHostListCtrl', [
            '$scope', '$state', 'ConfigurationHostFactory',
            function($scope, $state, ConfigurationHostFactory) {
                function getList(scope) {
                    ConfigurationHostFactory.list()
                        .then(function(data) {
                            scope.hosts = data;
                        });
                };

                $scope.createHost = function() {
                    $state.go('configurationHostCreation');
                };

                // $scope.editHost = function(uuid) {
                //     $state.go('configurationHostEdit', {uuid: uuid});
                // };

                // $scope.deleteHost = function(uuid) {
                //     ConfigurationHostFactory.remove(uuid)
                //         .success(function(data) {
                //             getList($scope);
                //         });
                // };

                getList($scope);
            }
        ]);
    }
);