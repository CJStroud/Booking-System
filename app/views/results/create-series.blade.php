@extends('layouts.admin-settings')

@section('settings-content')

  <div class="panel panel-default panel-settings">
      <div class="panel-heading">Create series</div>
      <div class="panel-body">
          {{ Form::open(['route' => ['admin.store.series'], 'role' => 'form', 'id' => 'form', 'method' => 'POST' ] ) }}
          <div class="form-group">
              <div class="col-xs-12">
                  {{ Form::label('series-name', 'Name') }}

                  {{ Form::text('series-name', Input::old('series-name'), ['class' => 'form-control', 'placeholder' => 'Name of the series eg. Winter Series 20XX']) }}
              </div>
          </div>

          <div class="form-group">
              <div class="col-xs-12 col-sm-4 col-md-2">
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
  </div>

  {{ Form::close() }}

@stop
