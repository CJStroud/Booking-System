@extends('layouts.master')

@section('content')

<div class="container">
  <h1>Results</h1>

  @if (count($results) < 1)
    <h2>No results were found!</h2>

  @endif

  @foreach ($results as $series)
  <div class="col-xs-12 col-sm-6">
    <h3>{{ $series->name }}</h3>
      @foreach ($series->meetings as $meeting)
        <div class="col-xs-12">
          {{ link_to($meeting->url, $meeting->name, array('target'=>'_blank')) }}
        </div>
      @endforeach
  </div>

  @endforeach

</div>

@stop
