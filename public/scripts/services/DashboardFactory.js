define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('DashboardFactory', function($http) {
            return {
                getDashboard: function(dashboard) {
                    var url = config.get().home + '/api/v1/dashboard/' + dashboard;
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);