@extends ("layouts.books")

@section("index_list")

    <ul>

        @foreach($books as $book)

            <li>{{ $book->title }}</li>

        @endforeach

    </ul>

@endsection