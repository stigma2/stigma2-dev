<div class="row">
    <div class="medium-12 columns">
        <div class="row">
            <div class="medium-6 columns">
                <h1>SYSTEM Status</h1>
                <div class="" style="background: #4caf50;" ng-show="system_status == 200">
                    <h1 class="" style="text-align: center;"><span class="" style="color: #eaeaea;">Running</span></h1>
                </div>
                <div class="" style="background: #ff1744;" ng-show="system_status != 200">
                    <h1 class="" style="text-align: center;"><span class="" style="color: #eaeaea;">Critical</span></h1>
                </div>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="medium-9 columns">
                <h1>Host Event</h1>
                <table>
                    <thead>
                        <tr>
                            <th width="200">Table Header</th>
                            <th>Table Header</th>
                            <th width="150">Table Header</th>
                            <th width="150">Table Header</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer content</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer Content</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus. This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer content</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer Content</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="medium-3 columns">
                <div class="medium-12 columns">
                    <div class="">
                        <div class="summary-body">
                            <div style="" class="row">
                                <div class="medium-6 columns">
                                    <div class="">
                                        <p class="">Up</p>
                                        <h2 class=""><span class="">{{ host_status.up }}</span></h2>
                                    </div>
                                </div>
                                <div class="medium-6 columns summary-border-left">
                                    <div class="">
                                        <p>Down</p>
                                        <h2 class=""><span class="">{{ host_status.down }}</span></h2>
                                    </div>
                                </div>
                            </div>
                            <div style="" class="row summary-border-top">
                                <div class="medium-6 columns">
                                    <div class="">
                                        <h1 class="">
                                            <span class="text-center" ng-show="host_status.problems == 0"><i class="fi-heart"></i></span>
                                            <span class="text-center" ng-show="host_status.problems != 0"><i class="fi-alert"></i></span>
                                        </h1>
                                    </div>

                                </div>

                                <div class="medium-6 columns">
                                    <div class="">
                                        <p class="text-left">Today</p>
                                        <h4 class="text-left"><span class="">5</span>/<span class="">12</span>/<span class="">2013</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div style="" class="row summary-border-top">
                                <div class="medium-6 columns">
                                    <div class="">
                                        <p>All Problems</p>
                                        <h2 class=" "><span class="">{{ host_status.problems }}</span></h2>
                                    </div>
                                </div>
                                <div class="medium-6 columns summary-border-left">
                                    <div class="">
                                        <p>All Types</p>
                                        <h2 class=""><span class="">{{ host_status.types }}</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p></p>
        <div class="row">
            <div class="medium-9 columns">
                <h1>Service Event</h1>
                <table>
                    <thead>
                        <tr>
                            <th width="200">Table Header</th>
                            <th>Table Header</th>
                            <th width="150">Table Header</th>
                            <th width="150">Table Header</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer content</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer Content</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus. This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer content</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                        <tr>
                            <td>Content Goes Here</td>
                            <td>This is longer Content</td>
                            <td>Content Goes Here</td>
                            <td>Content Goes Here</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="medium-3 columns">
                <div class="medium-12 columns">
                    <div class="">
                        <div class="summary-body">
                            <div style="" class="row">
                                <div class="medium-6 columns">
                                    <div class="">
                                        <p class="">OK</p>
                                        <h2 class=""><span class="">{{ service_status.ok }}</span></h2>
                                    </div>
                                </div>
                                <div class="medium-6 columns summary-border-left">
                                    <div class="">
                                        <p>Down</p>
                                        <h2 class=""><span class="">160</span></h2>
                                    </div>
                                </div>
                            </div>
                            <div style="" class="row summary-border-top">
                                <div class="medium-6 columns">
                                    <div class="">
                                        <h1 class="">
                                            <span class="text-center" ng-show="host_status.problems == 0"><i class="fi-heart"></i></span>
                                            <span class="text-center" ng-show="host_status.problems != 0"><i class="fi-alert"></i></span>
                                        </h1>
                                    </div>

                                </div>

                                <div class="medium-6 columns">
                                    <div class="">
                                        <p class="text-left">Today</p>
                                        <h4 class="text-left"><span class="">5</span>/<span class="">12</span>/<span class="">2013</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div style="" class="row summary-border-top">
                                <div class="medium-6 columns">
                                    <div class="">
                                        <p>All Problems</p>
                                        <h2 class=" "><span class="">82</span></h2>
                                    </div>
                                </div>
                                <div class="medium-6 columns summary-border-left">
                                    <div class="">
                                        <p>All Types</p>
                                        <h2 class=""><span class="">24</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>