define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('ConfigurationHostFactory', function($http) {
            return {
                list: function() {
                    var url = config.get().home + '/api/configuration/hosts';
                    return implement.httpGetServiceImpl($http, url);
                },
                create: function() {
                    var url = config.get().home + '/api/configuration/hosts/create';
                    return implement.httpGetServiceImpl($http, url);
                },
                save: function(params) {
                    var url = config.get().home + '/api/configuration/hosts';
                    return implement.httpServiceImpl($http, 'POST', params, url);
                },
                edit: function(uuid) {
                    var url = config.get().home + '/api/configuration/hosts/' + uuid + '/edit';
                    return implement.httpGetServiceImpl($http, url);
                },
                update: function(params, uuid) {
                    var url = config.get().home + '/api/configuration/hosts/' + uuid;
                    return implement.httpServiceImpl($http, 'PUT', params, url);
                },
                remove: function(uuid) {
                    var url = config.get().home + '/api/configuration/hosts/' + uuid;
                    return implement.httpDeleteServiceImpl($http, url);
                },
            }
        });
    }
);