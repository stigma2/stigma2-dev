define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerHostListCtrl', [
            '$scope', '$state', 'ServerHostFactory', 'TimestampFormatFactory',
            function($scope, $state, ServerHostFactory, TimestampFormatFactory) {
                function hosts(status) {
                    ServerHostFactory.list(status)
                        .then(function(response) {
                            $scope.hosts = response.data.hostlist;
                        });
                };

                $scope.isEmptyObject = function(obj) {
                    return Object.keys(obj).length;
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

                $scope.detailHost = function(name) {
                    $state.go('serverHostDetail', {name: name});
                };

                $scope.convertDate = function(timestamp) {
                    return TimestampFormatFactory.convertDateToYYYYMMDDhhmmss(timestamp);
                };

                $scope.getDuration = function(timestamp) {
                    return TimestampFormatFactory.getDurationToNow(timestamp);
                };
                
                hosts('');
            }
        ]);
    }
);