@extends('layouts.master')

@section('content')


<div class="container">
	<h1>My Bookings</h1>

	@if (empty($bookings))
		<h3 class="text-center"> You have no bookings!</h3>
		<h4 class="text-center">{{ link_to_route('event.index', 'Make some here!') }}</h4>
	@endif


	@foreach ($bookings as $booking)

	@include('partials.booking-tile', ['booking' => $booking])

	@endforeach
	</div>

@stop
