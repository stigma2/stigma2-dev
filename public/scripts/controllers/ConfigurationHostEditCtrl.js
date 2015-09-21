define(['./module'],
    function(app) {
        'use strict';

        app.controller('ConfigurationHostEditCtrl', [
            '$scope', '$state', 'ConfigurationHostFactory',
            function($scope, $state, ConfigurationHostFactory) {
                function setDraggable(scope) {
                    scope.onDropComplete1=function(data,evt){
                        var index = scope.use.indexOf(data);
                        if (index == -1)
                        scope.use.push(data);
                    }
                    scope.onDragSuccess1=function(data,evt){
                        var index = scope.use.indexOf(data);
                        if (index > -1) {
                            scope.use.splice(index, 1);
                        }
                    }
                    scope.onDragSuccess2=function(data,evt){
                        var index = scope.unused.indexOf(data);
                        if (index > -1) {
                            scope.unused.splice(index, 1);
                        }
                    }
                    scope.onDropComplete2=function(data,evt){
                        var index = scope.unused.indexOf(data);
                        if (index == -1) {
                            scope.unused.push(data);
                        }
                    }
                };

                $scope.updateHost = function() {
                    var params = {};

                    for (var i in $scope.hostData) {
                        params[i] = $scope.hostData[i];
                    }

                    ConfigurationHostFactory.update(params, $state.params.uuid)
                        .success(function(data) {
                            $state.go('configurationHostList');
                        })
                        .error(function(data) {
                            console.log(data);
                        });
                };

                $scope.cancel = function() {
                    $state.go('configurationHostList');
                };

                setDraggable($scope);

                ConfigurationHostFactory.edit($state.params.uuid)
                    .then(function(data) {
                        $scope.hostData = data.hostData;
                        $scope.hostDetail = data.hostDetail;
                        $scope.use = data.use;
                        $scope.unused = data.unused;
                    });
            }
        ]);
    }
);