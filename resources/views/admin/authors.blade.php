@extends("layouts.authors")

@section("index_list")
    
    <ul>

    @foreach ($authors as $author)

        <li>{{ $author->name }}</li>

    @endforeach

    </ul>

@endsection