define(['./module'],
    function(services) {
        'use strict';

        services.factory('TimerFactory', function() {
            return {
                interval: function($scope, $interval) {
                    var timer;
                    if (angular.isDefined(timer)) return;

                    timer = $interval(function() {
                        $scope.init();
                    }, $scope.intervalTime);

                    function stop() {
                        if (angular.isDefined(timer)) {
                            $interval.cancel(timer);
                            timer = undefined;
                        }
                    };

                    $scope.$on('$destroy', function() {
                        stop();
                    });
                }
            };
        });
    }
);