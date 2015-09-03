define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerHostListCtrl', [
            '$scope', '$state', 'ServerHostFactory',
            function($scope, $state, ServerHostFactory) {
                ServerHostFactory.list()
                    .then(function(data) {
                        $scope.hosts = data;
                    });
            }
        ]);
    }
);