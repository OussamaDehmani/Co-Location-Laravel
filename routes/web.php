<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocationControllers;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();
Route::group(['middlware'=>['auth']],function(){
    Route::POST('/addL','LocationController@store')->name('addL');
    Route::POST('/addD','DemandController@store')->name('addD');
    Route::get('/addLoc',function(){ return view('add_location');})->name('addLoc');
    Route::get('/addDem',function(){ return view('add_demand');})->name('addDem');

});
Route::get('/','LocationController@index')->name('home');
Route::get('/home','LocationController@index')->name('home');
Route::get('/demand','DemandController@index')->name('demand');
Route::get('/showLoc/{id}','LocationController@show')->name('showLoc');
Route::get('/showDem/{id}','DemandController@show')->name('showDem');