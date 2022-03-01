@extends ("layouts.books")

@section("index_list")

    <ul>

        @foreach($publishers as $publisher)

            <li>{{ $publisher->name }}</li>

        @endforeach

    </ul>

@endsection