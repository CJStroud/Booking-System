<!doctype html>
<html lang="en">
  <head>
    <title>Booking System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{ HTML::style('css/styles.css') }}

  </head>
  <body>
    @include('partials.navigation')

    @yield('content')

    @section('javascript')
      {{ HTML::script('js/hmcc-booking-system.js') }}
    @show

  </body>
</html>

