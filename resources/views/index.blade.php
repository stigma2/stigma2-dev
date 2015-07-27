<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Stigma2</title>

        <link rel="stylesheet" href="css/app.css" />

        <script src="bower_components/modernizr/modernizr.js"></script>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/foundation/js/foundation.min.js"></script>

        <script data-main="scripts/main" src="bower_components/requirejs/require.js"></script>
    </head>
    <body>
        <header>
            <div ng-controller="TopBarDemoCtrl">
                <top-bar>
                    <ul class="title-area">
                        <li class="name">
                            <h1><a href="#">My Site</a></h1>
                        </li>
                        <li toggle-top-bar class="menu-icon"><a href="#">Menu</a></li>
                    </ul>

                    <top-bar-section>
                        <!-- Right Nav Section -->
                        <ul class="right">
                            <li class="active"><a href="#">Active</a></li>
                            <li has-dropdown>
                                <a href="#">Dropdown</a>
                                <ul top-bar-dropdown>
                                    <li><a href="#">First link in dropdown</a></li>
                                </ul>
                            </li>
                        </ul>

                        <!-- Left Nav Section -->
                        <ul class="left">
                            <li><a href="#">Left</a></li>
                        </ul>
                    </top-bar-section>
                </top-bar>
            </div>
        </header>
        <div class="off-canvas-wrap" data-offcanvas>
          <div class="inner-wrap">
            <nav class="tab-bar">
              <section class="left-small">
                <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
              </section>

              <section class="middle tab-bar-section">
                <h1 class="title">Foundation</h1>
              </section>

              <section class="right-small">
                <a class="right-off-canvas-toggle menu-icon" href="#"><span></span></a>
              </section>
            </nav>

            <aside class="left-off-canvas-menu">
              <ul class="off-canvas-list">
                <li><label>Foundation</label></li>
                <li><a href="#">The Psychohistorians</a></li>
                <li><a href="#">...</a></li>
              </ul>
            </aside>

            <aside class="right-off-canvas-menu">
              <ul class="off-canvas-list">
                <li><label>Users</label></li>
                <li><a href="#">Hari Seldon</a></li>
                <li><a href="#">...</a></li>
              </ul>
            </aside>

            <section class="main-section">
                <!-- content goes here -->
                <article>
                    <h1>Main Contents</h1>
                    <div ui-view></div>
                </article>
            </section>
          <a class="exit-off-canvas"></a>

          </div>
        </div>
        <!-- <div class="row">
            <div class="large-2 columns">
                <aside class="sidebar">
                    <nav>
                        <ul class="side-nav">
                            <li class="heading">Dashboard</li>
                            <li><a href="#">Overview</a></li>
                            <li class="divider"></li>
                            <li class="heading">GlusterFS</li>
                            <li><a href="#">gfs1</a></li>
                            <li><a href="#">gfs2</a></li>
                            <li class="divider"></li>
                            <li class="heading">Servers</li>
                            <li><a href="#">Host</a></li>
                            <li><a href="#">Service</a></li>
                            <li class="divider"></li>
                            <li class="heading"></li>
                            <li><a href="#">Problem</a></li>
                            <li><a href="#">Report</a></li>
                            <li><a href="#">Event</a></li>
                            <li class="divider"></li>
                            <li class="heading">Configuration</li>
                            <li><a href="#">Command</a></li>
                            <li><a href="#">Host</a></li>
                            <li><a href="#">Service</a></li>
                            <li class="divider"></li>
                            <li class="heading">Setting</li>
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">User / Role</a></li>
                            <li><a href="#">PreConfig</a></li>
                            <li class="divider"></li>
                            <li class="heading">System</li>
                            <li><a href="#">Start / Stop</a></li>
                        </ul>
                    </nav>
                </aside>
            </div>
            <div class="large-10 columns">
                <article>
                    <h1>Main Contents</h1>
                    <div ui-view></div>
                </article>
            </div>
        </div> -->
        <footer class="row">
            <div class="large-12 columns">
                <hr/>
                <div class="large-6 columns">
                    <p>© Copyright</p>
                </div>
                <div class="large-6 columns">
                    <ul class="inline-list right">
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                        <li><a href="#">Link 4</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </body>
</html>