<!doctype html>
<html lang="en">
  <head>
      <title>Halesowen Model Car Club</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
      <link rel="shortcut icon" type="image/png" href="img/favicon.png?v=2">
      
      {{ HTML::style('css/styles.css') }}

  </head>
  <body>
      @include('partials.navigation')

      @yield('content')

      {{ HTML::script('https://maps.googleapis.com/maps/api/js') }}
      {{ HTML::script('js/hmcc-booking-system.js') }}
      
      @yield('javascript')

      @include('partials.footer')

  </body>
</html>

