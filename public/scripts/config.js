define([], function() {
    const CONTEXT_ROOT = '';
    const PARTIALS_ROOT = CONTEXT_ROOT + '/partials/';

    var config = {
        home: CONTEXT_ROOT,
        overview: CONTEXT_ROOT + '/overview',
        routes: [
            {'state': 'dashboard', 'url': CONTEXT_ROOT, 'templateUrl': PARTIALS_ROOT + 'dashboard.index.php', 'controller': 'DashboardIndexCtrl'},
            {'state': 'dashboard.overview', 'url': CONTEXT_ROOT + '/overview', 'templateUrl': PARTIALS_ROOT + 'dashboard.overview.php', 'controller': 'DashboardOverviewCtrl'},
            {'state': 'dashboard.glusterfs', 'url': CONTEXT_ROOT + '/glusterfs', 'templateUrl': PARTIALS_ROOT + 'dashboard.glusterfs.php', 'controller': 'DashboardGlusterfsCtrl'},
        ],
    };

    function get() {
        return config;
    };

    return {
        get: get
    };
});