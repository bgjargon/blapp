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
Route::get('/next', function () { return view('next'); });
Route::get('/all', function () { return view('all'); });
Route::get('/winloss', function () { return view('winloss'); });
Route::get('/search', function () { return view('search'); });
