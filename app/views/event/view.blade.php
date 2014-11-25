@include('layouts.master')

@section('content')

<div class="container">

	<h2>{{$event->name . " - " . date('d/m/Y H:i', $event->event_datetime)}}</h2>
	<hr>

	@foreach($bookings as $booking)
	<div>Name: {{ $booking->forename . " " . $booking->surname }}</div>
	<div>Class: {{ $booking-> }}</div>
	@endforeach
</div>
