@extends('layouts.master')

@section('content')
<div class="container">
	<h1>Login</h1>

	@include('partials.errors')
	<div class="row">

	</div>
	{{ Form::open(array('route' => 'user.login.attempt', 'id' => 'create-form')) }}

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
				{{ Form::label('password', 'Password', ['class' => '']) }} ({{ link_to_route('password.send.reminder', 'forgot password?') }})
				<input type="password" class="form-control" name="password" placeholder="password">
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-sm-2 col-sm-offset-10">
			<button type="submit" class="btn btn-primary btn-with-addon"><span class="btn-text">Login</span><span class="btn-addon btn-addon-primary"><i class="fa fa-arrow-right"></i></span></button>
		</div>
	</div>

	{{ Form::close() }}

</div>

@stop
