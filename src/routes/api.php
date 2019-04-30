<?php


Route::group(['prefix' => 'api/location'], function () {
    Route::get('countries', 'Woodoocoder\LaravelLocation\LocationController@countries');
    Route::get('regions', 'Woodoocoder\LaravelLocation\LocationController@regions');
    Route::get('cities', 'Woodoocoder\LaravelLocation\LocationController@cities');
});
