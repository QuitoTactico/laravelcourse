<?php

use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
**/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/about', function () { 
    $data1 = "About us - Online Store"; 
    $data2 = "About us"; 
    $description = "This is an about page ..."; 
    $author = "Developed by: Esteban Vergara Giraldo"; 
    return view('home.about')->with("title", $data1) 
      ->with("subtitle", $data2) 
      ->with("description", $description) 
      ->with("author", $author); 
})->name("home.about"); 

Route::get('/contact', function () { 
    $data1 = "Contact us - Online Store"; 
    $data2 = "Contact us"; 
    $email = "miau@gmail.com"; 
    $address = "Cárcel Bellavista: Diagonal 44 # 39 - 145 Barrio Las Vegas, Bello (Antioquia)"; 
    $phone_number = "666 666 6666"; 
    return view('home.contact')->with("title", $data1) 
      ->with("subtitle", $data2) 
      ->with("email", $email) 
      ->with("address", $address) 
      ->with("phone_number", $phone_number); 
})->name("home.contact"); 

# ------------PRODUCTS-----------------

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index"); 

Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");