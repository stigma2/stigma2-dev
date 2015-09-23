define(['./implement', './module', '../config'],
    function(implement, services, config) {
        'use strict';

        services.factory('ServerHostFactory', function($http) {
            return {
                list: function(status) {
                    var url = config.get().home + '/api/server/hosts?status=' + status;
                    return implement.httpGetServiceImpl($http, url);
                },
                show: function(host_name) {
                    var url = config.get().home + '/api/server/hosts/' + host_name;
                    return implement.httpGetServiceImpl($http, url);
                },
                live: function() {
                    var url = 'http://106.243.134.121:3000';
                    return $http({
                        method: 'GET',
                        url: url,
                        headers: {
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer eyJrIjoiWGNIbGp4d3F1blpJRTY5dFY1MjZ1VkdDVmt3eXppMTkiLCJuIjoidGVzdDIiLCJpZCI6MX0='
                        },
                        dataType: 'jsonp',
                        crossDomain: true
                        // headers: { 'Content-Type' : 'application/x-www-form-urlencoded' },
                        // data: $.param(params)
                    });
                    // $http.defaults.headers.common.Authorization = 'Bearer eyJrIjoiWGNIbGp4d3F1blpJRTY5dFY1MjZ1VkdDVmt3eXppMTkiLCJuIjoidGVzdDIiLCJpZCI6MX0=';
                },
            }
        });
    }
);