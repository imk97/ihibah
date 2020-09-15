<?php

use Illuminate\Support\Facades\Auth;
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

/** Confirmation and verification of the account */
Auth::routes(['verify' => true]);

Route::get('/', function () {
    return redirect()->route('home');
});

/**
 * RESOURCE OF THE DIVIDEN 
 */
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dividen', 'DividenController@create')->name('create');
Route::get('/dividens', 'DividenController@index')->name('index');
Route::post('/dividen', 'DividenController@store')->name('add');
Route::post('/dividen/{id}', 'DividenController@show')->name('show.id');
Route::get('/dividen/{id}', 'DividenController@edit')->name('index.id');
Route::put('/dividen/{id}', 'DividenController@update')->name('update.id');
Route::delete('/dividen/{id}', 'DividenController@destroy')->name('delete.id');

/**
 * Export the File
 */
Route::get('/excel/export', 'DividenController@excel')->name('excel');
Route::get('/pdf/export', 'DividenController@pdf')->name('pdf');


