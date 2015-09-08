<div class="row">
    <div class="medium-12 columns">
        <p><a ng-click="createHost()">create new host</a></p>
        <table>
            <thead>
                <tr>
                    <th width="200">Host</th>
                    <th>Description</th>
                    <th width="80"> </th>
                    <th width="90"> </th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="host in hosts" ng-show="hosts.length">
                    <td>{{ host.host_name }}</td>
                    <td>{{ host.description }}</td>
                    <td><a ng-click="editHost(host.uuid)" class="button tiny">edit</a></td>
                    <td><a ng-click="deleteHost(host.uuid)" class="button tiny alert">delete</a></td>
                </tr>
                <tr ng-show="!hosts.length">
                    <td colspan="4"><strong>No hosts.</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>