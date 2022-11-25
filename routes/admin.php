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
    Route::get("/all-products/{subCatId}", "AdminController@allProducts");
    Route::get("/add-product", "AdminController@addProduct")->name('addProduct');
    Route::POST("/add-product", "AdminController@addProductFunction");
    Route::POST("/all-products", "AdminController@searchProducts")->name('searchProducts');
    Route::get("/edit-product/{id}", "AdminController@editProduct")->name('editProduct');
    Route::POST("/edit-product/{id}", "AdminController@editProductFunction");

    /* Category Routes */
    Route::get("/all-categories", "AdminController@allCategories")->name('allCategories');
    Route::get("/all-categories/{id}", "AdminController@allSubCategories")->name('allSubCategories');
    Route::get("/edit-category/{id}", "AdminController@getCategory")->name('getCategory');
    Route::get("/add-category", "AdminController@addCategory")->name('addCategory');
    Route::get("/add-category/{id}", "AdminController@addCategory")->name('addSubCategory');
    Route::POST("/add-category", "AdminController@addCategoryFunction");
    Route::POST("/edit-category/{id}", "AdminController@editCategory");

    /*Use Routes */
    Route::get("/all-users", "AdminController@allUsers")->name('allUsers');
    Route::POST("/all-users", "AdminController@allUsersByName");
    Route::get("/edit-user/{id}", "AdminController@getUser")->name('getUser');
    Route::get("/add-user", "AdminController@getUser")->name("addUser");
    Route::POST("/add-user", "AdminController@addUser");
    Route::POST("/edit-user/{id}", "AdminController@saveUser")->name('saveUser');

    /*Countries  Routes */
    Route::get("/all-countries", "AdminController@allCountries")->name('allCountries');
    Route::get("/edit-country/{id}", "AdminController@getCountry")->name('getCountry');
    Route::POST("/edit-country/{id}", "AdminController@editCountry");
    Route::get("/add-country", "AdminController@addCountry")->name('addCountry');
    Route::POST("/add-country", "AdminController@addCountryFunction");

    /*Countries  Routes */
    Route::get("/edit-city/{id}", "AdminController@getCity")->name('editCity');
    Route::POST("/edit-city/{id}", "AdminController@getCity");
    Route::get("/get-country-cites/{id}", "AdminController@getCountryCites")->name('countryCites');
    Route::get("/add-city", "AdminController@addCountry")->name('addCity');
});
