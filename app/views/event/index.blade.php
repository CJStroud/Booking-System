@include('layouts.master')

@section('content')

<div class="container">

	<h2>Available to book</h2>
</div>
	<div class="table">
		@foreach($events as $event)
		<div class="table-row">
			<div class="container">
			<div class="col-xs-12 col-sm-4">
				<div class="table-element">{{$event->name}}</div>
			</div>

			<div class="col-xs-12 col-sm-3">
				<div class="table-element">{{date('d/m/Y H:i', $event->event_datetime)}}</div>
			</div>
			<form action="event/{{$event->slug}}">
				<div class="col-xs-12 col-sm-2">
					<button class="btn btn-primary" type="submit">View</button>
				</div>
			</form>
			<form action="booking/create/{{$event->slug}}">
				<div class="col-xs-12 col-sm-2">
					<button class="btn btn-primary">Book</button>
				</div>
			</form>
			</div>
		</div>
		@endforeach
	</div>

	<div class="container">
		<h2>Closed</h2>
	</div>
	<div class="table">
	@foreach($old_events as $event)
	<div class="table-row">
		<div class="container">
			<div class="col-xs-12 col-sm-4">
				<div class="table-element">{{$event->name}}</div>
			</div>

			<div class="col-xs-12 col-sm-3">
				<div class="table-element">{{date('d/m/Y H:i', $event->event_datetime)}}</div>
			</div>
			<form action="event/{{$event->slug}}">
				<div class="col-xs-12 col-sm-2">
					<button class="btn btn-primary" type="submit">View</button>
				</div>
			</form>
		</div>
	</div>
	@endforeach
	</div>


