define(['./module'],
    function(app) {
        'use strict';

        app.controller('DashboardIndexCtrl', [
            '$scope', '$state',
            function($scope, $state) {
                $scope.tabs = [
                    { title: "General", route: "dashboard.overview", active: false },
                    { title: "GlusterFS", route: "dashboard.glusterfs", active: false }
                ];

                // $scope.active = function(route) {
                //     return $state.is(route);
                // };

                // $scope.$on('$stateChangeSuccess', function() {
                //     $scope.tabs.forEach(function(tab) {
                //         tab.active = $scope.active(tab.route);
                //     });
                // });
            }
        ]);
    }
);