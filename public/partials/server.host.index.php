<div class="row">
    <div class="medium-12 columns">
        <div class="row">
            <div class="large-8 columns">
                <dl class="sub-nav">
                    <dt>Filter:</dt>
                    <dd class="active"><a href="#">All</a></dd>
                    <dd><a href="#">Active</a></dd>
                    <dd><a href="#">Pending</a></dd>
                    <dd class="hide-for-small-only"><a href="#">Suspended</a></dd>
                </dl>
            </div>
            <div class="large-4 columns right">
                <div class="row collapse">
                    <div class="small-10 columns">
                        <input type="text" placeholder="Search">
                    </div>
                    <div class="small-2 columns">
                        <a href="#" class="button postfix"><i class="fi-magnifying-glass"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Host</th>
                    <th>Status</th>
                    <th>Last Check</th>
                    <th>Duration</th>
                    <th>Status Information</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="host in hosts" ng-show="hosts.length">
                    <td><a ng-click="detailHost(host.id)">{{ host.host_name }}</a></td>
                    <td>{{ host.status }}</td>
                    <td>{{ host.last_check }}</td>
                    <td>{{ host.duration }}</td>
                    <td>{{ host.info }}</td>
                </tr>
                <tr ng-show="!hosts.length">
                    <td colspan="5"><strong>No hosts.</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>