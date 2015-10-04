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
                    <li class="parent" style="border-left:5px solid #3F51B5;"><a href="{{route('admin.dashboard.index')}}"><i class="fi-graph-trend"></i>&nbsp;DASHBOARD</a></li>
                    <li class="parent" style="border-left:5px solid #304FFE;">
                    <a><i class="fi-monitor"></i>&nbsp;HOST MANAGER</a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.hosts.index')}}">List</a></li>
                        <li><a href="{{route('admin.hosts.create')}}"><span class="fi-plus"></span>&nbsp;New Host</a></li>
                    </ul>
                    </li>
                    <li class="parent" style="border-left:5px solid #6200EA;">
                    <a><i class="fi-cloud"></i>&nbsp;SERVICE MANAGER</a>
                    <ul class="submenu">
                        <li><a href="{{route('admin.services.index')}}">List</a></li>
                        <li><a href="{{route('admin.services.create')}}"><span class="fi-plus"></span>&nbsp;New Service</a></li>
                    </ul> 
                    </li>
                    <li class="parent" style="border-left:5px solid #00BCD4;"><a><i class="fi-book"></i>&nbsp;COMMAND MANAGER</a> 
                    <ul class="submenu">
                        <li><a href="{{route('admin.commands.index')}}">List</a></li>
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
                        <li class="active"><a href="#" data-reveal-id="system-modal"><i class="fi-power"></i>&nbsp;Nagios Restart</a></li> 
                    </ul>

                </section>
            </div>
            <div class="content">
                @yield('contents')
            </div>
        </div>
    </div>
</div>


<div id="system-modal" class="reveal-modal small modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <div class="modal-header">
        <h5 class="title">Serivce Restart</h5>
        <a class="close-reveal-modal" aria-label="Close">&#215;</a>
    </div>
    <div class="modal-body"> 
        <ul class="step-by-step">
            <li>1.Generating Host Configuration</li>
            <li>2.Generating Service Configuration</li>
            <li>3.Generating Command Configuration</li>
        </ul>
    </div> 
    <div class="modal-footer"> 
        <a class="button right small alert restart-btn">NAGIOS RESTART</a> 
    </div>
</div>
<script src="/bower_components/foundation/js/vendor/jquery.js"></script>
<script src="/bower_components/foundation/js/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
<script>
jQuery(function(){
    $('a.restart-btn').click(function(){
    });
});
</script>
@yield('scripts')
</body>
</html>
