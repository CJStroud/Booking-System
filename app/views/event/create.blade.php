@extends('layouts.master')

@section('content')
<div class="container">
<h1>Create Event</h1>

    @include('partials.errors')

    {{ Form::open(array('route' => 'event.store', 'id' => 'create-form')) }}

    <div class="row">
        <div class='col-xs-12'>
            <div class="form-group event-name">
                {{ Form::label('name', 'Event Name', ['class' => '']) }}
                <input type="text" class="form-control" placeholder="this is the name of the event" name="name" value="{{ Input::old('name') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class='col-xs-12'>
            <div class="form-group event-slug">
            {{ Form::label('slug', 'Slug', ['class' => '']) }}
            <input type="text" class="form-control" placeholder="this is the name url of the event" name='slug' value="{{ Input::old('slug') }}">
        </div>
        </div>
    </div>


    <div class="row">
        <div class='col-xs-12 col-sm-6'>
            <div class="form-group">
                {{ Form::label('event-date', 'Event date', ['class' => '']) }}
                <div class='date' id='event-date'>
                    <input type='text' class="datepicker form-control col-xs-12" id='event-datetimepicker' name="event-date" placeholder='date of the event'
                    value="{{ Input::old('event-datetime') }}"
                           name='event-datetime'/>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-6'>
            <div class="form-group">
                {{ Form::label('event-time', 'Event time', ['class' => '']) }}
                <div class='' id='event-time'>
                    <input type='text' class="timepicker form-control" id='event-datetimepicker' name="event-time" placeholder='time of the event'
                    value="{{ Input::old('event-datetime') }}"
                           name='event-datetime'/>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class='col-xs-12 col-sm-6'>
            <div class="form-group">
                {{ Form::label('event-date', 'Event close date', ['class' => '']) }}
                <div class='date' id='event-close-date'>
                    <input type='text' class="datepicker form-control col-xs-12" id='event-datetimepicker' name="close-date" placeholder='date booking closes'
                    value="{{ Input::old('event-datetime') }}"
                           name='event-datetime'/>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-6'>
            <div class="form-group">
                {{ Form::label('event-time', 'Event close time', ['class' => '']) }}
                <div class='' id='event-close-time'>
                    <input type='text' class="timepicker form-control" id='event-datetimepicker' name="close-time" placeholder='time booking closes'
                    value="{{ Input::old('event-datetime') }}"
                           name='event-datetime'/>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group">
            {{ Form::label('class-container', 'Classes', ['class' => '']) }}
            <select id="class-drop-down" class="selectpicker form-control">
                @foreach($options as $option)
                <option id={{$option->id}}>{{$option->name}}</option>
                @endforeach
            </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="form-group">
                <button id='btn-add' type='button' class='btn btn-primary'>Add Class</button>
            </div>
        </div>
    </div>


</div>

<div class="table">
    <div id='class-container'>
        <div class="container">
            <div class="row">
                <div class='hidden-xs'>
                    <div class="header-element">
                        <div class='col-sm-4 col-xs-12'>
                            Class Name
                        </div>
                    </div>
                    <div class="header-element">
                        <div class='col-sm-4 col-xs-12'>
                            Limit
                        </div>
                    </div>
                    <div class='col-sm-4 col-xs-12'>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class='col-sm-12'>
            <div class="form-group">
            <input type='hidden' name='classes' id='json-class' value='{{ Input::old("classes") }}'>
            <button type="submit" class="btn btn-primary btn-submit">Create</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}

@stop
