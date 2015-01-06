@extends('layouts.master')

<div class="container">
    <h1>My Bookings</h1>
</div>
    @if (!Auth::check())
    <div class="container">
        Must be logged in {{link_to('/login', 'Click Here')}}
    </div>
    @else
    @if (count($bookings) >0)
    <div class="table">
        <div class="table-header">
            <div class="container">
                <div class="col-sm-3">
                    <div class="header-element">Name</div>
                </div>
                <div class="col-sm-2">
                    <div class="header-element">Date</div>
                </div>
                <div class="col-sm-3">
                    <div class="header-element">Class</div>
                </div>
                <div class="col-sm-2">
                    <div class="header-element">Transponder</div>
                </div>

                <div class="col-sm-2 col-xs-12"></div>
            </div>
        </div>
    @foreach ($bookings as $booking)
    <div class="table-row">
        <div class="container">
            {{ Form::open(array('route' => ['booking.destroy', $booking->id], 'method' => 'delete')) }}
            <div class="col-sm-3">
                <div class="table-element">
                    {{$booking->raceEvent}}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="table-element">
                    {{date('d/m/Y H:i', $booking->startTime)}}
                </div>
            </div>
            <div class="col-sm-3">
                <div class="table-element">
                    {{$booking->raceClass}}
                </div>
            </div>
            <div class="col-sm-2">
                <div class="table-element">
                    #{{$booking->transponder}}
                </div>
            </div>
            <div class="col-sm-2 col-xs-12">
                <div class="table-element">
                    <button class="btn btn-danger">Cancel</button>
                </div>
            </div>
            {{Form::close()}}
        </div>
    </div>
    @endforeach
    </div>
    @else
    <h4>You have no bookings</h4>
    @endif
    @endif

@stop
