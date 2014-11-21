<!doctype html>
<html lang="en">
	<head>
		<title>Booking System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		{{ HTML::style('components/bootstrap/dist/css/bootstrap.min.css') }}

		{{ HTML::script('components/jquery/dist/jquery.min.js') }}
		{{ HTML::script('components/bootstrap/dist/js/bootstrap.min.js') }}


	</head>
	<body>
		@include('partials.navigation')

		<div class="container">
			@yield('content')
		</div>
		@show

	@section('javascript')

	@show

	</body>
</html>

