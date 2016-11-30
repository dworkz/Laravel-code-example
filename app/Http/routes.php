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

/*
Route::get('/', function () {
    return view('welcome');
});
*/



Route::controller('callback', 'CallbackController');

Route::controller('login', 'LoginController');

Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function() {


    Route::get('permissions/update/{id}', [
        'uses' => 'PermissionsController@getUpdate',
        'access' => ['view'],
        'middleware' => ['check.access:permissions'],
    ]);

    Route::post('permissions/update/{id}', [
        'uses' => 'PermissionsController@postUpdate',
        'actions' => ['add', 'edit', 'delete'],
        'middleware' => ['check.access'],
    ]);
/*
    Route::get('employee/update/{id}', [
        'uses' => 'PermissionsController@getUpdate',
        'access' => ['view'],
        'middleware' => ['check.access:permissions'],
    ]);
*/
    Route::controller('dashboard', 'DashboardController');

    //Route::controller('permissions', 'PermissionsController')
    Route::controller('employee', 'EmployeeController'); // !!!
    Route::controller('company', 'CompanyController');
    Route::controller('phones', 'PhonesController');
    Route::controller('emails', 'EmailsController');
    Route::controller('address', 'AddressController');
    Route::controller('docs', 'DocsController');
    Route::controller('note', 'NoteController');
    Route::controller('persons', 'PersonsController');


    ///Route::controller('users', 'UsersController');
    ///Route::controller('roles', 'RolesController');
});


Route::get('/landing', function() {
    return redirect('/', 301);
});

Route::get('/', function () {
    return view('landing2', [
        'houses' => config('app.houses'),
        'totalCall' => config('app.today_call')
    ]);
});

Route::get('/house/{id}', function ($id) {
    $id -= 1;
    $houses = config('app.houses');
    return view('house4', [
        'id' => $id,
        'house' => isset($houses[$id]) ? $houses[$id] : abort(404),
    ]);
});


