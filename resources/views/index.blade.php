<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Stigma</title>

        <link rel="stylesheet" href="css/app.css" />

        <script data-main="scripts/main" src="bower_components/requirejs/require.js"></script>
    </head>
    <body ng-controller="IndexCtrl">
        <header>
            <top-bar>
                <nav class="top-bar" data-topbar role="navigation">
                    <ul class="title-area">
                        <li class="name">
                            <h1><a ui-sref="dashboard.overview">STIGMA</a></h1>
                        </li>
                    </ul>
                    <top-bar-section>
                        <section class="top-bar-section">
                            <ul class="right">
                                <li><a href="#" data-reveal-id="indexConfigArea" ng-click="openIndexConfigArea();"><i class="fi-widget"></i></a></li>
                                <li><a href="#"><i class="fi-lock"></i></a></li>
                            </ul>
                        </section>
                    </top-bar-section>
                </nav>
            </top-bar>
        </header>
        <div class="row">
            <aside class="large-2 columns">
                <ul class="side-nav">
                    <li class="heading">Dashboard</li>
                    <li><a ui-sref="dashboardOverview"><i class="fi-home"></i> Overview</a></li>
                    <li class="heading">Server</li>
                    <li><a ui-sref="serverHostList"><i class="fi-page"></i> Host</a></li>
                    <li><a ui-sref="serverServiceList"><i class="fi-page"></i> Service</a></li>
                    <li class="heading">Report</li>
                    <li><a ui-sref="reportGraph"><i class="fi-graph-bar"></i> Graph</a></li>
                </ul>
            </aside>
            <section class="large-10 columns">
                <article class="mainContents">
                    <div ui-view></div>
                </article>
            </section>
        </div>
        <footer>
            <hr></hr>
            <span class="right">© Copyright 2015 All Rights Reserved.</span>
        </footer>
        <div id="indexConfigArea" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
            <h2 id="modalTitle">Configuration</h2>
            <p>
                <form>
                    <div class="row">
                        <div class="medium-10 columns">
                            <div class="row">
                                <div class="medium-3 columns">
                                    <label for="right-label" class="right inline">Auto Refresh</label>
                                </div>
                                <div class="medium-9 columns">
                                    <select ng-model="refreshInterval" ng-change="setRefreshInterval();">
                                        <option value="15000">Every 15 s</option>
                                        <option value="30000">Every 30 s</option>
                                        <option value="60000">Every 1 m</option>
                                        <option value="300000">Every 5 m</option>
                                        <option value="900000">Every 15 m</option>
                                        <option value="1800000">Every 30 m</option>
                                        <option value="3600000">Every 1 h</option>
                                        <option value="7200000">Every 2 h</option>
                                        <option value="86400000">Every 1 d</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="medium-10 columns">
                            <div class="row">
                                <div class="medium-3 columns">
                                    <label for="right-label" class="right inline">Event Lists</label>
                                </div>
                                <div class="medium-9 columns">
                                    <select ng-model="overviewEventDurationDate" ng-change="setOverviewEventDurationDate();">
                                        <option value="1">1 Day</option>
                                        <option value="2">2 Days</option>
                                        <option value="3">3 Days</option>
                                        <option value="7">1 Week</option>
                                        <option value="14">2 Weeks</option>
                                        <option value="28">4 Weeks</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
        </div>
    </body>
</html>