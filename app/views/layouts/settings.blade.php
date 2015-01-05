@extends('layouts.master')

@section('content')
<div class="bg-lightgray">
  <div class="container settings">
    <h2>Settings</h2>
    @include('partials.errors')

    @if (isset($success))
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <p>{{ $success }}</p>
      </div>
    @endif



    <div class="list-group col-xs-2 col-sm-3 col-md-2">
      @if ($active == 'profile')
        <a href="{{ route('settings.profile') }}" class="list-group-item active">
      @else
        <a href="{{ route('settings.profile') }}" class="list-group-item">
      @endif
        <i class="fa fa-newspaper-o fa-lg"></i><span class="hidden-xs icon-spacing-left">Profile</span>
      </a>

      @if ($active == 'account')
        <a href="{{ route('settings.account') }}" class="list-group-item active">
      @else
        <a href="{{ route('settings.account') }}" class="list-group-item">
      @endif
        <i class="fa fa-user fa-lg"></i><span class="hidden-xs icon-spacing-left">Account</span>
      </a>
    </div>
    <div class="col-xs-10 col-sm-9 col-md-10">
      @yield('settings-content')
    </div>
  </div>


</div>

@stop
