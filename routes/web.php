<?php

use Illuminate\Support\Facades\Route;

Auth::routes(["verify" => true]);
Route::get('/', "HomeController@index");
Route::get('/category/{id}', "HomeController@category");
Route::get('/category/{id}/{subcatid}', "HomeController@subCategory");
Route::get('/home', "HomeController@index")->name('home');

Route::group(["prefix" => "admin"], function () {
    Route::group(["middleware" => "redirectAuthAdmin"], function () {
        Route::get("login", "AdminController@login")->name('admin-login');
        Route::post("login", "AdminController@loginMethod")->name("loginMethod");
    });
    Route::get("/", "AdminController@index")->name('index');
    Route::get("/index", "AdminController@index");
});
