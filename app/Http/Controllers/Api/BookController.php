<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function latest()
    {
        $books = Book::query()->limit(10)->orderBy("publication_date", "desc")->get();

        return $books;
    }
}
