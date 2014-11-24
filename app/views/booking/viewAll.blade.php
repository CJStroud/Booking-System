@include('layouts.master')

<div class="container">
	<h1>My Bookings</h1>

	@foreach ($bookings as $booking)
	<div class="row">
		{{ Form::open(array('route => booking.destroy')) }}
		{{$booking->EventName . " " . $booking->EventDate . " " . $booking->ClassName . " " . $booking->transponder}}
		<button class="btn btn-danger">Cancel Booking</button>
		{{Form::close()}}
	</div>
	@endforeach
</div>
