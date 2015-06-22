@extends('layouts.admin-settings')

@section('settings-content')


<div class="col-xs-12">
    <div class="row">
      <div class="col-xs-12 col-sm-9">
      @if (isset($edit))
          <h2>Update Event</h2>
          {{ Form::model($event, array('route' => ['admin.event.update', $event->id], 'id' => 'edit-form')) }}

      @else

          <h2>Create Event</h2>
          {{ Form::open(array('route' => 'event.store', 'id' => 'create-form')) }}

      @endif
      </div>
    </div>
</div>



    <div class="row">
        <div class='col-xs-12'>
            <div class="form-group event-name">
                {{ Form::label('name', 'Event Name', ['class' => '']) }}
                {{ Form::text('name', null, ['placeholder' => 'this is the name of the event', 'class' => 'form-control']) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class='col-xs-12'>
            <div class="form-group event-slug">
            {{ Form::label('slug', 'Slug', ['class' => '']) }}
            {{ Form::text('slug', null, ['placeholder' => 'this is the name url of the event', 'class' => 'form-control']) }}
        </div>
        </div>
    </div>


    <div class="row">
        <div class='col-xs-12 col-sm-6'>
            <div class="form-group">
                {{ Form::label('event-date', 'Event date', ['class' => '']) }}
                <div class='date' id='event-date'>
                    {{ Form::text('event-date', null, ['placeholder' => 'date of the event', 'class' => 'datepicker form-control col-xs-12']) }}
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-6'>
            <div class="form-group">
                {{ Form::label('event-time', 'Event time', ['class' => '']) }}
                <div class='' id='event-time'>
                    {{ Form::text('event-time', null, ['placeholder' => 'time of the event', 'class' => 'timepicker form-control']) }}
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class='col-xs-12 col-sm-6'>
            <div class="form-group">
                {{ Form::label('close-date', 'Event booking close date', ['class' => '']) }}
                <div class='date' id='event-close-date'>
                    {{ Form::text('close-date', null, ['placeholder' => 'date booking closes', 'class' => 'datepicker form-control col-xs-12']) }}
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-sm-6'>
            <div class="form-group">
                {{ Form::label('close-time', 'Event booking close time', ['class' => '']) }}
                <div class='' id='event-close-time'>
                    {{ Form::text('close-time', null, ['placeholder' => 'time booking closes', 'class' => 'timepicker form-control']) }}
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
        <div class="col-xs-12 col-sm-5 col-md-3">
            <div class="form-group">
                <button id='btn-add' type='button' class="btn btn-primary btn-with-addon">
                    <span class="btn-text">Add Class</span>
                    <span class="btn-addon btn-addon-primary">
                        <i class="fa fa-plus"></i>
                    </span>
                </button>
            </div>
        </div>
    </div>

<div class="table class-table">
    <div id='class-container'>
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


  <div class="row">
      <div class='col-xs-12 col-sm-offset-8 col-sm-4 col-md-offset-10 col-md-2'>
          <div class="form-group">
              {{ Form::hidden('classes', null, ['id' => 'json-class']) }}
              <button type="submit" class="btn btn-primary btn-with-addon btn-submit">
                  <span class="btn-text">Submit</span>
                  <span class="btn-addon btn-addon-primary">
                      <i class="fa fa-arrow-right"></i>
                  </span>
              </button>
          </div>
      </div>
  </div>

{{ Form::close() }}

@stop
