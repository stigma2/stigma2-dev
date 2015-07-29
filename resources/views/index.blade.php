<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Stigma2</title>

        <link rel="stylesheet" href="css/app.css" />

        <script data-main="scripts/main" src="bower_components/requirejs/require.js"></script>
    </head>
    <body>
        <header>
            <div  ng-controller="TopBarCtrl">
                <top-bar>
                <nav class="top-bar" data-topbar role="navigation">
                    <ul class="title-area">
                        <li class="name">
                            <h1><a href="#">My Site</a></h1>
                        </li>
                    </ul>
                    <top-bar-section>
                    <section class="top-bar-section">
                        <ul class="left">
                            <li><a ng-click="toggleIconBar()"><i class="fi-list"></i></a></li>
                            <li><a href="#">Left Nav Button</a></li>
                        </ul>
                        <ul class="right">
                            <li class="active"><a href="#">Right Button Active</a></li>
                            <li has-dropdown>
                                <a href="#">Right Button Dropdown</a>
                                <ul class="dropdown">
                                    <li><a href="#">First link in dropdown</a></li>
                                    <li class="active"><a href="#">Active link in dropdown</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fi-widget"></i></a></li>
                            <li><a href="#"><i class="fi-lock"></i></a></li>
                        </ul>
                    </section>
                    </top-bar-section>
                </nav>
                </top-bar>
            </div>
        </header>
        <aside>
            <div class="icon-bar vertical five-up">
                <a class="item">
                    <i class="fi-home"></i>
                </a>
                <a class="item">
                    <i class="fi-bookmark"></i>
                </a>
                <a class="item">
                    <i class="fi-info"></i>
                </a>
                <a class="item">
                    <i class="fi-mail"></i>
                </a>
                <a class="item">
                    <i class="fi-like"></i>
                </a>
            </div>
        </aside>
        <section>
            <article>
                <!-- <div ui-view></div> -->
            </article>
        </section>
        <footer>
        </footer>
    </body>
</html>