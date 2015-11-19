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
Route::get('/', 'PagesController@index');
// Route::get('/password/email', 'Auth\PasswordController@getEmail');
// Route::post('/password/email', 'Auth\PasswordController@postEmail');
//
// Route::get('/password/reset', 'Auth\PasswordController@getReset');
// Route::post('/password/reset', 'Auth\PasswordController@postReset');
// Route::get('/login', 'Auth\AuthController@getLogin');
// Route::post('/login', 'Auth\AuthController@postLogin');

Route::get('users', 'UsersController@index');
Route::post('users', 'UsersController@store');
Route::get('users/create', 'UsersController@create');
Route::get('users/{users}', 'UsersController@show');
Route::patch('users/{users}', 'UsersController@update');
Route::delete('users/{users}', 'UsersController@destroy');
Route::get('users/{users}/edit', 'UsersController@edit');
Route::get('/users/{users}/profile.pdf', 'UsersController@profile_pdf');
Route::resource('universities', 'UniversitiesController');
Route::resource('students', 'StudentsController');
Route::resource('companies', 'CompaniesController');
Route::resource('sos-requests', 'SosRequestController');
Route::controllers([
  '/password' => 'Auth\PasswordController',
]);
Route::group(['prefix' => 'api/v1'], function() {

    Route::post('login', 'Api\AuthController@login');
    // Route::post('/api/v1/login', 'Api\ApiLoginController@index');

    Route::group(['middleware' => ['jwt.auth', 'jwt.refresh']], function() {
        Route::post('logout', 'Api\AuthController@logout');

        Route::get('test', function(){
            return response()->json(['foo'=>'bar']);
        });
    });
});

Route::controllers([
  '/' => 'Auth\AuthController',
]);
