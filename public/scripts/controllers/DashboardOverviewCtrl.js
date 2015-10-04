define(['./module'],
    function(app) {
        'use strict';

        app.controller('DashboardOverviewCtrl', [
            '$scope', '$state', 'DashboardFactory',
            function($scope, $state, DashboardFactory) {
            	function renderSystemStatus() {
            		DashboardFactory.getSystemStatus()
            			.then(function(response) {
                            $scope.system_status = response;
                        });
            	};

            	function renderHostStatus() {
            		DashboardFactory.getHostStatus()
            			.then(function(response) {
                            $scope.host_status = response.data.count;
                        });
            	};

            	function renderServiceStatus() {
            		DashboardFactory.getServiceStatus()
            			.then(function(response) {
            				console.log(response);
                            $scope.service_status = response.data.count;
                        });
            	};

            	renderSystemStatus();
            	renderHostStatus();
            	renderServiceStatus();
            }
        ]);
    }
);