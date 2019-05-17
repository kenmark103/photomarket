<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Photomarket</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color:#fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 120vh;
                margin: 0;
                background-image: url('/storage/naure/beautiful-nature-desktop-wallpaper_042321723_304.jpg');
                background-repeat: no-repeat;
                background-size: 100% 100%;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">{{ Auth::user()->name }}</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Jossy Ofcourse
                </div>

                <div class="links">
                    <a href="{{route('about')}}">About</a>
                    <a href="{{route('front.outdoor.index')}}">Outdoors</a>
                    <a href="{{route('front.wedding.index')}}">Weddings</a>
                    <a href="{{route('front.events.index')}}">Events</a>
                    <a href="{{route('front.blog.index')}}">Blog</a>
                    <a href="{{route('about')}}#support">Contact</a>
                </div>
            </div>
        </div>
        @include('includes.footer')
    </body>
</html>
