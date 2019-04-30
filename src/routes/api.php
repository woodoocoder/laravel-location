<?php


Route::group(['prefix' => 'api/location'], function () {
    Route::get('countries',
        'Woodoocoder\LaravelLocation\LocationController@countries');

    Route::get('regions/{countryId?}',
        'Woodoocoder\LaravelLocation\LocationController@regions');

    Route::get('cities/{countryId?}',
        'Woodoocoder\LaravelLocation\LocationController@cities');
        
    Route::get('cities/{countryId?}/{regionId}',
        'Woodoocoder\LaravelLocation\LocationController@cities');
});
