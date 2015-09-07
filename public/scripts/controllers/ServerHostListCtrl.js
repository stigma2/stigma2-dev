define(['./module', 'angular'],
    function(app, angular) {
        'use strict';

        app.controller('ServerHostListCtrl', [
            '$scope', '$state', 'ServerHostFactory',
            function($scope, $state, ServerHostFactory) {
                function hosts(status) {
                    ServerHostFactory.list(status)
                        .then(function(data) {
                            $scope.hosts = data;
                        });
                };

                $scope.hostsFilter = function(filter, event) {
                    hosts(filter);

                    var dl = document.getElementsByClassName('sub-nav');
                    var wrappedDl = angular.element(dl);
                    wrappedDl.find('dd').removeClass('active');

                    var target = angular.element(event.target);
                    var dd = target.parent();
                    dd.addClass('active');
                };
                
                hosts('');
            }
        ]);
    }
);