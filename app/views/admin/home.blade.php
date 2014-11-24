@include('layouts.master')

@section('content')
<div class="container">
	<h1>Admin</h1>

	<hr>

	<div>{{ link_to_route('event.create', 'Create an event', null, ['class="btn btn-default"']) }}</div>

	<div>Create a new class</div>
	<div>Delete a class</div>

</div>
