@include('layouts.master')

@section('content')
<div class="events">
	<div class="container">
		@if (Session::get('user') != null && Session::get('user')->isAdmin)
		<div>{{ link_to_route('event.create', 'Create New Event', null, ['class="btn btn-primary create-class"']) }}</div>
		@endif

		<h2>Available to book</h2>

		<div class="tiles">
			@foreach($events as $event)
				@include('partials.event-tile', ['event' => $event])
			@endforeach
		</div>
	</div>
</div>


