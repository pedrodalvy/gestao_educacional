<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Auth::routes();

    Route::group(['prefix' => 'users', 'as' => 'admin.users.'], function () {
        Route::get('settings', 'Admin\UserSettingsController@edit')
            ->name('settings.edit');

        Route::put('settings', 'Admin\UserSettingsController@update')
            ->name('settings.update');
    });

    Route::group([
        'namespace' => 'Admin\\',
        'as' => 'admin.',
        'middleware' => ['auth', 'can:admin']
    ], function () {

        Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
            Route::get('show_datails', 'UsersController@showDetails')->name('show_datails');

            Route::group(['prefix' => '{user}/profile'], function () {
                Route::get('', 'UserProfileController@edit')->name('profile.edit');
                Route::put('', 'UserProfileController@update')->name('profile.update');
            });
        });

        Route::resource('users', 'UsersController');
        Route::resource('subjects', 'SubjectsController');

        Route::group([
            'prefix' => 'classinformation/{classinformation}',
            'as' => 'classinformation.'
        ], function () {
            Route::resource('students', 'ClassStudentsController', [
                'only' => ['index', 'store', 'destroy']
            ]);

            Route::resource('teachings', 'ClassTeachingsController', [
                'only' => ['index', 'store', 'destroy']
            ]);
        });

        Route::resource('classinformation', 'ClassInformationsController');
    });

    Route::group([
        'namespace' => 'Api\\',
        'as' => 'admin.api.',
        'middleware' => ['auth', 'can:admin'],
        'prefix' => 'api'
    ], function () {
        Route::get('students', 'StudentsController@index')->name('students.index');
        Route::get('subjects', 'SubjectsController@index')->name('subjects.index');
        Route::get('teachers', 'TeachersController@index')->name('teachers.index');
    });
});


Route::get('/home', 'HomeController@index')->name('home');
