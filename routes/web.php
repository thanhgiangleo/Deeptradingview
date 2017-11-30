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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'HomeController@index');
Route::get('/login', 'HomeController@login');
Route::post('/loginAction', 'HomeController@loginAction');
Route::post('/register', 'HomeController@register');
Route::get('/payment', 'HomeController@payment');
Route::get('/social/facebook', 'HomeController@facebook');