@extends('layouts.admin-settings')

@section('settings-content')

<div class="panel panel-default panel-settings">
    <div class="panel-heading">Create Meeting - {{ $series->name }}</div>
    <div class="panel-body">

  {{ Form::open(['route' => ['admin.store.meeting'], 'role' => 'form', 'files' => true, 'id' => 'form', 'method' => 'POST' ] ) }}


    <input type="hidden" name="series-name" id="series-name" value={{ $series->folderName }}/>

        <div class='col-xs-12'>
            <div class="form-group">
                {{ Form::label('meeting-name', 'Meeting Name', ['class' => '']) }}
                {{ Form::text('meeting-name', null, ['placeholder' => 'name of meeting ie. Round 1', 'class' => 'form-control']) }}
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
            {{ Form::label('upload', 'Upload Files', ['class' => '']) }}
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
</div>
</div>
  {{ Form::close() }}

@stop
