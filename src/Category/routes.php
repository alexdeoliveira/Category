<?php

Route::group(['prefix' => 'admin/categories', 'as' => 'admin.categories.', 
	'namespace' => 'TrezeVel\Category\Controllers', 'middleware' => ['web']], function(){
    Route::get('/', ['uses' => 'AdminCategoriesController@index', 'as' => 'index']);
    Route::get('/create', ['uses' => 'AdminCategoriesController@create', 'as' => 'create']);
});