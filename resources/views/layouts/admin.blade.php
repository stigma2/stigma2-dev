<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8" />
<title>Stigma2::install</title>

<link rel="stylesheet" href="/css/app.css" />

</head>
<body class="admin-theme"> 
<div class="off-canvas-wrap" data-offcanvas>
    <div class="inner-wrap">
        <!-- start of sidebar-wrapper -->
        <div class="sidebar-wrapper">
            <a class="brand">STIGMA</a>
            <div class="sidebar">
                <ul>
                    <li class="parent" style="border-left:5px solid #3F51B5;"><a><i class="fi-graph-trend"></i>&nbsp;DASHBOARD</a></li>
                    <li class="parent" style="border-left:5px solid #304FFE;">
                    <a><i class="fi-monitor"></i>&nbsp;HOST MANAGER</a>
                    <ul class="submenu">
                        <li><a>List</a></li>
                        <li><a>Template</a></li>
                    </ul>
                    </li>
                    <li class="parent" style="border-left:5px solid #6200EA;">
                    <a><i class="fi-cloud"></i>&nbsp;SERVICE MANAGER</a>
                    <ul class="submenu">
                        <li><a>List</a></li>
                        <li><a>Template</a></li>
                    </ul> 
                    </li>
                    <li class="parent" style="border-left:5px solid #00BCD4;"><a><i class="fi-book"></i>&nbsp;COMMAND MANAGER</a> 
                    <ul class="submenu">
                        <li><a>List</a></li>
                    </ul>
                    </li>
                    <li class="parent" style="border-left:5px solid #C51162;">
                    <a><i class="fi-cloud"></i>&nbsp;Configuration</a>
                    <ul class="submenu">
                        <li><a>Nagios</a></li>
                        <li><a>Grafana</a></li>
                        <li><a>Database</a></li>
                        <li><a>InfluxDB</a></li>
                    </ul> 
                    </li>

                </ul>
            </div>
        </div>
        <!-- end of sidebar-wrapper -->
        <div class="content-wrapper">
            <div class="top-bar">
                <section class="top-bar-section">
                    <!-- Right Nav Section -->
                    <ul class="right">
                        <li class="active"><a href="#">Nagios Restart</a></li> 
                    </ul>

                </section>
            </div>
            <div class="content">
                @yield('contents')
            </div>
        </div>
    </div>
</div>
</body>
</html>
