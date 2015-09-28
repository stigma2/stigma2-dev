<?php

Route::get('installation',array('as'=>'installation', 'uses'=>'\App\Http\Controllers\InstallationController@index')) ;

Route::group(array('as'=>'installation::'), function(){
    Route::get('install/database', array('as'=>'database.view', 'uses' => 'InstallationController@installDatabaseView'));
    Route::get('install/nagios', array('as'=>'nagios.view', 'uses' => 'InstallationController@installNagiosView'));
    Route::get('install/grafana', array('as'=>'grafana.view', 'uses' => 'InstallationController@installGrafanaView'));

    
    Route::post('install/database/setup', array('as'=>'database.install', 'uses' => 'InstallationController@installDatabase'));
    Route::post('install/nagios/setup', array('as'=>'nagios.install', 'uses' => 'InstallationController@installNagios'));
    //Route::post('install/grafana', array('as'=>'grafana', 'uses' => 'InstallationController@installGrafana'));
});
