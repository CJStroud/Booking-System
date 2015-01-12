<div class="tile">

	<div class="tile-head">
		<a href="#" class="fold">
			<div class="col-xs-12 col-sm-6">
				<h1><i class="fa fa-angle-double-up icon-spacing-right"></i>{{ $booking->raceEvent }}</h1>
			</div>
			<div class="col-xs-12 col-sm-6">
				<h1 class="date">{{ date('jS F Y', $booking->startTime) }}</h1>
			</div>
		</a>
	</div>

	<div class="tile-body">
		<div class="tile-body-content">
			<div class="col-xs-12 col-sm-8">
				<div class="col-xs-12 col-sm-6">
					<p>Transponder</p>
					<div class="field time">
						<p> #{{ $booking->transponder }}</p>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<p>Skill Level</p>
					<div class="field time">
						<p>{{ $booking->skill_level }}</p>
					</div>
				</div>
			<div class="col-xs-12 col-sm-12">
				<p>Class Name</p>
				<div class="field time">
					<p>{{ $booking->raceClass }}</p>
				</div>
			</div>
			</div>

			<div class="col-xs-12 col-sm-4">
				<div class="col-xs-12">
					<a class="btn btn-simple btn-lg" href="{{ route('booking.edit', ['id' => $booking->id]) }}">Edit<i class="fa fa-pencil icon-spacing-left"></i></a>
					{{ Form::open(array('route' => ['booking.destroy', $booking->id], 'method' => 'delete')) }}
						<a class="btn btn-simple btn-lg" href="{{ route('booking.destroy', ['id' => $booking->id]) }}">Cancel<i class="fa fa-remove icon-spacing-left"></i></a>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

</div>



