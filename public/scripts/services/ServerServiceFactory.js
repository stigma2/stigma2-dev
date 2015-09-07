define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('ServerServiceFactory', function($http) {
            return {
                list: function(status) {
                    var url = config.get().home + '/api/server/services?status=' + status;
                    return implement.httpGetServiceImpl($http, url);
                },
                create: function() {
                    var url = config.get().home + '/api/server/services/create';
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);