<?php

use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'rol:admin,admin1'], function(){
    Route::get('analisis_nutricional', 'AnalisisNutricionalController@index')->name('analisis_nutricional.index');
    Route::get('analisis_nutricional/create','AnalisisNutricionalController@create')->name('analisis_nutricional.create');
    

});