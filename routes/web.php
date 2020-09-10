<?php

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


Route::get('/', 'CountryController@index');
Route::resource('customers', 'CustomerController');
Route::resource('country', 'CountryController');
Route::resource('town', 'TownController');
Auth::routes();

Route::get('customers/{id}/travel', 'CustomerController@travel')->name('customers.travel');
Route::get('/home', 'HomeController@index')->name('home');
