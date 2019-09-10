<?php

Auth::routes();

##  PANEL
Route::group(['prefix' => 'panel', 'namespace' => 'Panel', 'middleware' => 'auth'], function () {
    
    Route::resource('', 'PanelController'); ## INDEX
    Route::resource('panel/brands', 'BrandController'); ## BRAND

});

##  SITE
Route::group(['namespace' => 'Site'], function () {
    
    Route::get('/', 'SiteController@index'); ## HOME
    Route::get('promocoes', 'SiteController@promotions')->name('promotions'); ## PROMOÇÕES

});