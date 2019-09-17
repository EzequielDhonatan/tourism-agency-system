<?php

Auth::routes();

##  PANEL
Route::group(['prefix' => 'panel', 'namespace' => 'Panel', 'middleware' => 'auth'], function () {
    
    Route::resource('', 'PanelController'); ## INDEX

    ## BRAND
    Route::resource('brands', 'BrandController'); ## BRAND
    Route::get('brands/{id}/planes', 'BrandController@planes')->name('brands.planes'); ## BRAND PLANE
    Route::any('brands/search', 'BrandController@search')->name('brands.search'); ## SEARCH BRAND

    ## PLANE
    Route::resource('planes', 'PlaneController'); ## PLANE
    Route::any('planes/search', 'PlaneController@search')->name('planes.search'); ## SEARCH PLANE

    ## STATE
    Route::get('states', 'StateController@index')->name('states.index'); ## STATE
    Route::any('states/search', 'StateController@search')->name('states.search'); ## SEARCH STATE

    ## CITY
    Route::get('states/{initials}/cities', 'CityController@index')->name('state.cities'); ## CITY
    Route::any('states/{initials}/search', 'CityController@search')->name('state.cities.search'); ## SEARCH CITY

    ## FLIGHT
    Route::resource('flights', 'FlightController'); ## FLIGHT
    Route::any('flights/search', 'FlightController@search')->name('flights.search'); ## SEARCH FLIGHT

    ## AIRPORT
    Route::resource('city/{id}/airports', 'AirportController'); ## AIRPORT

});

##  SITE
Route::group(['namespace' => 'Site'], function () {
    
    Route::get('/', 'SiteController@index'); ## HOME
    Route::get('promocoes', 'SiteController@promotions')->name('promotions'); ## PROMOÇÕES

});