<div class="row">
    <div class="medium-12 columns">
        <p><a ng-click="createCommand()">create new command</a></p>
        <table>
            <thead>
                <tr>
                    <th width="200">Command Name</th>
                    <th>Command Line</th>
                    <th width="80"> </th>
                    <th width="90"> </th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="command in commands" ng-show="commands.length">
                    <td>{{ command.command_name }}</td>
                    <td>{{ command.command_line }}</td>
                    <td><a ng-click="editCommand(command.uuid)" class="button tiny">edit</a></td>
                    <td><a ng-click="deleteCommand(command.uuid)" class="button tiny alert">delete</a></td>
                </tr>
                <tr ng-show="!commands.length">
                    <td colspan="4"><strong>No commands.</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>