@extends("layouts.books")

@section("index_list")

    @if ($errors !== null)

        @foreach ($errors->all() as $error)

            <p>{{ $error }}</p>

        @endforeach

    @endif

    @if(Session::has("success"))

        <p>{{Session::get("success")}}</p>

    @endif
    


    <form action="{{ $book->id ? url('admin/books/' . $book->id) : url('admin/books') }}" method="post">

        @if($book->id)

            @method("put")

        @endif

        @csrf

        <input type="text" name="title" value="{{ old('title', $book->title) }}" placeholder="title">
        <br>
        <br>
        <input type="number" name="price" value="{{ old('price', $book->price) }}" placeholder="price">
        <br>
        <br>
        <input type="text" name="publication_date" value="{{ old('publication_date', $book->publication_date) }}" placeholder="publication date">
        <br>
        <br>
        <input type="text" name="language" placeholder="language" value="{{ old('language', $book->language) }}">
        <br>
        <br>
        <input type="number" name="pages" placeholder="pages" value="{{ old('pages', $book->pages) }}">
        <br>
        <br>
        <input type="number" name="isbn" placeholder="isbn" value="{{ old('isbn', $book->isbn) }}">
        <br>
        <br>
        <button>Submit</button>

    </form>



@endsection