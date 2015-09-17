define(['./module', 'angular'],
    function(app, angular) {
        'use strict';

        app.controller('ServerHostListCtrl', [
            '$scope', '$state', 'ServerHostFactory', 'TimestampFormatFactory',
            function($scope, $state, ServerHostFactory, TimestampFormatFactory) {
                function hosts(status) {
                    ServerHostFactory.list(status)
                        .then(function(response) {
                            var res = JSON.parse(response);
                            $scope.hosts = res.data.hostlist;
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

                $scope.detailHost = function(host_name) {
                    $state.go('serverHostDetail', {host_name: host_name});
                };

                $scope.convertDate = function(timestamp) {
                    return TimestampFormatFactory.convertDateToYYYYMMDDhhmmss(timestamp);
                };
                
                hosts('');
            }
        ]);
    }
);