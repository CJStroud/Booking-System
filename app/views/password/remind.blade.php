@extends('layouts.master')

@section('content')
<div class="container">
	{{ Form::open(array('route' => ['password.send.reminder'])) }}
		<input type="email" name="email">
		<input type="submit" value="Send Reminder">
	{{ Form::close() }}
</div>
@stop
