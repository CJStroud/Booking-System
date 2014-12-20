@include('layouts.master')

@section('content')
<div class="tiles-container">
	<div class="container">
		<h2>{{$event->name}}</h2>
		<h2>{{date('d/m/Y H:i', $event->start_time)}}</h2>
		<div class="tiles">
			@foreach($classes as $class)
				@include('partials.class-tile', [ 'class' => $class, 'slug' => $event->slug ])
			@endforeach
		</div>
	</div>
</div>

