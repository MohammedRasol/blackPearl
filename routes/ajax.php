<?php

use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "ajax"], function () {
    Route::group(["prefix" => "admin"], function () {
        #product routes
        Route::get("/get-product-info/{id}", "AjaxAdminController@getProductInfo");
        Route::POST("/save-product-info/{id}", "AjaxAdminController@saveProductInfo");
        Route::delete("/delete-product-info/{id}", "AjaxAdminController@deleteProductInfo");
        Route::delete("/delete-product-img/{id}", "AjaxAdminController@deleteProductImg");
        Route::POST("/add-product-info/{proId}", "AjaxAdminController@addProductInfo");
        Route::GET("/get-sub-category/{catId}", "AjaxAdminController@getSubCategory");
        Route::POST("/active-product/{id}", "AjaxAdminController@activeProduct");

        #category routes
        Route::POST("/add-category-logo/{catId}", "AjaxAdminController@addCategoryImage");



        #Generic routes
        Route::POST("/add-image/{id}", "AjaxAdminController@addImage");
    });
});
