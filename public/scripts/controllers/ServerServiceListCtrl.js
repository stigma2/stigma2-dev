define(['./module'],
    function(app) {
        'use strict';

        app.controller('ServerServiceListCtrl', [
            '$scope', '$state', 'ServerServiceFactory',
            function($scope, $state, ServerServiceFactory) {
                function services(status) {
                    ServerServiceFactory.list(status)
                        .then(function(data) {
                            $scope.services = data;
                        });
                };

                $scope.servicesFilter = function(filter, event) {
                    services(filter);

                    var dl = document.getElementsByClassName('sub-nav');
                    var wrappedDl = angular.element(dl);
                    wrappedDl.find('dd').removeClass('active');

                    var target = angular.element(event.target);
                    var dd = target.parent();
                    dd.addClass('active');
                };
                
                services('');
            }
        ]);
    }
);