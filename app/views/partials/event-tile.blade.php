<div class="col-xs-12">
	<div class="tile">
		<div class="tile-head">
			<a href="#" class="event-fold">
				<div class="col-xs-12 col-sm-6">
					<h1><i class="fa fa-angle-double-up fa-spacing-right"></i>{{ $event->name }}</h1>
				</div>
				<div class="col-xs-12 col-sm-6">
					<h1 class="date">{{ date('dS F Y', $event->start_time) }}</h1>
				</div>
			</a>
		</div>
		<div class="tile-body">
			<div class="tile-body-content">
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12 col-sm-6">
						<p>Booking Closes</p>
						<div class="time">
							<p>{{ date('d/m/Y', $event->close_time) }} <span>{{ date('H:i', $event->close_time) }}</span></p>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<p>Event Starts</p>
						<div class="time">
							<p>{{ date('d/m/Y', $event->start_time) }} <span>{{ date('H:i', $event->start_time) }}</span></p>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6">
					<div class="col-xs-12">
						<a class="btn btn-simple" href="{{ route('event.show', ['slug' => $event->slug]) }}">View<i class="fa fa-arrow-right fa-spacing-left"></i></a>
					</div>
					<div class="col-xs-12">
						<a class="btn btn-simple" href="{{ route('booking.create', ['slug' => $event->slug]) }}">Book<i class="fa fa-arrow-right fa-spacing-left"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
