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

Route::post('/getBannerMessage','rtqController@getBannerMessage');

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

/** 
	If broker code list is in excel then makes it in JSON using following url
**/
Route::get('/blExcelToJson','bletjController@excelToJson');
Route::get('/api/2020/amf/root/addBCtoList',function () {
    return view('addBCtoList');
});
Route::post('/api/2020/amf/root/addBrokerCodeToList','bletjController@addBrokerCodeToList');
Route::post('/api/2020/amf/root/searchBrokerCodeToList','bletjController@searchBrokerCodeToList');

Route::post('/brokerValidation','rtqController@brokerValidation');

/**
	ROUTE FOR ADMIN TO CHANGE VALUES IN DIFFERENT JSON FILES
**/
Route::get('/api/2020/amf/root',function(){
	return view('admin/admin');
});

Route::get('/api/2020/amf/root/bannerJSON','adminController@bannerJSON');
Route::post('/api/2020/amf/root/bannerSave','adminController@bannerSave');

// HERE IN amfRateJSON url , add ?formVal=formID to get amf rates specific to form
Route::get('/api/2020/amf/root/amfRateJSON','adminController@amfRateJSON');

// GET Province mod of property modifier
Route::get('/api/2020/amf/root/propertyProvModJson','adminController@propertyProvModJson');
Route::post('/api/2020/amf/root/propertyProvModSave','adminController@propertyProvModSave');

// GET Towngrade mod of property modifier
Route::get('/api/2020/amf/root/propertyTGModJson','adminController@propertyTGModJson');
Route::post('/api/2020/amf/root/propertyTGModSave','adminController@propertyTGModSave');

// GET Construction mod of property modifier
Route::get('/api/2020/amf/root/propertyConModJson','adminController@propertyConModJson');
Route::post('/api/2020/amf/root/propertyConModSave','adminController@propertyConModSave');
