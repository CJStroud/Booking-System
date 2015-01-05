@extends('layouts.master')

@section('content')
<div class="bg-lightgray">
  <div class="container settings">
    <h2>Settings</h2>
    @include('partials.errors')

      <div class="list-group col-xs-1 col-sm-3 col-md-2">
        <a href="{{ route('settings.profile') }}" class="list-group-item active">
          <i class="fa fa-newspaper-o fa-lg"></i><span class="hidden-xs icon-spacing-left">Profile</span>
        </a>

        <a href="{{ route('settings.profile') }}" class="list-group-item">
          <i class="fa fa-user fa-lg"></i><span class="hidden-xs icon-spacing-left">Account</span>
        </a>
      </div>
    </div>

  </div>

@stop
