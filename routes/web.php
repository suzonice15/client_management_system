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

Route::get('/', 'UserController@index');
Route::post('/login-check', 'UserController@store');
Route::get('/login-out', 'UserController@destroy');
//Route::resource('/', 'DashboardController@index');
Route::resource('types', 'TypeController');
Route::get('dashboard', 'DashboardController@index');


Route::resource('proffesions', 'ProfessionController');
Route::resource('positions', 'PositionController');
Route::resource('areas', 'AreaController');
Route::resource('customers', 'CustomerController');
Route::resource('service', 'ServiceController');
Route::resource('serviceCatogory', 'ServiceCategoryController');
Route::get('customer/programers', 'CustomerController@programers');
Route::get('customer/clients', 'CustomerController@clients');


/********************* setting controller             *//////
Route::resource('setting', 'SettingController');
Route::resource('cpanels', 'CpanelController');
Route::resource('users', 'UsersController');




Route::get('/customer/report', 'ReportController@report');
Route::get('/subAreaLoad', 'CustomerController@subAreaLoad');
Route::get('get-area-list','CustomerController@subAreaLoad');
Route::get('/get-division-list','CustomerController@divisionDataLoad');
Route::post('/email_available/check', 'CustomerController@check')->name('email_available.check');
Route::post('/phone_available/check', 'CustomerController@phoneCheck')->name('phone_available.phoneCheck');
Route::post('/position/check', 'PositionController@check')->name('position.check');
/************************ customer ********************************/

Route::post('areaDataLoad/customer', 'CustomerController@areaDataLoad')->name('customers.areaData');
Route::post('professorDataLoad/customer', 'CustomerController@professorDataLoad')->name('customers.professor');
Route::post('positionDataLoad/customer', 'CustomerController@positionDataLoad')->name('customers.position');
Route::post('typeDataLoad/customer', 'CustomerController@typeDataLoad')->name('customers.type');


/************************ customer  notification********************************/

Route::get('/customer/cominication', 'ReportController@cominication');
Route::get('/customer/notification', 'ReportController@notification');
Route::get('/customers/notificationShow/{id}', 'ReportController@notificationShow');
Route::get('/customers/notificationEdit/{id}', 'ReportController@notificationEdit');
Route::get('/customers/notificationView/{id}', 'ReportController@notificationView');
Route::post('/customers/notificationUpdate', 'ReportController@notificationUpdate');
Route::post('/customers/notificationUpdate', 'ReportController@notificationUpdate');
