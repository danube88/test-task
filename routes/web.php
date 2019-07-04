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

Route::get('/', function () {
    return Redirect::route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/positions', 'HomeController@position')->name('positions');

Route::get('/employee/list','DataTableController@employee')->name('employeeList');

Route::get('/position/list','DataTableController@position')->name('positionList');
