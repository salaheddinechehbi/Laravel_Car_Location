<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="container-fluid" id="app">
            <div class="row" style="background-color: #eeeeee; padding:10px">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/home') }}" style="padding: 5px" >Home</a>
                        <a href="{{ url('/categorie') }}" style="padding: 5px" >Home</a>
                    @else
                        <a href="{{ route('login') }}" style="padding: 5px" >Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="padding: 5px">Register</a>
                        @endif
                    @endif
                </div>
                @endif
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="text-align: center">Car Rent Services</div>
            </div>

            <br>

            <data-table></data-table>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
