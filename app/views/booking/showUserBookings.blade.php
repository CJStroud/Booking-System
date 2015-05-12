@extends('layouts.master')

@section('content')


<div class="container">
	<h1>My Bookings</h1>
@if (!Auth::check())
	<div class="container">
		Must be logged in {{ link_to_route('user.login', 'Click Here') }}
	</div>
@else

	@foreach ($bookings as $booking)

	@include('partials.booking-tile', ['booking' => $booking])

	@endforeach
	</div>

@endif



@stop
