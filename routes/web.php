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

Route::get('/', function () {
    return redirect('/login');
});

// Authentication Routes...
$this->get('/login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('/login', 'Auth\LoginController@login');
$this->post('/logout', 'Auth\LoginController@logout')->name('logout');

/*// Registration Routes...
$this->get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('/register', 'Auth\RegisterController@register');*/

// Password Reset Routes...
$this->get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/home', 'HomeController@index')->name('home');

/* Backend */
Route::group(['prefix' => 'backend'], function () {
    /* Backend - Add Manufacturer */
    Route::get('/add/manufacturer', 'BackendController@getAddManufacturer')->name('add-manufacturer');
    Route::post('/add/manufacturer', 'BackendController@postAddManufacturer');
    /* /Backend - Add Manufacturer */

    /* Backend - Add Model */
    Route::get('/add/model', 'BackendController@getAddModel')->name('add-model');
    Route::post('/add/model', 'BackendController@postAddModel');
    /* /Backend - Add Model */

    /* Backend - View Inventory */
    Route::get('/view/inventory', 'BackendController@getViewInventory')->name('view-inventory');
    /* /Backend - View Inventory */

    /* Sold Car Model */
    Route::get('/sold/model/{id}', 'BackendController@SoldCarModel');
    /* /Sold Car Model */
});
/* /Backend */