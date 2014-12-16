@include('layouts.master')

@section('content')

<div class="container">
	<h2>{{$event->name}}</h2>
	<h2>{{date('d/m/Y H:i', $event->start_time)}}</h2>

	@foreach($classes as $class)
	<p>{{ $class->name; }}</p>

	<p>{{ count($class->bookings);}} / {{ $class->maxEntrants; }}</p>


	@foreach($class->bookings as $booking)
	<p>{{$booking->user->name}}</p>

	@endforeach

	@endforeach

</div>

