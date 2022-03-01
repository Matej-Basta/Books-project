

@if ($errors !== null)

    @foreach($errors->all() as $error)

        <p>{{ $error }}</p>

    @endforeach



@endif

@if (Session::has("success"))
    <p>{{ Session::get("success") }}</p>
@endif