<?php

Route::get('/', function () {
    return view('welcome');
});

##  SITE
Route::group(['namespace' => 'Site'], function () {
    
    Route::get('/', 'SiteController@index'); ## HOME
    Route::get('promocoes', 'SiteController@promotions')->name('promotions'); ## PROMOÇÕES

});

##  PANEL
Route::group(['namespace' => 'Panel'], function () {
    
    Route::resource('home', 'PanelController'); ## HOME

});