define(['./module'],
    function(app) {
        'use strict';

        app.controller('DashboardOverviewCtrl', [
            '$scope', '$state', '$interval', 'DashboardFactory', 'TimestampFormatFactory',
            function($scope, $state, $interval, DashboardFactory, TimestampFormatFactory) {
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

            	function renderEventLog() {
            		DashboardFactory.getEventLog()
            			.then(function(response) {
            				console.log(response);
            				$scope.event_log = response;
                        });
            	};

            	function refresh() {
            		renderSystemStatus();
	            	renderHostStatus();
	            	renderServiceStatus();
	            	renderEventLog();

	            	// if(!angular.isDefined($scope)) {
            		// 	$interval.cancel(timer);
            		// 	timer = undefined;
            		// }
            	};

            	$scope.convertDate = function(timestamp) {
                    return TimestampFormatFactory.convertDateToYYYYMMDDhhmmss(timestamp);
                };

            	refresh();

    //         	var timer = $interval(function(){
				// 	refresh();
				// },10000);
            }
        ]);
    }
);