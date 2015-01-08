@extends('layouts.admin-settings')

@section('settings-content')
  @foreach ($user as $users)
    {{ $user }}
  @endforeach
@stop
