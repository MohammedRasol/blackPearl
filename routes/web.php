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
    Route::get("/add-product", "AdminController@addProduct")->name('addProduct');
    Route::get("/edit-product/{id}", "AdminController@editProduct")->name('editProduct');
    Route::POST("/edit-product/{id}", "AdminController@editProductFunction") ;
    Route::get("/all-product", "AdminController@allProduct")->name('allProduct');
    Route::get("/index", "AdminController@index");
    Route::get("/add-product", "AdminController@addProduct")->name("add-product");
    Route::POST("/add-product", "AdminController@addProductFunction");
    Route::group(["prefix" => "ajax"], function () {
        Route::get("/get-product-info/{id}", "AdminController@getProductInfo");
        Route::POST("/save-product-info/{id}", "AdminController@saveProductInfo");
        Route::delete("/delete-product-info/{id}", "AdminController@deleteProductInfo");
        Route::delete("/delete-product-img/{id}", "AdminController@deleteProductImg");
        Route::POST("/add-product-info/{proId}", "AdminController@addProductInfo");
        Route::POST("/add-product-logo/{proId}", "AdminController@addProductLogo");
        Route::GET("/get-sub-category/{catId}", "AdminController@getSubCategory");
    });
});
