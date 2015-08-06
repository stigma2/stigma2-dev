define(['./module'],
    function(app) {
        'use strict';

        app.controller('ConfigurationHostCreationCtrl', [
            '$scope', '$state', 'ConfigurationHostFactory',
            function($scope, $state, ConfigurationHostFactory) {
                $scope.hostData = {};

                $scope.centerAnchor = true;
                $scope.toggleCenterAnchor = function () {$scope.centerAnchor = !$scope.centerAnchor}
                $scope.draggableObjects = [{name:'one'}, {name:'two'}, {name:'three'}];
                $scope.droppedObjects1 = [];
                $scope.droppedObjects2= [];
                $scope.onDropComplete1=function(data,evt){
                    var index = $scope.droppedObjects1.indexOf(data);
                    if (index == -1)
                    $scope.droppedObjects1.push(data);
                }
                $scope.onDragSuccess1=function(data,evt){
                    console.log("133","$scope","onDragSuccess1", "", evt);
                    var index = $scope.droppedObjects1.indexOf(data);
                    if (index > -1) {
                        $scope.droppedObjects1.splice(index, 1);
                    }
                }
                $scope.onDragSuccess2=function(data,evt){
                    var index = $scope.droppedObjects2.indexOf(data);
                    if (index > -1) {
                        $scope.droppedObjects2.splice(index, 1);
                    }
                }
                $scope.onDropComplete2=function(data,evt){
                    var index = $scope.droppedObjects2.indexOf(data);
                    if (index == -1) {
                        $scope.droppedObjects2.push(data);
                    }
                }
                var inArray = function(array, obj) {
                    var index = array.indexOf(obj);
                }

                $scope.saveCommand = function() {
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

                ConfigurationHostFactory.create()
                    .then(function(data) {
                        $scope.use = data.use;
                        $scope.unused = data.unused;
                    });
            }
        ]);
    }
);