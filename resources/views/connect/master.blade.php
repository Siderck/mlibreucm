<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MercadoLibreUCM - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/static/css/connect.css?v='.time()) }}">
    <script src="https://kit.fontawesome.com/87216d4d65.js" crossorigin="anonymous"></script>
</head>
<body>

    @if(Session::has('message'))
        <div class = "container">
            <div class = "alert alert-{{ Session::get('typealert') }}" style = "display:none;">
                {{ Session::get('message') }}
                @if ($errors->any())
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <script>
                    $('.alert').slideDown();
                    setTimeout(function(){ $('.alert').slideUp(); }, 10000);
                </script>
            </div>
        </div>
    @endif

    @section('content')
    hola mundo
    @show

</body>
</html>
