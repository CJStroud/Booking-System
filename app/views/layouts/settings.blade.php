@extends('layouts.master')

@section('content')
<div class="bg-lightgray">
  <div class="container settings">

    @yield('title')

    @include('partials.errors')

    @if (isset($success) && $success != '')
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <p>{{ $success }}</p>
      </div>
    @endif
      <button id="expand-sidebar" class="visible-xs btn btn-default">Navigate<i class="fa fa-navicon icon-spacing-left"></i></button>

    <div class="list-group col-sm-3 col-md-2 sidebar">
      @yield('sidebar')
    </div>
    <div class="col-xs-12 col-sm-9 col-md-10" id="settings-content">
      @yield('settings-content')
    </div>
  </div>


</div>

@stop
