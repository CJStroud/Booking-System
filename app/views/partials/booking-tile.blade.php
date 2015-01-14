<div class="ticket">
	<div class="ticket-header">
		<div class="col-sm-6">
				<div class="ticket-event">{{ $booking->raceEvent }}</div>
		</div>
		<div class="col-sm-6">
			<div class="ticket-event">{{ $booking->raceClass }}</div>
		</div>
	</div>

	<div class="ticket-body">

		<div class="col-xs-12">
			<div class="ticket-date">Start time <span>{{ date('d/m/Y H:i', $booking->startTime) }}</span>
			</div>
			<p>Transponder #{{ $booking->transponder }}</p>
			<p>Skill Level {{ $booking->skill_level }}</p>
		</div>


		<div class="col-xs-6 col-sm-2 col-sm-offset-8">
			{{ Form::open(array('route' => ['booking.edit', $booking->id], 'method' => 'edit')) }}
			<button type="submit" class="btn btn-primary btn-with-addon"><span class="btn-text">Change</span><span class="btn-addon btn-addon-primary"><i class="fa fa-pencil"></i></span></button>
			{{ Form::close() }}
		</div>

		<div class="col-xs-6 col-sm-2">
			{{ Form::open(array('route' => ['booking.destroy', $booking->id], 'method' => 'delete')) }}
			<button type="submit" class="btn btn-primary btn-with-addon"><span class="btn-text">Cancel</span><span class="btn-addon btn-addon-delete"><i class="fa fa-remove"></i></span></button>
			{{ Form::close() }}
		</div>

	</div>

</div>



