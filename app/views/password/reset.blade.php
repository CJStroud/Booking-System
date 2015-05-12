@extends('layouts.master')

@section('content')
	<div class="container">
		<h1>Password Reset</h1>
		{{ Form::open(array('route' => ['password.send.reset'])) }}
			<input type="hidden" name="token" value="{{ $token }}">

			<div class="row">
				<div class='col-xs-12'>
					<div class="form-group">
						{{ Form::label('email', 'Email', ['class' => '']) }}
						<input type="text" class="form-control" name="email" placeholder="Enter your email">
					</div>
				</div>
			</div>

			<div class="row">
				<div class='col-xs-12'>
					<div class="form-group">
						{{ Form::label('password', 'New Password', ['class' => '']) }}
						<input type="password" class="form-control" name="password" placeholder="Enter your new password">
					</div>
				</div>
			</div>

			<div class="row">
				<div class='col-xs-12'>
					<div class="form-group">
						{{ Form::label('password_confirmation', 'Repeat New Password', ['class' => '']) }}
						<input type="password" class="form-control" name="password_confirmation" placeholder="Repeat your new password">
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-xs-12 col-sm-2 col-sm-offset-10">
						<button type="submit" class="btn btn-primary btn-with-addon"><span class="btn-text">Reset Password</span><span class="btn-addon"><i class="fa fa-pencil fa-inverse"></i></span></button>
				</div>
			</div>

		{{ Form::close() }}
	</div>
@stop
