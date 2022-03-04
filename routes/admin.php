<?php

use Illuminate\Support\Facades\Route;


Route::get("/authors", "AuthorController@index");

Route::get("/authors/create", "AuthorController@create");

Route::post("/authors", "AuthorController@store");

Route::get("/books", "BookController@index");

Route::get("/books/create", "BookController@create");

Route::post("/books", "BookController@store");

Route::get("/books/{book_id}", "BookController@edit");

Route::put("/books/{book_id}", "BookController@update");

Route::delete("/review/{review_id}", "BookController@deleteReview")->middleware('can:admin');

//Publishers

Route::get("/publishers", "PublisherController@index");

Route::get("/publishers/create", "PublisherController@create");

Route::post("/publishers", "PublisherController@store");

Route::get("/publishers/{publisher_id}", "PublisherController@edit");

Route::put("/publishers/{publisher_id}", "PublisherController@update");