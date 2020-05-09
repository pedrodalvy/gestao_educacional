<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::prefix('admin')->group(function () {
    Auth::routes();

    Route::group(['prefix' => 'users', 'as' => 'admin.users.'], function () {
        Route::get('settings', 'Admin\UserSettingsController@edit')->name('settings.edit');
        Route::put('settings', 'Admin\UserSettingsController@update')->name('settings.update');
    });

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
        'middleware' => ['auth', 'can:admin']
    ], function () {

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('show_datails', 'UsersController@showDetails')->name('show_datails');
        });

        Route::resource('users', 'UsersController');
    });
});


Route::get('/home', 'HomeController@index')->name('home');
