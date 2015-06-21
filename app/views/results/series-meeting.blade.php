@extends('layouts.admin-settings')

@section('settings-content')

<div class="col-xs-12">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <h2>{{ $series }}</h2>
            </div>
            <div class="col-xs-12 col-sm-3">
                <a href="{{ route('admin.create.meeting', $folder) }}" class="btn btn-info">Add meeting</a>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12">

    @if (empty($meetings))

        <h3>There are no meetings for this series yet!</h3>

    @endif

    @foreach ($meetings as $meeting)

      <div class="panel panel-default">
          <div class="panel-body">
              <div class="col-xs-12 col-sm-9 col-md-10">
                  <h4>{{ $meeting->name }}</h4>
              </div>
              <div class="col-xs-12 col-sm-3 col-md-2">
                  <button type="submit" class="btn btn-simple btn-delete-meeting" data-toggle="modal" data-target="#deleteMeeting" data-meeting-folder="{{ $meeting->folderName }}">
                      <span class="btn-text">Delete</span>
                      <i class="fa fa-trash icon-spacing-left"></i>
                  </button>
              </div>
          </div>
      </div>

    @endforeach

</div>

<div class="modal fade modal-delete-class" id="deleteMeeting" tabindex="-1" role="dialog" aria-labelledby="Delete meeting" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['route' => ['admin.delete.meeting'], 'role' => 'form', 'id' => 'form', 'method' => 'POST' ] ) }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete Meeting</h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-warning">Warning! This will permanently remove the meeting.</div>
          <input type="hidden" name="meeting-folder" id="meeting-folder">
        </div>
        <div class="modal-footer">
          <div class="col-xs-6 col-sm-3 col-sm-offset-6">
              <button type="submit" class="btn btn-delete">Delete</button>
          </div>
          <div class="col-xs-6 col-sm-3">
            <button type="button" class="btn btn-default btn-with-addon" data-dismiss="modal"><span class="btn-text">Close</span><span class="btn-addon btn-addon-primary"><i class="fa fa-close"></i></span></button>
          </div>
        </div>
      {{ Form::close() }}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@stop
