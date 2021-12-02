<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Churchill Events</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/headers.css') }}" rel="stylesheet">

</head>
<body>
    
    <div class="container-fluid d-flex p-3 bg-dark text-white">

        <div class="container .col-sm-6 .col-lg-8 d-flex flex-wrap align-items-start justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <h1 class="">Churchill Events</h1>
            </a>
        </div>

        <div class="container .col-6 .col-lg-4 d-flex justify-content-between">

            <div class="d-flex p-2 justify-content-between">
                <a href="{{ route('tickets') }}" class="text-white text-decoration-none">
                    <button class="btn btn-primary">My Tickets</button>
                </a>
                <a href="{{ route('events') }}" class="text-white text-decoration-none">
                    <button class="btn btn-primary">Events</button>
                </a>
            </div>

            <div class="d-flex justify-content-between p-2">
                @if (auth()->user())
                    <span class="mt-1 mr-3"><p>{{ auth()->user()->name }}</p></span>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-outline-light me-2" type="submit">Sign Out</button>
                    </form>
                @else
                    <a href="{{ route('login') }}"><button type="button" class="btn btn-outline-success me-2">Login</button></a>
                    <a href="{{ route('register') }}"><button type="button" class="btn btn-outline-warning">Sign-up</button></a>
                    <a href="{{ route('password.request') }}"><button type="button" class="btn btn-outline-warning">Forgot Password</button></a>
                @endif
            </div>

        </div>
    </div>

    <div class="container d-grid gap-3 p-3">
        @yield('content')
    </div>

</body>
</html>