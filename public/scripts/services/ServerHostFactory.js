define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('ServerHostFactory', function($http) {
            return {
                list: function(status) {
                    var url = config.get().home + '/api/v1/server/hosts?status=' + status;
                    return implement.httpGetServiceImpl($http, url);
                },
                show: function(host_name) {
                    var url = config.get().home + '/api/v1/server/hosts/' + host_name;
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);