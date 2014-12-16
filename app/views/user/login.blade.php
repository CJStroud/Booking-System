@include('layouts.master')

@section('content')
<div class="container">
	<h1>Login</h1>

	@include('partials.errors')
	<div class="row">

	</div>
	{{ Form::open(array('action' => 'UserController@attemptLogin', 'id' => 'create-form')) }}

	<div class="row">
		<div class='col-xs-12'>
			<div class="form-group">
				{{ Form::label('email', 'Email', ['class' => '']) }}
				<input type="text" class="form-control" name="email" placeholder="example@mail.com">
			</div>
		</div>
	</div>

	<div class="row">
		<div class='col-xs-12'>
			<div class="form-group">
				{{ Form::label('password', 'Password', ['class' => '']) }}
				<input type="password" class="form-control" name="password" placeholder="password">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 col-sm-2 col-sm-offset-10">
			<button type="submit" class="btn btn-primary">Login</button>
		</div>
	</div>

	{{ Form::close() }}

</div>
