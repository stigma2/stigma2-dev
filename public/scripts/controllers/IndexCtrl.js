define(['./module', 'foundation'],
    function(app) {
        'use strict';

        app.controller('IndexCtrl', [
            '$rootScope', '$scope', '$state',
            function($rootScope, $scope, $state) {
                function initConfigration() {
                    $rootScope.refreshInterval = "15000";
                    $rootScope.overviewEventDurationDate = "7";
                };

                $scope.openIndexConfigArea = function() {
                    $('div#indexConfigArea').foundation('reveal', 'open');
                    $scope.refreshInterval = $rootScope.refreshInterval;
                };

                $scope.setOverviewEventDurationDate = function() {
                    $rootScope.overviewEventDurationDate = $scope.overviewEventDurationDate;
                    $state.reload();
                };

                $scope.setRefreshInterval = function() {
                    $rootScope.refreshInterval = $scope.refreshInterval;
                    $state.reload();
                };

                initConfigration();
            }
        ]);
    }
);