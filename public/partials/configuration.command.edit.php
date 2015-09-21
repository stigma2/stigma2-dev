<div class="row">
    <div class="medium-12 columns">
        <form ng-submit="updateCommand(commandData.uuid)">
            <div class="row">
                <div class="medium-2 columns">
                    <label for="command_name" class="left inline">Command Name</label>
                </div>
                <div class="medium-10 columns">
                    <input type="text" id="command_name" ng-model="commandData.command_name" placeholder="Command Name">
                </div>
            </div>
            <div class="row">
                <div class="medium-2 columns">
                    <label for="command_line" class="left inline">Command Line</label>
                </div>
                <div class="medium-10 columns">
                    <textarea id="command_line" ng-model="commandData.command_line" placeholder="Command Line" rows="10"></textarea>
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