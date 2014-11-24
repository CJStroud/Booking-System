@include('layouts.master')

@section('content')
<div class="container">
	<h1>Login</h1>

	<hr>

	@include('partials.errors')


	{{ Form::open(array('action' => 'UserController@attemptLogin', 'id' => 'create-form')) }}

	<div class="row">
		<div class='col-sm-12 col-md-8'>
			<div class="form-group">
				{{ Form::label('email', 'Email', ['class' => '']) }}
				<input type="text" class="form-control" name="email" placeholder="example@mail.com">
			</div>
		</div>
	</div>

	<div class="row">
		<div class='col-sm-12 col-md-8'>
			<div class="form-group">
				{{ Form::label('password', 'Password', ['class' => '']) }}
				<input type="password" class="form-control" name="password" placeholder="password">
			</div>
		</div>
	</div>

	<button type="submit" class="col-xs-12 col-md-6 btn btn-primary btn-submit">Login</button>


	<div class="col-xs-12 col-md-7 alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		Need an account? <a href="signup" class="alert-link">Click here</a> to create one!
	</div>


</div>
