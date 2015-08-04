define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('ConfigurationCommandFactory', function($http) {
            return {
                list: function() {
                    var url = config.get().home + '/api/configuration/commands';
                    return implement.httpGetServiceImpl($http, url);
                },
                save: function(params) {
                    var url = config.get().home + '/api/configuration/commands';
                    return implement.httpServiceImpl($http, 'POST', params, url);
                },
                remove: function(uuid) {
                    var url = config.get().home + '/api/configuration/commands/' + uuid;
                    return implement.httpDeleteServiceImpl($http, url);
                },
            }
        });
    }
);