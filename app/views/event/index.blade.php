@extends('layouts.master')

@section('content')
<div class="tiles-container">
    <div class="container">
        <h2>Available to book</h2>
        <div class="tiles">
            @foreach($events as $event)
                @include('partials.event-tile', ['event' => $event])
            @endforeach
        </div>
    </div>
</div>
@stop
