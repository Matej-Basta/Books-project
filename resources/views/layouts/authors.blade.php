<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Authors</title>
</head>
<body style="width: 100%; min-height: 100vh; display: flex; justify-content: center; align-items: center; flex-direction: column">

@auth
<form action="{{ route('logout') }}" method="post">
 
 @csrf

 <button>Logout</button>

</form>

@endauth

@guest

    <a href="{{url('/login')}}">login</a>

@endguest
    
    @include("components.alerts")

    @yield("index_list")

</body>
</html>