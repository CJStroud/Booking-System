@include('layouts.master')

@section('content')

<div class="container">
	<h1>Events</h1>
	<div>{{ link_to_route('event.create', 'Create an event', null, ['class="btn btn-default"']) }}</div>

	@foreach($events as $event)
		<h2>{{$event->name}}</h2>
		<h3>{{date('d/m/Y H:i', $event->event_datetime)}}</h3>
		<h4>{{$event->id}}</h4>
	@endforeach


	<h1>Old Events</h1>
	@foreach($old_events as $event)
		<h2>{{$event->name}}</h2>
		<h3>{{date('d/m/Y H:i', $event->event_datetime)}}</h3>
		<h4>{{$event->id}}</h4>
	@endforeach

</div>

