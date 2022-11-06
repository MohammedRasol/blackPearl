<?php

use Illuminate\Support\Facades\Route;

use App\Mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(["verify" => true]);
Route::get('/', "HomeController@index");
Route::get('/home', "HomeController@index")->name('home');

Route::group(["prefix" => "admin"], function () {
    Route::get("login", "AdminController@login")->name('admin-login');
    Route::get("index", "AdminController@index")->name('index');
});
