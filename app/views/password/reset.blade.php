@extends('layouts.master')

@section('content')
	{{ Form::open(array('route' => ['password.send.reset'])) }}
		<input type="hidden" name="token" value="{{ $token }}">
		Email <input type="email" name="email">
		New Password <input type="password" name="password">
		Confirm Password <input type="password" name="password_confirmation">
		<input type="submit" value="Reset Password">
	{{ Form::close() }}
@stop
