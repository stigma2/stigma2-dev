define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('ServerHostFactory', function($http) {
            return {
                list: function() {
                    var url = config.get().home + '/api/server/hosts';
                    return implement.httpGetServiceImpl($http, url);
                },
                create: function() {
                    var url = config.get().home + '/api/server/hosts/create';
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);