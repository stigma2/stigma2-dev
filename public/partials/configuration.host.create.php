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
                    <span>{{ rowContents.name }}</span>
                </div>
                <div class="medium-9 columns">
                    <input type="text" ng-model="hostData[rowContents.name]" placeholder="{{ rowContents.placeholder }}" />
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