@extends("layouts.authors")

@section("index_list")

    

    <h1>{{ $book->title }}</h1>

    <ul>
        <li>Price: {{ $book->price }}</li>
        <li>Publication: {{ $book->publication_date }}</li>
        <li>Description: {{ $book->description }}</li>
    </ul>

    <br>

    @foreach ($book->reviews as $review)
        <p>{{ $review->user->name }} : {{ $review->text }}</p>

    @endforeach
    
    @auth
    @include("components.review")
    @endauth

@endsection