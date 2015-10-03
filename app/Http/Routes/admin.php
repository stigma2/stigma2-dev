<?php

Route::group(array('prefix'=>'admin'),function(){
    Route::resource('hosts','\App\Http\Controllers\Admin\HostController');
    Route::resource('services','\App\Http\Controllers\Admin\ServiceController');
    Route::resource('commands','\App\Http\Controllers\Admin\CommandController');
});
