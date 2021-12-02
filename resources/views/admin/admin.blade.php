<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/headers.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container-fluid d-flex p-3 bg-dark text-white fixed-posi">
        <h1><a href="{{ route('admin') }}">Admin</a></h1>
    </div>
    <div class="container m-0">
        @yield('content');
    </div>
</body>
</html>