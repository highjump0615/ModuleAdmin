<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function() {
    Route::get('/login', 'Auth\LoginController@showLoginForm');
    Route::post('/login', 'Auth\LoginController@login');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', 'Auth\LoginController@logout');

    // modules
    Route::get('/', 'ModuleController@showModule');
    Route::post('/module/save', 'ModuleController@saveModule');
    Route::get('/module/filter', 'ModuleController@filterModuleList');
    Route::post('/module/delete', 'ModuleController@deleteModule');

    // version
    Route::get('/version', 'VersionController@showVersion');
    Route::post('/version/save', 'VersionController@saveVersion');
    Route::post('/version/delete', 'VersionController@deleteVersion');
});