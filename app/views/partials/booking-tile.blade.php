<h1>{ $booking->raceEvent }}</h1>

<h1 class="date">{{ date('d/m/Y H:i', $booking->startTime) }}</h1>

<p>Transponder</p>

<p> #{{ $booking->transponder }}</p>
<p>Skill Level</p>
<p>{{ $booking->skill_level }}</p>

<p>Class Name</p>
<p>{{ $booking->raceClass }}</p>

<a class="btn btn-default" href="{{ route('booking.edit', ['id' => $booking->id]) }}">Edit<i class="fa fa-pencil icon-spacing-left"></i></a>
{{ Form::open(array('route' => ['booking.destroy', $booking->id], 'method' => 'delete')) }}
<a class="btn btn-default" href="{{ route('booking.destroy', ['id' => $booking->id]) }}">Cancel<i class="fa fa-remove icon-spacing-left"></i></a>
{{ Form::close() }}



