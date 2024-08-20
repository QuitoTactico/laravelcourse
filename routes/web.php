<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
**/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
