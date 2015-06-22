@extends('layouts.settings')

@section('title')
<h2>Admin</h2>
@stop

@section('sidebar')

@if ($active == 'home')
  <a href="{{ route('admin.home') }}" class="list-group-item active">
@else
  <a href="{{ route('admin.home') }}" class="list-group-item">
@endif
  <i class="fa fa-home fa-lg"></i><span class="icon-spacing-left">Home</span>
</a>

@if ($active == 'classes')
  <a href="{{ route('admin.classes') }}" class="list-group-item active">
@else
  <a href="{{ route('admin.classes') }}" class="list-group-item">
@endif
  <i class="fa fa-car fa-lg"></i><span class="icon-spacing-left">Classes</span>
</a>

@if ($active == 'users')
  <a href="{{ route('admin.users') }}" class="list-group-item active">
@else
  <a href="{{ route('admin.users') }}" class="list-group-item">
@endif
  <i class="fa fa-users fa-lg"></i><span class="icon-spacing-left">Users</span>
</a>

@if ($active == 'gallery')
  <a href="{{ route('admin.gallery.index') }}" class="list-group-item active">
@else
  <a href="{{ route('admin.gallery.index') }}" class="list-group-item">
@endif
  <i class="fa fa-photo fa-lg"></i><span class="icon-spacing-left">Gallery</span>
</a>

@if ($active == 'events')
  <a href="{{ route('settings.account') }}" class="list-group-item active">
@else
  <a href="{{ route('settings.account') }}" class="list-group-item">
@endif
  <i class="fa fa-flag fa-lg"></i><span class="icon-spacing-left">Events</span>
</a>

@if ($active == 'results')
  <a href="{{ route('admin.results') }}" class="list-group-item active">
@else
  <a href="{{ route('admin.results') }}" class="list-group-item">
@endif
  <i class="fa fa-bar-chart fa-lg"></i><span class="icon-spacing-left">Results</span>
</a>

@stop
