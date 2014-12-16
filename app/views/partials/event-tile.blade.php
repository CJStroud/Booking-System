<div class="col-xs-12 col-sm-4">
	<div class="tile">
		<div class="tile-head bg-primary">
			<div class="col-xs-12">
				<h4 class="text-center">{{ $event->name }}</h4>
			</div>
		</div>
		<div class="tile-body">
				<p>Closes</p>
			<div class="col-xs-12">
				<p>{{ date('dS F Y H:i', $event->close_time) }}</p>
			</div>
				<p>Starts</p>
			<div class="col-xs-12">
				<p>{{ date('dS F Y H:i', $event->start_time) }}</p>
			</div>
			<div class="col-xs-12 col-sm-6 ">
				<a class="btn btn-primary" href="{{ route('event.show', ['id' => $event->id]) }}">View</a>
			</div>
			<div class="col-xs-12 col-sm-6 ">
				<a class="btn btn-primary" href="{{ route('booking.create', ['slug' => $event->slug]) }}">Book</a>
			</div>
		</div>
	</div>
</div>
