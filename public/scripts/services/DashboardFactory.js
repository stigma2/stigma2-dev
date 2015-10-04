define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('DashboardFactory', function($http) {
            return {
                getDashboard: function(dashboard) {
                    var url = config.get().home + '/api/v1/dashboard/graph/' + dashboard;
                    return implement.httpGetServiceImpl($http, url);
                },
                getSystemStatus: function() {
                    var url = config.get().home + '/api/v1/dashboard/systemstatus';
                    return implement.httpGetServiceImpl($http, url);
                },
                getHostStatus: function() {
                    var url = config.get().home + '/api/v1/dashboard/hoststatus';
                    return implement.httpGetServiceImpl($http, url);
                },
                getServiceStatus: function() {
                    var url = config.get().home + '/api/v1/dashboard/servicestatus';
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);