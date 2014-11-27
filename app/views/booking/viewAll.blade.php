@include('layouts.master')

<div class="container">
	<h1>My Bookings</h1>

	@if (Session::get('user') == null)
		Must be logged in {{link_to('/login', 'Click Here')}}
	@else
	@if (count($bookings) >0)
	<div class="row">
		<div class="col-sm-3 row-text">
			Event
		</div>
		<div class="col-sm-2 row-text">
			Event Date
		</div>
		<div class="col-sm-3 row-text">
			Class
		</div>
		<div class="col-sm-2 row-text">
			Transponder
		</div>
		<div class="col-sm-2 col-xs-12">
		</div>
	</div>

	@foreach ($bookings as $booking)
	<div class="row">
		{{ Form::open(array('route' => ['booking.destroy', $booking->id], 'method' => 'delete')) }}
		<div class="col-sm-3 row-text">
			{{$booking->EventName}}
		</div>
		<div class="col-sm-2 row-text">
			{{date('d/m/Y H:i', $booking->EventDate)}}
		</div>
		<div class="col-sm-3 row-text">
			{{$booking->ClassName}}
		</div>
		<div class="col-sm-2 row-text">
			{{$booking->transponder}}
		</div>
		<div class="col-sm-2 col-xs-12">
			<button class="btn btn-danger">Cancel</button>
		</div>
		{{Form::close()}}
	</div>
	@endforeach

	@else
		You have no bookings

	@endif
	@endif
</div>
