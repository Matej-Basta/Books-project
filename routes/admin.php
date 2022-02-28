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