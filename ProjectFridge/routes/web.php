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
    return view('welcome');
});

Route::get('totziens', function () {
    return view('totziens');
});

Auth::routes();

//u bent ingelogd overslaan
Route::get('/home', 'HomeController@index');
//Route::get('/home', 'HomeController@people');

Route::get('/people', 'HomeController@people');
Route::get('/people/{user}', 'HomeController@drinks');
Route::get('/people/{user}/{drinks}', 'HomeController@areyousure');
Route::get('/update/{user}/{drinks}', 'HomeController@makenewbetalling');
Route::get('/lastupdate/{user}/{drinks}', 'HomeController@lastmakenewbetalling');

Route::get('/history', 'HomeController@history');
Route::get('/bill', 'HomeController@bill');

Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/dashboard/balance', 'HomeController@balance');
Route::post('/dashboard/balance/update', 'HomeController@balanceupdate');
Route::get('/dashboard/paybill', 'HomeController@paybill');
Route::post('/dashboard/paybill/update', 'HomeController@paybillupdate');
Route::get('/dashboard/adddrinks', 'HomeController@adddrinks');
Route::post('/dashboard/adddrinks/update', 'HomeController@adddrinksupdate');
Route::get('/dashboard/updatedrinks', 'HomeController@updatedrinks');
Route::post('/dashboard/updatedrinks/update', 'HomeController@updatedrinksupdate');
Route::get('/dashboard/manageusers', 'HomeController@manageusers');
Route::get('/dashboard/manageusers/upgrade/{user}', 'HomeController@manageusersupgrade');
Route::get('/dashboard/manageusers/downgrade/{user}', 'HomeController@manageusersdowngrade');
Route::get('/dashboard/manageusers/disable/{user}', 'HomeController@manageusersdisable');