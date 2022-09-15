<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'ciao') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
    </head>
    
    <body>
        <div id="root">
            shkajhsfjk
            <!-- <div class="flex-center position-ref full-height">
                <h1>Ciao a tutti</h1>
                @if (Route::has('login'))
                    <div class="top-right links">
                        @auth
                            <a href="{{ route ('restaurant.dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div> -->
        </div>
        <script src="{{ asset('js/front.js') }}"></script>
    </body>
</html>
