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

Route::get('/', 'ServiceRequestsController@index')->name('home');
Route::get('serviceRequest/create', 'ServiceRequestsController@create')->name('create');
Route::post('serviceRequest/create', 'ServiceRequestsController@store')->name('store');
Route::get('serviceRequest/{id}', 'ServiceRequestsController@edit')->name('edit');
Route::patch('serviceRequest/{serviceRequest}', 'ServiceRequestsController@update')->name('update');
Route::delete('serviceRequest/{serviceRequest}', 'ServiceRequestsController@destroy')->name('delete');
Route::get('{VehicleMakes}/VehicleModels', 'VehicleMakesController@fetchVehicleModels');
Route::get('/home', 'ServiceRequestsController@index');
Auth::routes();
