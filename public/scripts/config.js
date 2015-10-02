define([], function() {
    const CONTEXT_ROOT = '';
    const PARTIALS_ROOT = CONTEXT_ROOT + '/partials/';

    var config = {
        home: CONTEXT_ROOT,
        overview: CONTEXT_ROOT + '/overview',
        routes: [
            {'state': 'dashboard', 'url': CONTEXT_ROOT, 'templateUrl': PARTIALS_ROOT + 'dashboard.index.php', 'controller': 'DashboardIndexCtrl'},
            {'state': 'dashboard.overview', 'url': '/overview', 'templateUrl': PARTIALS_ROOT + 'dashboard.overview.php', 'controller': 'DashboardOverviewCtrl'},
            {'state': 'dashboard.glusterfs', 'url': '/glusterfs', 'templateUrl': PARTIALS_ROOT + 'dashboard.glusterfs.php', 'controller': 'DashboardGlusterfsCtrl'},
            {'state': 'serverHostList', 'url': CONTEXT_ROOT + '/server/hosts', 'templateUrl': PARTIALS_ROOT + 'server.host.index.php', 'controller': 'ServerHostListCtrl'},
            {'state': 'serverHostDetail', 'url': CONTEXT_ROOT + '/server/hosts/:name', 'templateUrl': PARTIALS_ROOT + 'server.host.show.php', 'controller': 'ServerHostShowCtrl'},
            {'state': 'serverServiceList', 'url': CONTEXT_ROOT + '/server/services', 'templateUrl': PARTIALS_ROOT + 'server.service.index.php', 'controller': 'ServerServiceListCtrl'},
            {'state': 'serverServiceDetail', 'url': CONTEXT_ROOT + '/server/services/:name/:servicedescription', 'templateUrl': PARTIALS_ROOT + 'server.service.show.php', 'controller': 'ServerServiceShowCtrl'},
            {'state': 'historyLive', 'url': CONTEXT_ROOT + '/history/live', 'templateUrl': PARTIALS_ROOT + 'history.live.php', 'controller': 'HistoryLiveCtrl'},
        ],
    };

    function get() {
        return config;
    };

    return {
        get: get
    };
});