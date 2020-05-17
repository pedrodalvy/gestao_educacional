<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'api',
    'namespace' => 'Api\\'
], function () {
    Route::post('/access_token', 'AuthController@accessToken');

    Route::group(['middleware' => 'auth.renew'], function () {
        Route::post('/logout', 'AuthController@logout');
    });
});