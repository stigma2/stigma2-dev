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
                        <input type="text" placeholder="Search" ng-model="searchText">
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
                    <th>Service</th>
                    <th>Status</th>
                    <th>Last Check</th>
                    <th>Duration</th>
                    <th>Attempt</th>
                    <th>Status Information</th>
                </tr>
            </thead>
            <tbody>
                <tr ng-repeat="service in services | filter:searchText" ng-show="services.length">
                    <td><a ng-click="detailHost(service.host_id)">{{ service.host_name }}</a></td>
                    <td><a ng-click="detailService(service.id)">{{ service.service_name }}</a></td>
                    <td>{{ service.status }}</td>
                    <td>{{ service.last_check }}</td>
                    <td>{{ service.duration }}</td>
                    <td>{{ service.attempt }}</td>
                    <td>{{ service.info }}</td>
                </tr>
                <tr ng-show="!services.length">
                    <td colspan="7"><strong>No services.</strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>