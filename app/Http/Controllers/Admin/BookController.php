<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Review;
use Session;
use App\Rules\ReviewUniqueForBookUser;

class BookController extends Controller
{
    public function index()
    {

        $books = Book::query()->limit(30)->orderBy("title", "asc")->get();

        return view("admin.books", compact("books"));
    }

    public function create()
    {

        $book = new Book;

        return view("admin.books_form", compact("book"));
    }

    public function store()
    {
        $request = request();

        $this->validate($request, [
            "title" => "required",
            "price" => "numeric",
            "pages" => "numeric",
            "isbn" => "numeric",
        ], [
            "title.required" => "The title is required.",
            "price.numeric" => "The price must be a number",
            "pages.numeric" => "The pages must be a number",
            "isbn.numberic" => "The isbn must be a number",
        ]);

        $book = new Book;

        $book->title = $request->input("title");
        $book->slug = strtolower(str_replace(" ", "-", $request->input("title"))) . "-" . $request->input("isbn");
        $book->price = $request->input("price");
        $book->isbn = $request->input("isbn");
        $book->publication_date = $request->input("publication_date");
        $book->language = $request->input("language");
        $book->pages = $request->input("pages");

        $book->save();

        session()->flash("success", "Successfully added");

        return redirect(url("admin/books/create"));
    }

    public function edit($book_id)
    {
        $book = Book::query()->where("id", $book_id)->limit(1)->first();

        session()->flash("id", $book_id);

        return view("admin.books_form", compact("book"));
    }

    public function update()
    {
        $request = request();

        $this->validate($request, [
            "title" => "required",
            "price" => "numeric",
            "pages" => "numeric",
            "isbn" => "numeric",
        ], [
            "title.required" => "The title is required.",
            "price.numeric" => "The price must be a number",
            "pages.numeric" => "The pages must be a number",
            "isbn.numberic" => "The isbn must be a number",
        ]);

        $book_id = Session::get("id");

        $book = Book::query()->where("id", $book_id)->limit(1)->first();

        $book->title = $request->input("title") ?? $book->title;
        $book->slug = strtolower(str_replace(" ", "-", $request->input("title"))) . "-" . $request->input("isbn");
        $book->price = $request->input("price") ?? $book->price;
        $book->isbn = $request->input("isbn") ?? $book->isbn;
        $book->publication_date = $request->input("publication_date") ?? $book->publication_date;
        $book->language = $request->input("language") ?? $book->language;
        $book->pages = $request->input("pages")?? $book->pages ;

        $book->save();

        session()->flash("success", "Successfully updated");

        return redirect(url("admin/books/create"));
    }

    public function show($book_id)
    {

        $book = Book::findOrFail($book_id);

        return view("info_book", compact("book"));
    }

    public function storeReview($book_id)
    {
        $request = request();
        
        $this->validate($request, [
            'review' => [
                'required', "max:255", new ReviewUniqueForBookUser
            ],
        ]);

        
 


        $review = new Review;

        $review->text = $request->input("review");
        $review->book_id = $book_id;
        $review->user_id = auth()->id();

        $review->save();

        session()->flash("success", "successfuly saved");

        return redirect()->action("Admin\BookController@show", ["book_id" => $book_id]);
    }
}
