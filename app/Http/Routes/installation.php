<?php

Route::get('installation',array('as'=>'installation', 'uses'=>'\App\Http\Controllers\InstallationController@index')) ;

Route::group(array('as'=>'installation::'), function(){
    Route::get('install/database', array('as'=>'database.view', 'uses' => 'InstallationController@installDatabaseView'));
    Route::get('install/nagios', array('as'=>'nagios.view', 'uses' => 'InstallationController@installNagiosView'));
    Route::get('install/grafana', array('as'=>'grafana.view', 'uses' => 'InstallationController@installGrafanaView'));
    Route::get('install/influxdb', array('as'=>'influxdb.view', 'uses' => 'InstallationController@installInfluxdbView'));

    
    Route::post('install/database/setup', array('as'=>'database.install', 'uses' => 'InstallationController@installDatabase'));
    Route::post('install/nagios/setup', array('as'=>'nagios.install', 'uses' => 'InstallationController@installNagios'));
    Route::post('install/grafana/setup', array('as'=>'grafana.install', 'uses' => 'InstallationController@installGrafana'));
    Route::post('install/influxdb/setup', array('as'=>'influxdb.install', 'uses' => 'InstallationController@installInfluxdb'));
});
