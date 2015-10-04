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

Route::group(array('prefix' => 'api/v1'), function() {
    Route::get('dashboard/systemstatus', 'DashboardController@systemstatus');
    Route::get('dashboard/hoststatus', 'DashboardController@hoststatus');
    Route::get('dashboard/servicestatus', 'DashboardController@servicestatus');
    Route::get('dashboard/graph/{dashboard}', 'DashboardController@show');
    Route::get('server/hosts/status/{status?}', 'ServerHostsController@index');
    Route::get('server/hosts/name/{name}', 'ServerHostsController@show');
    Route::get('server/services/status/{status?}', 'ServerServicesController@index');
    Route::get('server/services/name/{name}/servicedescription/{servicedescription}', 'ServerServicesController@show');
});

Route::get('/', function () {
    return view('index');
});


Route::group(array('prefix' => 'admin'), function() {
    Route::get('/',function(){
    }) ;
});

foreach(File::allFiles(__DIR__.'/Routes') as $partial)
{
    require_once $partial->getPathname();
} 

/*
Route::get('/',['middleware' => 'install.checker', 'uses'=>function(){
    // echo "installed";
    return view('index');
}]);
 */
