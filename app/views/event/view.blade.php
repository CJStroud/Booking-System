@include('layouts.master')

@section('content')

<div class="container">

	<h2>{{$event->name . " - " . date('d/m/Y H:i', $event->event_datetime)}}</h2>
	<hr>
	@foreach($classes as $class)
		<div>{{$class->class_id}}</div>

	@foreach($class->bookings as $booking)
	<div>Name: {{ $booking->forename . " " . $booking->surname }}</div>
	@endforeach

	@endforeach
</div>
