<div class="row">
    <div class="medium-12 columns">
        <div class="row" ng-repeat="(key, value) in service">
            <div class="medium-3 columns">
                <span class="right">{{ key }}</span>
            </div>
            <div class="medium-9 columns">
                <span ng-if="value">{{ value }}</span>
                <span ng-if="!value">NONE</span>
            </div>
        </div>
        <div class="row">
            <div class="medium-12 columns">
                <button type="button" class="btn btn-default right" ng-click="cancel()">List</button>
            </div>
        </div>
    </div>
</div>