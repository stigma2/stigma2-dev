define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('ConfigurationCommandFactory', function($http) {
            return {
                list: function() {
                    var url = config.get().home + '/api/configuration/commands';
                    return implement.httpGetServiceImpl($http, url);
                },
            }
        });
    }
);