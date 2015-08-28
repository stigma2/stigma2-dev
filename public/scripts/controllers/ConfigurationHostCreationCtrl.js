define(['./module'],
    function(app) {
        'use strict';

        app.controller('ConfigurationHostCreationCtrl', [
            '$scope', '$state', 'ConfigurationHostFactory',
            function($scope, $state, ConfigurationHostFactory) {
                $scope.hostData = {};

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

                $scope.saveHost = function() {
                    ConfigurationHostFactory.save($scope.hostData)
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

                ConfigurationHostFactory.create()
                    .then(function(data) {
                        $scope.use = data.use;
                        $scope.unused = data.unused;
                    });
            }
        ]);
    }
);