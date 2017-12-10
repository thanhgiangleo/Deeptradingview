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

// Homepage routes
Route::get('/', 'HomeController@index');

// Login / Register
Route::get('/login', 'HomeController@login');
Route::get('/isExistEmail/{email}', 'HomeController@isExistEmail');
Route::post('/loginAction/{email}/{password}', 'HomeController@loginAction');
Route::post('/registerAction/{email}/{password}', 'HomeController@registerAction');
Route::get('/payment', 'HomeController@payment');
// Facebook auth
Route::get('/social/facebook', 'HomeController@facebook');

// Admin routes
Route::get('/dashboard', 'AdminController@dashboard');
Route::get('/user', 'AdminController@user');
Route::get('/user-list', 'AdminController@userList');
Route::get('/typography', 'AdminController@typography');
Route::get('/icons', 'AdminController@icons');
Route::get('/maps', 'AdminController@maps');
Route::get('/notifications', 'AdminController@notifications');