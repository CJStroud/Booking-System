@include('layouts.master')

@section('content')

<div class="container">
	<h2>{{$event->name}}</h2>
	<h2>{{date('d/m/Y H:i', $event->event_datetime)}}</h2>
</div>

@foreach($classes as $class)
<div class="table">
	<div class="class-header">
		<div class="col-xs-12">
			<div class="container">
			@if (Session::get('user') != null && Session::get('user')->isAdmin)

			@if($class->locked)
			{{Form::open(array('action' => ['EventController@unlock', $class->class_id, $event->id], 'method' => 'post'))}}
			<button class="btn btn-primary btn-lock">
			<i class="fa fa-lock"></i> Locked</button>

			@else
			{{Form::open(array('action' => ['EventController@lock', $class->class_id, $event->id], 'method' => 'post'))}}
			<button class="btn btn-primary btn-lock">
			<i class="fa fa-unlock"></i> Unlocked</button>
			@endif
			@endif

			{{$class->name}}

			<div class="pull-right">
				<div class="label label-primary">
					{{$class->count}} / {{$class->max}}
				</div>
			</div>
			</div>
			{{Form::close()}}
		</div>
	</div>
	<div class="table-header table-row">
		<div class="container">
			<div class="col-sm-3">
				<div class="table-element">Name</div>
			</div>
			<div class="col-sm-2">
				<div class="table-element">Transponder</div>
			</div>
			<div class="col-sm-3">
				<div class="table-element">Frequencies</div>
			</div>
			<div class="col-sm-2">
				<div class="table-element">Skill Level</div>
			</div>
			<div class="col-sm-2">
				<div class="table-element">BRCA Number</div>
			</div>
		</div>
	</div>

		@foreach($class->bookings as $booking)
		<div class="table-row">
			<div class="container">
				<div class="col-xs-12 col-sm-3">
					<div class="table-element">
						<div class="mobile-title">Name: </div>{{ $booking->forename . " " . $booking->surname }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-2">
					<div class="table-element">
						<div class="mobile-title">Transponder: </div>{{"#" . $booking->transponder }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-3">
					<div class="table-element">
						<div class="mobile-title">Frequencies: </div> {{$booking->frequency_1 . " | " . $booking->frequency_2 . " | " . $booking->frequency_3 }}
					</div>
				</div>
				<div class="col-xs-12 col-sm-2">
					<div class="table-element">
						<div class="mobile-title">Skill Level: </div>{{$booking->skill}}
					</div>
				</div>
				<div class="col-xs-12 col-sm-2">
					<div class="table-element">
						<div class="mobile-title">BRCA Number: </div>#{{$booking->brca}}
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	@endforeach
<div class="container">
</div>
