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
Route::get("/",'ImagesController@showall');
Route::get("image",'ImagesController@index');
Route::any("store",'ImagesController@store');
Route::get("show/{id}",'ImagesController@show');
Route::get("edit/{id}",'ImagesController@edit');
Route::any("update/{id}",'ImagesController@update');
Route::get("delete/{id}",'ImagesController@delete');

/*
Route::get('/', function () {
    return view('welcome');
});
*/