<!doctype html>
<html lang="en">
	<head>
		<title>Booking System</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		{{ HTML::style('components/bootstrap/dist/css/bootstrap.min.css') }}
		{{ HTML::style('components/bootstrap-select/dist/css/bootstrap-select.min.css') }}
		{{ HTML::style('components/font-awesome/css/font-awesome.min.css')}}
		{{ HTML::style('css/styles.css') }}

		<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

		{{ HTML::script('components/jquery/dist/jquery.min.js') }}
		{{ HTML::script('components/bootstrap/dist/js/bootstrap.min.js') }}
		{{ HTML::script('components/bootstrap-select/dist/js/bootstrap-select.min.js') }}



	</head>
	<body>
		@include('partials.navigation')

		<div class="container">
			@yield('content')
			@show
		</div>

	@section('javascript')
		{{ HTML::script('js/class.js') }}
		{{ HTML::script('js/script.js') }}
	@show

	</body>
</html>

