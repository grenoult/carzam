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

// Default route for web access
Route::get('/', function () {
    return view('index');
});

// API routes
Route::get('/api/v1/cars/search/', 'Cars@search');
Route::get('/api/v1/cars/list/makes', 'Cars@getMakes');
Route::get('/api/v1/cars/list/models/{make}', 'Cars@getModels');
Route::get('/api/v1/cars/list/badges', 'Cars@getBadges');
Route::get('/api/v1/cars/list/variants', 'Cars@getVariants');
Route::get('/api/v1/cars/list/colours', 'Cars@getColours');
