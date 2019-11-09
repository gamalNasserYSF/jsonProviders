<?php


Route::group(['prefix' => 'v1', "namespace" => "API"], function () {

    Route::get('users', 'UserController@index');

});



