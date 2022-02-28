@extends("layouts.authors")


@section("index_list")

    @if ($errors !== null)
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    @endif

    @if ($success !== null)
            <div>{{ $success }}</div>
    @endif

    

    <form action="{{ url('admin/authors') }}" method="post">

        @csrf

        <input type="text" placeholder="name" value="{{ old('name', $author->name) }}" name="name">
        <br>
        <br>
        <textarea name="bio" placeholder="bio" cols="30" rows="10">{{ old("bio", $author->bio) }}</textarea>
        <br>
        <br>
        <button>Submit</button>

    </form>



@endsection