<div class="row">
    <div class="medium-12 columns">
        <form ng-submit="saveHost()">
            <div class="row">
                <div class="medium-3 columns">
                    <label>Configuration Name</label>
                </div>
                <div class="medium-9 columns">
                    <label>Configuration Value</label>
                </div>
            </div>
            <div class="row" ng-repeat="rowContents in use">
                <div class="medium-3 columns">
                    <label for="" class="right inline">{{ rowContents.name }}</label>
                </div>
                <div class="medium-9 columns">
                    <input type="text" ng-model="hostData[rowContents.name]" placeholder="{{ rowContents.placeholder }}" />
                </div>
            </div>


            <ul class="draggable-objects">
                <li  ng-repeat="obj in draggableObjects" >
                    <div ng-drag="true" ng-drag-data="obj" data-allow-transform="true"> {{obj.name}} </div>
                </li>
            </ul>

            <hr/>
            <div ng-drop="true" ng-drop-success="onDropComplete1($data,$event)">
                <span class="title">Drop area #1</span>

                <div ng-repeat="obj in droppedObjects1" ng-drag="true" ng-drag-data="obj" ng-drag-success="onDragSuccess1($data,$event)" ng-center-anchor="{{centerAnchor}}">
                    {{obj.name}}
                </div>

            </div>

            <div ng-drop="true" ng-drop-success="onDropComplete2($data,$event)">
                <span class="title">Drop area #2</span>

                <div ng-repeat="obj in droppedObjects2" ng-drag="true" ng-drag-data="obj" ng-drag-success="onDragSuccess2($data,$event)" ng-center-anchor="{{centerAnchor}}">
                    {{obj.name}}
                </div>
            </div>




            <div class="row">
                <div class="medium-12 columns">
                    <button type="button" class="button secondary right" ng-click="cancel()">Cancel</button>
                    <button type="submit" class="button success right">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>