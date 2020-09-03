<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::get('/','HomeController@front')->name('homepage');


Auth::routes();
Route::get('home', 'HomeController@index')->name('home')->middleware('admin');
Route::resource('author', 'author')->middleware('author');
Route::resource('post', 'PostController')->middleware('auth');
Route::resource('newsletter', 'NewsLetter')->middleware('admin');
Route::resource('user', 'UserManagement')->middleware('admin');
Route::get('change-password', 'ChangePasswordController@index');

Route::post('change-password', 'ChangePasswordController@store')->name('change.password');
Route::resource('contact','ContactController');
