<?php

Route::group(['prefix' => 'categories', 'namespace' => 'TrezeVel\Category\Controllers'], function(){
    Route::get('test', 'AdminCategoriesController@index');
});