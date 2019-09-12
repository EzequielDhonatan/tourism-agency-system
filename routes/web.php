<?php

Auth::routes();

##  PANEL
Route::group(['prefix' => 'panel', 'namespace' => 'Panel', 'middleware' => 'auth'], function () {
    
    Route::resource('', 'PanelController'); ## INDEX

    ## BRAND
    Route::resource('brands', 'BrandController'); ## BRAND
    Route::any('brands/search', 'BrandController@search')->name('brands.search'); ## SEARCH BRAND

    ## PLANE
    Route::resource('planes', 'PlaneController'); ## PLANE
    Route::any('planes/search', 'PlaneController@search')->name('planes.search'); ## SEARCH PLANE

});

##  SITE
Route::group(['namespace' => 'Site'], function () {
    
    Route::get('/', 'SiteController@index'); ## HOME
    Route::get('promocoes', 'SiteController@promotions')->name('promotions'); ## PROMOÇÕES

});