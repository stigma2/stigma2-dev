<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Stigma2</title>

        <link rel="stylesheet" href="css/app.css" />

        <script data-main="scripts/main" src="bower_components/requirejs/require.js"></script>
    </head>
    <body>
        <div ng-controller="TopBarDemoCtrl">
            <top-bar>
                <ul class="title-area">
                  <li class="name">
                    <h1><a href="#">My Site</a></h1>
                  </li>
                  <li toggle-top-bar class="menu-icon"><a href="#">Menu</a></li>
                </ul>

                <top-bar-section>
                    <!-- Left Nav Section -->
                    <ul class="left">
                        <li><a href="#"><i class="fi-list"></i></a></li>
                    </ul>

                    <!-- Right Nav Section -->
                    <ul class="right">
                    <li class="active"><a href="#">Active</a></li>
                    <li has-dropdown>
                      <a href="#">Dropdown</a>
                      <ul top-bar-dropdown>
                        <li><a href="#">1 link in dropdown</a></li>
                        <li><a href="#">2 link in dropdown</a></li>
                        <li><a href="#">3 link in dropdown</a></li>
                        <li><a href="#">4 link in dropdown</a></li>
                        <li><a href="#">5 link in dropdown</a></li>
                        <li><a href="#">6 link in dropdown</a></li>
                      </ul>
                    </li>
                    <li><a href="#"><i class="fi-widget"></i></a></li>
                    <li><a href="#"><i class="fi-lock"></i></a></li>
                    </ul>
                </top-bar-section>
            </top-bar>
        </div>
        <!-- <div ui-view></div> -->

    </div>
    </body>
</html>