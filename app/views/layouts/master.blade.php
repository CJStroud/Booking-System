<!doctype html>
<html lang="en">
    <head>
        <title>Halesowen Model Car Club</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{ HTML::style('css/styles.css') }}

    </head>
    <body>
        @include('partials.navigation')

        @yield('content')

        {{ HTML::script('https://maps.googleapis.com/maps/api/js') }}
        {{ HTML::script('js/hmcc-booking-system.js') }}

        @include('partials.footer')

    </body>
</html>

