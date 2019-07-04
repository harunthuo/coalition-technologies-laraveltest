<?php
Route::get('/', ['uses' => 'WebpageController@index']);
Route::post('/', ['uses' => 'WebpageController@store']);