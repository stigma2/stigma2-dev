define(['./module'],
    function(app) {
        'use strict';

        app.controller('HistoryLiveCtrl', [
            '$scope', '$state', '$sce', 'DashboardFactory',
            function($scope, $state, $sce, DashboardFactory) {
                function getDashboard(dashboard) {
                    DashboardFactory.getDashboard(dashboard)
                        .then(function(response) {
                            $scope.grafanaUrl = $sce.trustAsResourceUrl(response);
                        });
                };

                getDashboard('HISTORY_LIVE');
            }
        ]);
    }
);