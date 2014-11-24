@include('layouts.master')

@section('content')

<div class="container">

	<h2>Available to book</h2>
	<hr>
	@foreach($events as $event)
	<div class="table-row row">
		<div class="col-xs-12 col-sm-4 row-text">{{$event->name}}</div>
		<div class="col-xs-12 col-sm-3 row-text">{{date('d/m/Y H:i', $event->event_datetime)}}</div>
		<form action="event/{{$event->slug}}">
			  <button class="col-xs-4 col-sm-2 btn btn-success btn-standard" type="submit">View</button>
		</form>
		<form action="booking/create/{{$event->slug}}">
				<button class="col-xs-4 col-sm-2 btn btn-primary btn-standard">Book</button>
			</form>
		</div>

	@endforeach

	<h2 class="second-header">Closed</h2>
	<hr>
	@foreach($old_events as $event)
	<div class="table-row row">
		<div class="col-xs-12 col-sm-4 row-text">{{$event->name}}</div>
		<div class="col-xs-12 col-sm-3 row-text">{{date('d/m/Y H:i', $event->event_datetime)}}</div>
		<form action="event/{{$event->slug}}">
			<button class="col-xs-4 col-sm-2 btn btn-success btn-standard" type="submit">View</button>
		</form>
	</div>
	@endforeach

</div>

