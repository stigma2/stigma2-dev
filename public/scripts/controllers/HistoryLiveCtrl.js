define(['./module'],
    function(app) {
        'use strict';

        app.controller('HistoryLiveCtrl', [
            '$scope', '$state', '$sce', 'ServerHostFactory',
            function($scope, $state, $sce, ServerHostFactory) {
            	// ServerHostFactory.live()
            	// 	.then(function(response) {
             //            console.log(response);
             //        });
                $scope.grafanaUrl = $sce.trustAsResourceUrl("http://106.243.134.121:3000");
            }
        ]);
    }
);