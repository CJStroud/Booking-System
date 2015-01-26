@extends('layouts.master')

@section('content')
	<div class="container">
		<h1>Password Recovery</h1>
		{{ Form::open(array('route' => ['password.send.reminder'])) }}


		<div class="row">
			<div class='col-xs-12'>
				<div class="form-group">
					{{ Form::label('email', 'Email', ['class' => '']) }}
					<input type="email" class="form-control" name="email" placeholder="example@mail.com">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-2 col-sm-offset-10">
				<button type="submit" class="btn btn-primary btn-with-addon"><span class="btn-text">Send Reminder</span><span class="btn-addon btn-addon-primary"><i class="fa fa-arrow-right"></i></span></button>
			</div>
		</div>

		{{ Form::close() }}
	</div>
@stop
