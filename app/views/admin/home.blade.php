@include('layouts.master')

@section('content')
<div class="container">
	<h1>Admin</h1>

	<hr>

	<div>{{ link_to_route('event.create', 'Create an event', null, ['class="btn btn-default"']) }}</div>

	<h3>Classes</h3>
	@foreach ($classes as $class)
	<div class="row">
		<div class="col-xs-8">{{ $class->name }}</div>
		<button class="col-xs-4 btn btn-warning">Disable</button>
	</div>
	@endforeach

	<h3>Disabled Classes</h3>
	@foreach ($disabled as $class)
	<div>{{ $class->name }}</div>
	<button class="btn btn-danger">Delete</button>
	@endforeach

</div>
