@include('layouts.master')

@section('content')
<div class="container">

	<h4>Add Class</h4>
	{{Form::open(array('route' => ['class.store'], 'method' =>'post'))}}
	<div><input name="name"></div>
	<button type="submit" class="btn btn-primary">Add</button>
	{{Form::close()}}

	<h2>Active Classes</h2>
	@foreach ($classes as $class)
	<div class="break"></div>
	<div class="row">
		<div class="col-sm-6 col-xs-12 row-text">{{ $class->name }}</div>
		{{ Form::open(array('action' => ['ClassController@disable', $class->id], 'method' => 'post')) }}
		<div class="col-sm-2 col-xs-12">
			<button class="btn btn-warning">Disable</button>
		</div>
		{{Form::close()}}
	</div>
	@endforeach

	<h2>Disabled Classes</h2>
	@foreach ($disabled as $class)
	<div class="break"></div>
	<div class="row">
		<div class="col-sm-6 col-xs-12 row-text">{{ $class->name }}</div>
		{{ Form::open(array('action' => ['ClassController@enable', $class->id], 'method' => 'post')) }}
		<div class="col-sm-2 col-xs-6">
			<button class="btn btn-success">Re-enable</button>
		</div>
		{{Form::close()}}
		{{ Form::open(array('route' => ['class.destroy', $class->id], 'method' => 'delete')) }}
		<div class="col-sm-2 col-xs-6">
			<button class="btn btn-danger">Delete</button>
		</div>
		{{Form::close()}}
	</div>
	@endforeach

</div>
