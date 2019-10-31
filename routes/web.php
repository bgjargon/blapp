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

Route::get('/', function () { return view('welcome'); });
Route::get('/next', 'Matches@next');
Route::get('/all', 'Matches@all');
Route::get('/winloss', 'Matches@winloss');
Route::get('/search', function () { return view('search'); });
