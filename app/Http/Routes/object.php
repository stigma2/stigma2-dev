<?php

Route::group(array('prefix'=>'admin'),function(){
    Route::resource('hosts','HostController');
});
