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
    


    <form action="{{ $publisher->id ? url('admin/publishers/' . $publisher->id) : url('admin/publishers') }}" method="post">

        @if($publisher->id)

            @method("put")

        @endif

        @csrf

        <input type="text" name="name" value="{{ old('name', $publisher->name) }}" placeholder="name">
        <br>
        <br>
        <button>Submit</button>

    </form>



@endsection