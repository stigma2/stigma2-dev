<?php

Route::group(array('prefix'=>'admin'),function(){
    Route::get('commands/generate', '\App\Http\Controllers\Admin\CommandController@generate') ;
    Route::get('hosts/generate', '\App\Http\Controllers\Admin\HostController@generate') ;
    Route::get('dashboard/nagios_restart', '\App\Http\Controllers\Admin\DashboardController@nagiosRestart') ;

    Route::resource('hosts','\App\Http\Controllers\Admin\HostController');
    Route::resource('services','\App\Http\Controllers\Admin\ServiceController');
    Route::resource('commands','\App\Http\Controllers\Admin\CommandController');
    Route::resource('dashboard','\App\Http\Controllers\Admin\DashboardController'); 
});
