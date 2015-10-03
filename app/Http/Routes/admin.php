<?php

Route::group(array('prefix'=>'admin'),function(){
    Route::resource('hosts','\App\Http\Controllers\Admin\HostController');
    Route::resource('commands','\App\Http\Controllers\Admin\CommandController');
});
