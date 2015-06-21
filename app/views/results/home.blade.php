@extends('layouts.admin-settings')

@section('settings-content')

<div class="col-xs-12">
    <div class="col-xs-12">
        <div class="row">
            <div class="col-xs-12 col-sm-9">
                <h2>Series</h2>
            </div>
            <div class="col-xs-12 col-sm-3">
                <a href="{{ route('admin.create.series') }}" class="btn btn-info">Create Series</a>
            </div>
        </div>
    </div>
</div>

<div class="col-xs-12">

    @if (empty($results))

        <h3>There are no series yet!</h3>

    @endif

  @foreach ($results as $series)

  <div class="panel panel-default">
  <div class="panel-body">
      <div class="col-xs-12 col-sm-6 col-md-8">
          <h4>{{ $series->name }}</h4>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-2">
          <a href="{{ route('admin.series.meetings', $series->folderName) }}" type="submit" class="btn btn-simple">
              <span class="btn-text">Meetings</span>
              <i class="fa fa-pencil icon-spacing-left"></i>
          </a>
      </div>
      <div class="col-xs-12 col-sm-3 col-md-2">
          <button type="submit" class="btn btn-simple btn-delete-series" data-toggle="modal" data-target="#deleteClass" data-series-folder="{{ $series->folderName }}">
              <span class="btn-text">Delete</span>
              <i class="fa fa-trash icon-spacing-left"></i>
          </button>
      </div>
  </div>
  </div>

  @endforeach

</div>

<div class="modal fade modal-delete-class" id="deleteClass" tabindex="-1" role="dialog" aria-labelledby="Delete series" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{ Form::open(['route' => ['admin.delete.series'], 'role' => 'form', 'id' => 'form', 'method' => 'POST' ] ) }}
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Delete Series</h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-warning">Warning! This will permanently remove the series and any meetings created for it.</div>
          <input type="hidden" name="series-folder" id="series-folder">
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
