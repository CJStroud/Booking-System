@extends('layouts.settings')

@section('sidebar')

@if ($active == 'profile')
  <a href="{{ route('settings.profile') }}" class="list-group-item active">
@else
  <a href="{{ route('settings.profile') }}" class="list-group-item">
@endif
  <i class="fa fa-newspaper-o fa-lg"></i><span class="icon-spacing-left">Profile</span>
</a>

@if ($active == 'account')
  <a href="{{ route('settings.account') }}" class="list-group-item active">
@else
  <a href="{{ route('settings.account') }}" class="list-group-item">
@endif
  <i class="fa fa-user fa-lg"></i><span class="icon-spacing-left">Account</span>
</a>

@stop
