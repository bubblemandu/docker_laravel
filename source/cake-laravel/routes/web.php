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
Route::get('/', 'CafeController@index');
Route::post('setCampaign', 'CafeController@setCampaign');

Route::get('menu/{no}', 'CafeController@menu');
Route::post('setMenu', 'CafeController@setMenu');

