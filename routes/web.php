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

Auth::routes();

Route::get('/', 'DashboardController@index')->name('dashboard');

/* Store model details */
Route::post('/model/store', 'DashboardController@store')->name('model.store');
		
/* Get model details */
//Route::get('/model/{id}', 'DashboardController@show')->name('model.show');