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

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::post('login', 'Auth\LoginController@login')->name('login');


Route::group(['middleware' => 'admin'], function () {
       Route::get('admin', 'HomeController@isAdmin')->name('admin');
       Route::get('task-form', 'HomeController@form')->name('task-form');
       Route::post('submit-task', 'HomeController@storeTask')->name('submit-task');


       Route::get('profile', 'Admin\ProfileController@index')->name('profile');

       Route::get('reports', 'Admin\ProfileController@reports')->name('reports');
});

Route::group(['middleware' => 'user'], function () {
       Route::get('/home', 'HomeController@index')->name('home');
});