<?php

use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "admin"], function () {
    Route::group(["middleware" => "redirectAuthAdmin"], function () {
        Route::get("login", "AdminController@login")->name('admin-login');
        Route::post("login", "AdminController@loginMethod")->name("loginMethod");
    });
    Route::get("/index", "AdminController@index");
    Route::get("/", "AdminController@index")->name('index');

    /* product Routes */
    Route::get("/all-products", "AdminController@allProducts")->name('allProducts');
    Route::POST("/all-products", "AdminController@searchProducts")->name('searchProducts');
    Route::get("/add-product", "AdminController@addProduct")->name('addProduct');
    Route::POST("/add-product", "AdminController@addProductFunction");
    Route::get("/edit-product/{id}", "AdminController@editProduct")->name('editProduct');
    Route::POST("/edit-product/{id}", "AdminController@editProductFunction");

    /* Category Routes */
    Route::get("/all-categories", "AdminController@allCategories")->name('allCategories');
    Route::get("/edit-category/{id}", "AdminController@getCategory")->name('getCategory');
    Route::POST("/edit-category/{id}", "AdminController@editCategory") ;
});
