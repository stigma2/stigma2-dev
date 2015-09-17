<div class="row">
    <div class="medium-12 columns">
        <div class="row">
            <div class="large-8 columns">
                <dl class="sub-nav">
                    <dt>Filter:</dt>
                    <dd class="active"><a ng-click="hostsFilter('', $event)">All</a></dd>
                    <dd><a ng-click="hostsFilter('0', $event)">Up</a></dd>
                    <dd><a ng-click="hostsFilter('1', $event)">Down</a></dd>
                    <dd><a ng-click="hostsFilter('2', $event)">Unreachable</a></dd>
                    <dd class="hide-for-small-only"><a ng-click="hostsFilter('9', $event)">Pending</a></dd>
                </dl>
            </div>
            <!-- <div class="large-4 columns right">
                <div class="row collapse">
                    <div class="small-10 columns">
                        <input type="text" placeholder="Search" ng-model="searchText">
                    </div>
                    <div class="small-2 columns">
                        <a class="button postfix"><i class="fi-magnifying-glass"></i></a>
                    </div>
                </div>
            </div> -->
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
                <tr ng-repeat="(key, host) in hosts" ng-show="hosts != null">
                <!-- <tr ng-repeat="(key, host) in hosts | filter:searchText" ng-show="hosts.length"> -->
                    <td><a ng-click="detailHost(host.host_name)">{{ host.name }}</a></td>
                    <td>{{ host.status }}</td>
                    <td>{{ convertDate(host.last_check) }}</td>
                    <td>{{ getDuration(host.last_state_change) }}</td>
                    <td>{{ host.plugin_output }}</td>
                </tr>
                <tr ng-show="hosts == null">
                    <td colspan="5"><strong>No hosts.</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>