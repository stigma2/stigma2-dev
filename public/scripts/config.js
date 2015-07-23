define([], function() {
    const CONTEXT_ROOT = '';
    const PARTIALS_ROOT = CONTEXT_ROOT + '/partials/';

    var config = {
        home: CONTEXT_ROOT,
        routes: [
            {'state': 'dashboardIndex', 'url': CONTEXT_ROOT + '/', 'templateUrl': PARTIALS_ROOT + 'dashboard.index.php', 'controller': 'DashboardIndexCtrl'},
        ],
    };

    function get() {
        return config;
    };

    return {
        get: get
    };
});