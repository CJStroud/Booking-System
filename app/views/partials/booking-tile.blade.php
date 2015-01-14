<div class="col-xs-12">


<div class="ticket">
	<div class="ticket-header">
			<div class="ticket-event">{{ $booking->raceEvent }}</div>
			<div class="ticket-date">Starts at <span>{{ date('d/m/Y H:i', $booking->startTime) }}</span>
		</div>
	</div>

	<div class="ticket-body">

		<p>Class {{ $booking->raceClass }}</p>
		<p>Transponder #{{ $booking->transponder }}</p>
		<p>Skill Level {{ $booking->skill_level }}</p>

		<div class="col-xs-12 col-sm-2">
			<a class="btn btn-default" href="{{ route('booking.edit', ['id' => $booking->id]) }}">Edit<i class="fa fa-pencil icon-spacing-left"></i></a>
		</div>

		<div class="col-xs-12 col-sm-2">
			{{ Form::open(array('route' => ['booking.destroy', $booking->id], 'method' => 'delete')) }}
			<a class="btn btn-default" href="{{ route('booking.destroy', ['id' => $booking->id]) }}">Cancel<i class="fa fa-remove icon-spacing-left"></i></a>
			{{ Form::close() }}
		</div>

	</div>

</div>

</div>



