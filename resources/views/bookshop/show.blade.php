@extends("layouts.bookshop", ["name" => $bookshop->name])

@section("content")

    	<h1>{{$bookshop->name }}</h1>

        <p><strong>Location:</strong>{{$bookshop->city}}</p>
        <br>
        <br>
        <p><strong>Available books:</strong></p>
        <ul>
            @foreach($bookshop->books as $book)
                <li>{{$book->title}}</li>
            @endforeach
        </ul>


@endsection