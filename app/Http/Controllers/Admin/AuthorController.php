<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use Session;

class AuthorController extends Controller
{
    public function index()
    {
        
        $authors = Author::query()->orderBy("name", "asc")->limit(30)->get();
     
        
        return view("admin.authors", compact("authors"));
    }

    public function create()
    {

        // $errors = null;
        $success = null;

      

        $author = new Author;

        // if (Session::has("errors")) {
        //     $errors = Session::get("errors");
        // }

        if (Session::has("success")) {
            $success = Session::get("success");
        }

        return view("admin.form", compact("success", "author"));

    }

    public function store()
    {

        $request = request();

        $request->flash();

        $this->validate($request, [
            "name" => "required",
        ], [
            "name.required" => "The name is required, graah."
        ]);

        // $valid = true;
        // $errors = [];

        // if ($request->input("name") == false) {
        //     $valid = false;
        //     $errors[] = "Name cannot be empty.";
        // }

        // if (!$valid) {
        //     session()->flash("errors", $errors);

        //     return redirect(url("admin/authors/create"));
        // } else {

            $author = new Author;

            $author->name = $request->input("name");
            $author->bio = $request->input("bio");
            $author->slug = strtolower(str_replace(" ", "-", $request->input("name"))) . "-author";
            $author->save();

            session()->flash("success", "Successfully added");

            return redirect(url("admin/authors/create"));

        // }

    }
}
