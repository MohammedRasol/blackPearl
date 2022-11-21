<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', "HomeController@index");
Route::get('/category/{id}', "HomeController@category");
Route::get('/category/{id}/{subcatid}', "HomeController@subCategory");
Route::get('/home', "HomeController@index")->name('home');
