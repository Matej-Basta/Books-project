<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;
use Session;

class PublisherController extends Controller
{
    public function index()
    {

        $publishers = Publisher::query()->limit(30)->orderBy("name", "asc")->get();

        return view("admin.publishers", compact("publishers"));
    }

    public function create()
    {

        $publisher = new Publisher;

        return view("admin.publisher_form", compact("publisher"));
    }

    public function store()
    {
        $request = request();

        $this->validate($request, [
            "name" => "required",
        ], [
            "name.required" => "The name is required.",
        ]);

        $publisher = new Publisher;

        $publisher->name = $request->input("name");
        $publisher->slug = strtolower(str_replace(" ", "-", $request->input("name"))) . "-publisher";

        $publisher->save();

        session()->flash("success", "Successfully added");

        return redirect(url("admin/publishers/create"));
    }

    public function edit($publisher_id)
    {
        $publisher = Publisher::query()->where("id", $publisher_id)->limit(1)->first();

        session()->flash("id", $publisher_id);

        return view("admin.publisher_form", compact("publisher"));
    }

    public function update()
    {
        $request = request();

        $this->validate($request, [
            "name" => "required",
        ], [
            "name.required" => "The name is required.",
        ]);

        $publisher_id = Session::get("id");

        $publisher = Publisher::query()->where("id", $publisher_id)->limit(1)->first();

        $publisher->name = $request->input("name") ?? $publisher->name;
        $publisher->slug = strtolower(str_replace(" ", "-", $request->input("name"))) . "-publisher";

        $publisher->save();

        session()->flash("success", "Successfully updated");

        return redirect(url("admin/publishers/create"));
    }
}
