define(['./module'],
    function(app) {
        'use strict';

        app.controller('DashboardOverviewCtrl', [
            '$scope', '$state', '$interval', 'DashboardFactory', 'TimerFactory', 'TimestampFormatFactory',
            function($scope, $state, $interval, DashboardFactory, TimerFactory, TimestampFormatFactory) {
                $scope.intervalTime = 10000;
                $scope.eventDurationDate = 7;

                $scope.init = function() {
                    renderSystemStatus();
                    renderHostStatus();
                    renderServiceStatus();
                    renderHostEvent();
                    renderServiceEvent();
                };

                function renderSystemStatus() {
                    DashboardFactory.getSystemStatus()
                        .then(function(response) {
                            $scope.system_status = response;
                        });
                };

                function renderHostStatus() {
                    DashboardFactory.getHostStatus()
                        .then(function(response) {
                            $scope.host_last_data_update = response.result.last_data_update;
                            $scope.host_status = response.data.count;
                        });
                };

                function renderServiceStatus() {
                    DashboardFactory.getServiceStatus()
                        .then(function(response) {
                            $scope.service_last_data_update = response.result.last_data_update;
                            $scope.service_status = response.data.count;
                        });
                };

                function renderHostEvent() {
                    var endtime = parseInt(new Date().getTime() / 1000);
                    var starttime = endtime - (86400 * $scope.eventDurationDate);

                    DashboardFactory.getEvent('host', starttime, endtime)
                        .then(function(response) {
                            $scope.host_event = response.data.alertlist;
                        });
                };

                function renderServiceEvent() {
                    var endtime = parseInt(new Date().getTime() / 1000);
                    var starttime = endtime - (86400 * $scope.eventDurationDate);

                    DashboardFactory.getEvent('service', starttime, endtime)
                        .then(function(response) {
                            $scope.service_event = response.data.alertlist;
                        });
                };

                $scope.convertDate = function(timestamp) {
                    return TimestampFormatFactory.convertDateToYYYYMMDDhhmmss(timestamp);
                };

                $scope.init();

                TimerFactory.interval($scope, $interval);
            }
        ]);
    }
);