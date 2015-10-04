define(['./module'],
    function(app) {
        'use strict';

        app.controller('ReportGraphCtrl', [
            '$scope', '$state', '$sce', 'DashboardFactory',
            function($scope, $state, $sce, DashboardFactory) {
                function getDashboard(dashboard) {
                    DashboardFactory.getDashboard(dashboard)
                        .then(function(response) {
                            $scope.grafanaUrl = $sce.trustAsResourceUrl(response);
                        });
                };

                getDashboard('REPORT_GRAPH');
            }
        ]);
    }
);