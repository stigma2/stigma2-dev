define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('ServerServiceFactory', function($http) {
            return {
                list: function(status) {
                    var url = config.get().home + '/api/v1/server/services?status=' + status;
                    return implement.httpGetServiceImpl($http, url);
                },
                show: function(service_name) {
                    var url = config.get().home + '/api/v1/server/services/' + service_name;
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);