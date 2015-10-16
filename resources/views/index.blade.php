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
        <div id="indexConfigArea" class="reveal-modal" data-reveal aria-labelledby="Edit Configration" aria-hidden="true" role="dialog">
            <h2 id="modalTitle">Awesome. I have it.</h2>
            <p class="lead">Your couch.  It is mine.</p>
            <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
            <a class="close-reveal-modal" aria-label="Close">&#215;</a>
        </div>
    </body>
</html>