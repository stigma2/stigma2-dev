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

Route::group(array('prefix' => 'api'), function()
{
    Route::resource('configuration/commands', 'ConfigurationCommandsController');
});

// Route::get('signature', function () {
//     return view('signature');
// });

// Route::get('signature/verify', 'SignatureController@verify');

// Route::get('command', 'CommandController@index');
// Route::get('host', 'HostController@index');
