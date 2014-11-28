@include('layouts.master')

@section('content')

<div class="container">

	<h2>{{$event->name}}</h2>
	<h2>{{date('d/m/Y H:i', $event->event_datetime)}}
	</h2>
	<hr>

	@foreach($classes as $class)
	<div class="table">
	<div class="class-header">
		@if (Session::get('user') != null && Session::get('user')->isAdmin)
		@if($class->locked)
		{{Form::open(array('action' => ['EventController@unlock', $class->class_id, $event->id], 'method' => 'post'))}}
		<button class="btn btn-primary btn-lock">
		<i class="fa fa-lock"></i></button> Locked

		@else
		{{Form::open(array('action' => ['EventController@lock', $class->class_id, $event->id], 'method' => 'post'))}}
		<button class="btn btn-primary btn-lock">
		<i class="fa fa-unlock"></i></button> Unlocked
		@endif
		@endif

		{{$class->name}} <div class="class-count label label-primary"> {{$class->count}} / {{$class->max}}</div>
		{{Form::close()}}
	</div>
		<div class="table-content">
		<div class="row">
		<div class="col-sm-3">Name</div>
		<div class="col-sm-2">Transponder</div>
		<div class="col-sm-4">Frequencies</div>
		<div class="col-sm-3">BRCA Number</div>
		</div>
			<div class="break"></div>
		@foreach($class->bookings as $booking)

		<div class="row">
		<div class="col-sm-3">
		{{ $booking->forename . " " . $booking->surname }}
		</div>
		<div class="col-sm-2">
		{{"#" . $booking->transponder }}
		</div>
		<div class="col-sm-4">
			{{$booking->frequency_1 . " | " . $booking->frequency_2 . " | " . $booking->frequency_3 }}
		</div>
		<div class="col-sm-3">
			{{$booking->brca}}
		</div>
		</div>

	@endforeach
		</div>
	</div>
	@endforeach

</div>
