define(['./module', 'angular'],
    function(app, angular) {
        'use strict';

        app.controller('ServerHostListCtrl', [
            '$scope', '$state', 'ServerHostFactory',
            function($scope, $state, ServerHostFactory) {
                function hosts(type) {
                    ServerHostFactory.list(type)
                        .then(function(data) {
                            $scope.hosts = data;
                        });
                };

                $scope.hostsFilter = function(filter, element) {
                    // hosts(filter);
                    console.log(filter);
                };
                
                hosts('0');
            }
        ]);
    }
);