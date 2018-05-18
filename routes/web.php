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

/**
 * Check if the user is authentificated. If not redirect to login route
 */
Route::group(['middleware' => 'auth'], function () {
    
    Route::resource('customers', 'CustomerController');

});

Auth::routes();
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
