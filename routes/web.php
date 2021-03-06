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

// Login / Register
Route::get('/login', 'LoginController@login');
Route::get('/isExistEmail/{email}', 'LoginController@isExistEmail');
Route::post('/loginAction/{email}/{password}', 'LoginController@loginAction');
Route::get('/logoutAction', 'LoginController@logout');
Route::post('/registerAction/{email}/{password}', 'LoginController@registerAction');
Route::get('/payment', 'HomeController@payment');
Route::get('/', 'HomeController@index');
Route::get('/coin-view', 'HomeController@coinView');
Route::get('/user-profile', 'HomeController@userProfile');
Route::get('/upgrade', 'HomeController@upgrade');
// Facebook auth
Route::get('/social/facebook', 'HomeController@facebook');

//CRUD
// Admin routes
Route::get('/dashboard', 'AdminController@dashboard');
Route::get('/user-upgrade', 'AdminController@userUpgrade');
Route::get('/user-list', 'AdminController@userList');
Route::get('/user-profile/{id}', 'AdminController@userProfile');
Route::post('/user-profile/{id}', 'AdminController@userProfile');
Route::get('/typography', 'AdminController@typography');
Route::get('/icons', 'AdminController@icons');
Route::get('/maps', 'AdminController@maps');
Route::get('/notifications', 'AdminController@notifications');
