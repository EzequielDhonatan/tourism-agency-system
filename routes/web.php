<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Panel'], function () {
    
    ##  PANEL
    Route::resource('home', 'PanelController'); ## HOME

});