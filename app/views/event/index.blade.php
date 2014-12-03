@include('layouts.master')

@section('content')

<div class="container">

	@if (Session::get('user') != null && Session::get('user')->isAdmin)
	<div>{{ link_to_route('event.create', 'Create New Event', null, ['class="btn btn-primary create-class"']) }}</div>
	@endif

	<h2>Available to book</h2>
</div>
	<div class="table">
		<div class="table-header">
			<div class="container">
				<div class="col-sm-4">
					<div class="header-element">Name</div>
				</div>
				<div class="col-sm-3">
					<div class="header-element">Date</div>
				</div>
			</div>
		</div>


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
					<div class="table-element">
						<button class="btn btn-primary">View</button>
					</div>
				</div>
			</form>
			<form action="booking/create/{{$event->slug}}">
				<div class="col-xs-12 col-sm-2">
					<div class="table-element">
						<button class="btn btn-primary">Book</button>
					</div>
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
		<div class="table-header">
			<div class="container">
				<div class="col-sm-4">
					<div class="header-element">Name</div>
				</div>
				<div class="col-sm-3">
					<div class="header-element">Date</div>
				</div>
			</div>
		</div>

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
					<div class="table-element">
						<button class="btn btn-primary">View</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	@endforeach
	</div>


