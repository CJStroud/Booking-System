<!doctype html>
<html lang="en">
  <head>
      <title>Halesowen Model Car Club</title>
      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
      <link rel="shortcut icon" type="image/png" href="/img/favicon.png?v=2">
      <meta name="_token" content="{{ csrf_token() }}" />
      <meta name=”description” content="We are Halesowen Model Car Club, a friendly club that races every friday at Hadden Hill Leisure Centre 18.30-22:30pm. Our Attendance is always good and we have various abilities of drivers through out the club. The atmosphere is always very friendly so if you want a good nights racing then come along and join us.">
      <meta name="robots" content="index, follow">
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
