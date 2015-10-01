<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

// Route::group(['prefix' => 'api/v1'], function()
Route::group(array('prefix' => 'api/v1'), function()
{
    Route::resource('dashboard', 'DashboardController');
    Route::resource('server/hosts', 'ServerHostsController');
    Route::get('server/services/status/{status?}', 'ServerServicesController@index');
    Route::get('server/services/name/{name}/servicedescription/{servicedescription}', 'ServerServicesController@show');
});
