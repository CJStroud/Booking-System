@extends('layouts.master')

@section('content')

<div class="container text-center">
	<h1>Booking Successful!</h1>
	<h3>Your booking for {{ $event->name }} in the class {{ $class->name }} has been placed successfully</h3>
	<h3>The event will take place on the {{ $event->date }} at {{ $event->time }}</h3>
</div>

@stop
