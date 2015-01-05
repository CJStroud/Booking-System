<!doctype html>
<html lang="en">
    <head>
        <title>Halesowen Model Car Club</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{ HTML::style('css/styles.css') }}

    </head>
    <body>
        @include('partials.navigation')

        <div class="container">
            @yield('content')
            @show

        </div>

    @section('javascript')
        {{ HTML::script('https://maps.googleapis.com/maps/api/js') }}
        {{ HTML::script('js/hmcc-booking-system.js') }}

    @show

    @include('partials.footer')

    </body>
</html>

