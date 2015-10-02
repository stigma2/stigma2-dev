define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerServiceListCtrl', [
            '$scope', '$state', 'ServerServiceFactory', 'TimestampFormatFactory',
            function($scope, $state, ServerServiceFactory, TimestampFormatFactory) {
                function services(status) {
                    ServerServiceFactory.list(status)
                        .then(function(response) {
                            $scope.services = response.data.servicelist;
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

                $scope.detailHost = function(name) {
                    $state.go('serverHostDetail', {name: name});
                };

                $scope.detailService = function(name, servicedescription) {
                    $state.go('serverServiceDetail', {name: name, servicedescription: servicedescription});
                };

                $scope.convertDate = function(timestamp) {
                    return TimestampFormatFactory.convertDateToYYYYMMDDhhmmss(timestamp);
                };

                $scope.getDuration = function(timestamp) {
                    return TimestampFormatFactory.getDurationToNow(timestamp);
                };
                
                services('');
            }
        ]);
    }
);