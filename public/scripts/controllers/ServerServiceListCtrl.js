define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerServiceListCtrl', [
            '$scope', '$state', 'ServerServiceFactory',
            function($scope, $state, ServerServiceFactory) {
                function services(status) {
                    ServerServiceFactory.list(status)
                        .then(function(data) {
                            $scope.services = data;
                        });
                };

                $scope.servicesFilter = function(filter, event) {
                    services(filter);

                    var dl = document.getElementsByClassName('sub-nav');
                    var wrappedDl = angular.element(dl);
                    wrappedDl.find('dd').removeClass('active');

                    var target = angular.element(event.target);
                    var dd = target.parent();
                    dd.addClass('active');
                };

                $scope.detailHost = function(host_name) {
                    $state.go('serverHostDetail', {host_name: host_name});
                };

                $scope.detailService = function(service_name) {
                    $state.go('serverServiceDetail', {service_name: service_name});
                };
                
                services('');
            }
        ]);
    }
);