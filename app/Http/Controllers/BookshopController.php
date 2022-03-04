<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bookshop;

class BookshopController extends Controller
{
    public function show($bookshop_id)
    {
        $bookshop = Bookshop::findOrFail($bookshop_id);

        return view("bookshop.show", compact("bookshop"));
    }
}
