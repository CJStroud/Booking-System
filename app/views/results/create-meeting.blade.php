@extends('layouts.master')

@section('content')

<div class="container">

  {{ Form::open(['route' => ['admin.store.meeting'], 'role' => 'form', 'files' => true, 'id' => 'form', 'method' => 'POST' ] ) }}

    <h1>Create Meeting</h1>

      <div class='col-xs-12'>
          <div class="form-group">
              {{ Form::label('series-name', 'Series Name', ['class' => '']) }}
              {{ Form::text('series-name', null, ['placeholder' => 'name of series ie. Series', 'class' => 'form-control']) }}
          </div>
      </div>

        <div class='col-xs-12'>
            <div class="form-group">
                {{ Form::label('meeting-name', 'Meeting Name', ['class' => '']) }}
                {{ Form::text('meeting-name', null, ['placeholder' => 'name of meeting ie. round 1', 'class' => 'form-control']) }}
            </div>
        </div>

        <div class='col-xs-12'>
            <div class="form-group">
                {{ Form::label('date', 'Date', ['class' => '']) }}
                <div class='date' id='event-date'>
                    {{ Form::text('date', null, ['placeholder' => 'date of the meeting', 'class' => 'datepicker form-control col-xs-12']) }}
                </div>
            </div>
        </div>


      <div class="col-xs-12">
        <div class="form-group">
          <div class="upload-files">
            <input name="upload[]" type="file" multiple="multiple" />
          </div>
        </div>
      </div>

        <div class="col-xs-12 col-sm-4 col-md-2">
          <div class="form-group">
            <button type="submit" class="btn btn-primary btn-with-addon">
                <span class="btn-text">Create</span>
                <span class="btn-addon btn-addon-primary">
                    <i class="fa fa-arrow-right"></i>
                </span>
            </button>
        </div>
      </div>

  {{ Form::close() }}

</div>

@stop
