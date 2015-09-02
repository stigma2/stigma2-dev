define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('ServerServiceFactory', function($http) {
            return {
                list: function() {
                    var url = config.get().home + '/api/server/services';
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