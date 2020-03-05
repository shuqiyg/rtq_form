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
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

Route::get('/', function () {
    return view('welcome');
});

Route::post('/loadForm', 'rtqController@loadForm');

Route::post('/calculate', 'rtqController@calculate');

Route::post('/finish', 'rtqController@finish');

Route::post('/resetForm','rtqController@resetForm');

Route::post('/checkReferRules','rtqController@checkReferRules');

Route::get('/error', function () {
    return view('error');
});

Route::get('/main', function () {
    return view('main');
});

Route::get('/sessionClose', function () {
    return view('sessionClose');
});