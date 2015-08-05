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
                edit: function(uuid) {
                    var url = config.get().home + '/api/configuration/commands/' + uuid + '/edit';
                    return implement.httpGetServiceImpl($http, url);
                },
                update: function(params, uuid) {
                    var url = config.get().home + '/api/configuration/commands/' + uuid;
                    return implement.httpServiceImpl($http, 'PUT', params, url);
                },
                remove: function(uuid) {
                    var url = config.get().home + '/api/configuration/commands/' + uuid;
                    return implement.httpDeleteServiceImpl($http, url);
                },
            }
        });
    }
);