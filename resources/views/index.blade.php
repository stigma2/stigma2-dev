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
            <nav class="top-bar" data-topbar role="navigation">
                <ul class="title-area">
                    <li class="name">
                        <h1><a href="#">My Site</a></h1>
                    </li>
                    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
                </ul>

                <section class="top-bar-section">
                    <!-- Right Nav Section -->
                    <ul class="right">
                        <li class="active"><a href="#">Right Button Active</a></li>
                        <li class="has-dropdown">
                            <a href="#">Right Button Dropdown</a>
                            <ul class="dropdown">
                                <li><a href="#">First link in dropdown</a></li>
                                <li class="active"><a href="#">Active link in dropdown</a></li>
                            </ul>
                        </li>
                    </ul>

                    <!-- Left Nav Section -->
                    <ul class="left">
                        <li><a href="#">Left Nav Button</a></li>
                    </ul>
                </section>
            </nav>
        </header>
    </body>
</html>