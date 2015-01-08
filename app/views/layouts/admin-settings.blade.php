@extends('layouts.settings')

@section('sidebar')

@if ($active == 'home')
  <a href="{{ route('admin.home') }}" class="list-group-item active">
@else
  <a href="{{ route('admin.home') }}" class="list-group-item">
@endif
  <i class="fa fa-home fa-lg"></i><span class="hidden-xs icon-spacing-left">Home</span>
</a>

@if ($active == 'classes')
  <a href="{{ route('settings.account') }}" class="list-group-item active">
@else
  <a href="{{ route('settings.account') }}" class="list-group-item">
@endif
  <i class="fa fa-car fa-lg"></i><span class="hidden-xs icon-spacing-left">Classes</span>
</a>

@if ($active == 'users')
  <a href="{{ route('settings.account') }}" class="list-group-item active">
@else
  <a href="{{ route('settings.account') }}" class="list-group-item">
@endif
  <i class="fa fa-users fa-lg"></i><span class="hidden-xs icon-spacing-left">Users</span>
</a>

@if ($active == 'gallery')
  <a href="{{ route('settings.account') }}" class="list-group-item active">
@else
  <a href="{{ route('settings.account') }}" class="list-group-item">
@endif
  <i class="fa fa-photo fa-lg"></i><span class="hidden-xs icon-spacing-left">Gallery</span>
</a>

@if ($active == 'events')
  <a href="{{ route('settings.account') }}" class="list-group-item active">
@else
  <a href="{{ route('settings.account') }}" class="list-group-item">
@endif
  <i class="fa fa-flag fa-lg"></i><span class="hidden-xs icon-spacing-left">Events</span>
</a>

@stop
