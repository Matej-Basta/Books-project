@extends("layouts.authors")

@section("index_list")

<form action="{{ route('login') }}" method="post">
 
 @csrf
    <label for="">Email:</label>
    <br>
 <input type="email" name="email" value="{{ old('email') }}">
 <br>
 <br>
 <label for="">Password:</label>
 <br>

 <input type="password" name="password" value="">
 <br>
 <br>

 <button>Login</button>

</form>

@endsection