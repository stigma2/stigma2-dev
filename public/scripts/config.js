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
            {'state': 'configurationCommandList', 'url': CONTEXT_ROOT + '/configuration/commands', 'templateUrl': PARTIALS_ROOT + 'configuration.command.index.php', 'controller': 'ConfigurationCommandListCtrl'},
            {'state': 'configurationCommandCreation', 'url': CONTEXT_ROOT + '/configuration/commands/create', 'templateUrl': PARTIALS_ROOT + 'configuration.command.create.php', 'controller': 'ConfigurationCommandCreationCtrl'},
            {'state': 'configurationCommandEdit', 'url': CONTEXT_ROOT + '/configuration/commands/:uuid/edit', 'templateUrl': PARTIALS_ROOT + 'configuration.command.edit.php', 'controller': 'ConfigurationCommandEditCtrl'},
            {'state': 'configurationHostList', 'url': CONTEXT_ROOT + '/configuration/hosts', 'templateUrl': PARTIALS_ROOT + 'configuration.host.index.php', 'controller': 'ConfigurationHostListCtrl'},
            {'state': 'configurationHostCreation', 'url': CONTEXT_ROOT + '/configuration/hosts/create', 'templateUrl': PARTIALS_ROOT + 'configuration.host.create.php', 'controller': 'ConfigurationHostCreationCtrl'},
        ],
    };

    function get() {
        return config;
    };

    return {
        get: get
    };
});