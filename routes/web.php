<?php

Auth::routes();

##  PANEL
Route::group(['namespace' => 'Panel', 'middleware' => 'auth'], function () {
    
    Route::resource('panel', 'PanelController'); ## INDEX

});

##  SITE
Route::group(['namespace' => 'Site'], function () {
    
    Route::get('/', 'SiteController@index'); ## HOME
    Route::get('promocoes', 'SiteController@promotions')->name('promotions'); ## PROMOÇÕES

});