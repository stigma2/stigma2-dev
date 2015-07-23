define([], function() {
    const CONTEXT_ROOT = '/stigma2';
    const PARTIALS_ROOT = CONTEXT_ROOT + '/partials/';

    var config = {
        home: CONTEXT_ROOT,
        routes: [
            {'state': 'dashboardIndex', 'url': CONTEXT_ROOT + '/test', 'templateUrl': PARTIALS_ROOT + 'dashboard.index.php', 'controller': 'DashboardIndexCtrl'},
        ],
    };

    function get() {
        return config;
    };

    return {
        get: get
    };
});